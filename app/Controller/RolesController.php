<?php

App::uses('AppController', 'Controller');

/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RolesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index($id = NULL) {
        if ($this->request->is('post')) {

            if ($this->request->data['Role']['id'] != '') {
                $this->Role->id = $this->request->data['Role']['id'];
            }
            if ($this->Role->save($this->request->data)) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Role->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }

        if ($id) {
            $locationDetail = $this->Role->findById($id);
            if (!empty($locationDetail)) {
                $response['status'] = true;
                $response['data'] = $locationDetail;
            } else {
                $response['status'] = false;
                $response['message'] = "Role detail can not found";
            }
            echo json_encode($response);
            die;
        }

        $roles = $this->Role->find('all');
        //pr($roles);die;
        $this->set('roles', $roles);
    }

    public function roleDelete($id) {
        if ($this->Role->deleteAll(array('Role.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

}
