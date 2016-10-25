<?php

App::uses('AppController', 'Controller');

/**
 * UserOrders Controller
 *
 * @property UserOrder $UserOrder
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UserOrdersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $orders = $this->UserOrder->find('all');
        //pr($orders);die;
        $this->set('orders', $orders);
    }

    public function ordersDelete($id) {
        if ($this->UserOrder->deleteAll(array('UserOrder.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

}
