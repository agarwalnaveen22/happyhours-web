<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

    public function getCountryName($id) {
        App::import('Model', 'Country');
        $model = new Country();
        $data = $model->findById($id);
        return $data['Country']['name'];
    }

    public function getStateName($id) {
        App::import('Model', 'State');
        $model = new State();
        $data = $model->findById($id);
        return $data['State']['name'];
    }
    
    public function getCityName($id) {
        App::import('Model', 'City');
        $model = new City();
        $data = $model->findById($id);
        return $data['City']['name'];
    }

    public function getCompanyStatusName($id) {
        App::import('Model', 'CompanyStatus');
        $model = new CompanyStatus();
        $data = $model->findById($id);
        return $data['CompanyStatus']['name'];
    }

    public function getAccountTypeName($id) {
        App::import('Model', 'AccountType');
        $model = new AccountType();
        $data = $model->findById($id);
        return $data['AccountType']['name'];
    }

    public function getCompanyCategoryName($id) {
        App::import('Model', 'CompanyCategory');
        $model = new CompanyCategory();
        $data = $model->findById($id);
        return $data['CompanyCategory']['name'];
    }

    public function getFileType($id) {
        App::import('Model', 'FileType');
        $model = new FileType();
        $model->recursive = 0;
        $data = $model->findById($id);
        return $data['FileType'];
    }

    public function getDateTimeFormat($dt) {
        return date("m/d/y h:i a", strtotime($dt));
    }

    public function getDateFormat($dt) {
        return date("m/d/y", strtotime($dt));
    }

    public function getPermission($role_id, $controller, $action) {
        if ($role_id != 1) {
            App::import('Model', 'Acl');
            $model = new Acl();
            $permit = $model->find('first', array('conditions' => array(
                    'Acl.role_id' => $role_id,
                    'Acl.controller' => $controller,
                    'Acl.action' => $action,
            )));
            if (empty($permit)) {
                return false;
            } else {
                return true;
            }
        }else{
            return true;
        }
    }
    
    public function getDays(){
        return $days = array(
            "Monday"=>"Monday",
            "Tuesday"=>"Tuesday",
            "Wednesday"=>"Wednesday",
            "Thursday"=>"Thursday",
            "Friday"=>"Friday",
            "Saturday"=>"Saturday",
            "Sunday"=>"Sunday"
            );
    }
    
    public function getTime(){
        return $time = array(
            "9:00 AM"=>"9:00 AM",
            "9:30 AM"=>"9:30 AM",
            "10:00 AM"=>"10:00 AM",
            "10:30 AM"=>"10:30 AM",
            "11:00 AM"=>"11:00 AM",
            "11:30 AM"=>"11:30 AM",
            "12:00 AM"=>"12:30 AM",
            "01:00 PM"=>"01:30 PM",
            "02:00 PM"=>"02:30 PM",
            "03:00 PM"=>"03:30 PM",
            "04:00 PM"=>"04:30 PM",
            "05:00 PM"=>"05:30 PM",
            "06:00 PM"=>"06:30 PM",
            "07:00 PM"=>"07:30 PM",
            "08:00 PM"=>"08:30 PM",
            "09:00 PM"=>"09:30 PM",
            "10:00 PM"=>"10:30 PM",
            "11:00 PM"=>"11:30 PM",
            "12:00 PM"=>"12:30 PM",
            "01:00 AM"=>"01:30 AM",
            "02:00 AM"=>"02:30 AM",
            "03:00 AM"=>"03:30 AM",
            "04:00 AM"=>"04:30 AM",
            "05:00 AM"=>"05:30 AM",
            "06:00 AM"=>"06:30 AM",
            "07:00 AM"=>"07:30 AM",
            "08:00 AM"=>"08:30 AM"
        );
    }
    
    public function getTransactionStatus($status){
        if($status==1){
            return "Success";
        }else{
            return "Failed";
        }
    }
}
