<?php

App::uses('AppController', 'Controller');

/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CitiesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Country','City');
    public $components = array('Paginator', 'Session', 'Flash');
    

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index($id = NULL) {
        if ($this->request->is('post')) {

            if ($this->request->data['City']['id'] != '') {
                $this->City->id = $this->request->data['City']['id'];
            }
            $names = explode(",",$this->request->data['City']['name']);
            $flag = 0;
            foreach($names as $name){
                $this->City->create();
                $this->request->data['City']['name'] = trim($name);
                if($this->City->save($this->request->data)){
                    $flag = 1;
                }
            }
            if ($flag) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->City->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }

        if ($id) {
            $locationDetail = $this->City->findById($id);
            if (!empty($locationDetail)) {
                $response['status'] = true;
                $response['data'] = $locationDetail;
            } else {
                $response['status'] = false;
                $response['message'] = "City detail can not found";
            }
            echo json_encode($response);
            die;
        }

        $this->City->recursive = 2;
        $products = $this->City->find('all');
        $countries = $this->Country->find("list");
        //pr($products);die;
        $this->set('products', $products);
        $this->set('countries', $countries);
    }

    public function cityDelete($id) {
        if ($this->City->deleteAll(array('City.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }
    
    public function getStates(){
        $data = $this->Country->State->find('list',array('conditions'=>array('State.country_id'=>$this->request->data['id'])));
        if(!empty($data)){
            $response['status'] = true;
            $response['data'] = $data;
        }else{
            $response['status'] = false;
            $response['message'] = "States can not found";
        }
        echo json_encode($response);
        die;
    }

}
