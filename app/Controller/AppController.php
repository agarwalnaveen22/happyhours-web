<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'email' => 'email',
                        'password' => 'password'
                    )
                )
            )
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session', 'App');

    public function beforeFilter() {
        //Configure AuthComponent
        Configure::write('App.baseUrl', 'http://' . $_SERVER['HTTP_HOST'] . $this->base);
        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login'
        );
        $this->Auth->logoutRedirect = array(
            'controller' => 'users',
            'action' => 'login'
        );
        $this->Auth->loginRedirect = array(
            'controller' => 'users',
            'action' => 'dashboard'
        );
        $this->loadModel('Setting');
        $settings = $this->Setting->find('first');
        $this->set('settings', $settings);
        $params = array();
        if ($this->params->params['action'] != 'verifyEmail') {
            foreach ($this->params->params['pass'] as $key => $pairs) {
                $params[] = AppController::decryption($pairs);
            }
            $this->params->params['pass'] = $params;
        }

        //pr($this->params->params);die;
        $exemption = array();
        $this->loadModel('CommonAccess');
        $exemption = $this->CommonAccess->find("all");
        //pr($exemption);die;
        if ($this->Session->read("Auth.User")['User']['role_id'] != 1) {
            $flag = 0;
            foreach ($exemption as $e) {
                if (strtolower($this->params->params['controller']) == $e['CommonAccess']['controller'] && $this->params->params['action'] == $e['CommonAccess']['action']) {
                    $flag = 1;
                }
            }
            if (strtolower($this->params->params['controller']) == 'webservices') {
                $flag = 1;
            }
            if ($flag == 0) {
                $this->loadModel('Acl');
                $permit = $this->Acl->find('first', array('conditions' => array(
                        'Acl.role_id' => $this->Session->read("Auth.User")['User']['role_id'],
                        'Acl.controller' => $this->params->params['controller'],
                        array('OR' => array(array('Acl.action' => $this->params->params['action']), array('Acl.action' => $this->params->params['action'] . "_1"), array('Acl.action' => $this->params->params['action'] . "_2")))
                )));
                //pr($permit);die;
                if (empty($permit)) {
                    throw new UnauthorizedException();
                }
            }
        }
    }

    public static function encryption($string) {
        return str_replace("==", "", base64_encode(Security::cipher($string, Configure::read('Security.salt'))));
    }

    public static function decryption($string) {
        return Security::cipher(base64_decode($string), Configure::read('Security.salt'));
    }

}
