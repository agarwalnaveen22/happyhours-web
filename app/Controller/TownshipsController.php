<?php

App::uses('AppController', 'Controller');

/**
 * Townships Controller
 *
 * @property Township $Township
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TownshipsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Country','Township');
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index($id = NULL) {
        if ($this->request->is('post')) {

            if ($this->request->data['Township']['id'] != '') {
                $this->Township->id = $this->request->data['Township']['id'];
            }
            $names = explode(",", $this->request->data['Township']['name']);
            $flag = 0;
            foreach ($names as $name) {
                $this->Township->create();
                $this->request->data['Township']['name'] = trim($name);
                if ($this->Township->save($this->request->data)) {
                    $flag = 1;
                }
            }
            if ($flag) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Township->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }

        if ($id) {
            $this->Township->recursive = 3;
            $locationDetail = $this->Township->findById($id);
            if (!empty($locationDetail)) {
                $response['status'] = true;
                $response['data'] = $locationDetail;
            } else {
                $response['status'] = false;
                $response['message'] = "Township detail can not found";
            }
            echo json_encode($response);
            die;
        }

        $this->Township->recursive = 3;
        $products = $this->Township->find('all');
        $countries = $this->Country->find("list");
        //pr($products);die;
        $this->set('products', $products);
        $this->set('countries', $countries);
    }

    public function townshipDelete($id) {
        if ($this->Township->deleteAll(array('Township.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

    public function getCities() {
        $data = $this->Country->State->City->find('list', array('conditions' => array('City.state_id' => $this->request->data['id'])));
        if (!empty($data)) {
            $response['status'] = true;
            $response['data'] = $data;
        } else {
            $response['status'] = false;
            $response['message'] = "Cities can not found";
        }
        echo json_encode($response);
        die;
    }

}
