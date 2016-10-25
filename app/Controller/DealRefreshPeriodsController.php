<?php

App::uses('AppController', 'Controller');

/**
 * DealRefreshPeriods Controller
 *
 * @property DealRefreshPeriod $DealRefreshPeriod
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DealRefreshPeriodsController extends AppController {

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

            if ($this->request->data['DealRefreshPeriod']['id'] != '') {
                $this->DealRefreshPeriod->id = $this->request->data['DealRefreshPeriod']['id'];
            }
            if ($this->DealRefreshPeriod->save($this->request->data)) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->DealRefreshPeriod->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }

        if ($id) {
            $locationDetail = $this->DealRefreshPeriod->findById($id);
            if (!empty($locationDetail)) {
                $response['status'] = true;
                $response['data'] = $locationDetail;
            } else {
                $response['status'] = false;
                $response['message'] = "Deal refresh period detail can not found";
            }
            echo json_encode($response);
            die;
        }

        $products = $this->DealRefreshPeriod->find('all');
        //pr($products);die;
        $this->set('products', $products);
    }

    public function periodsDelete($id) {
        if ($this->DealRefreshPeriod->deleteAll(array('DealRefreshPeriod.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

}
