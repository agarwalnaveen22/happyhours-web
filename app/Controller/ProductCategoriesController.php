<?php

App::uses('AppController', 'Controller');

/**
 * ProductCategories Controller
 *
 * @property ProductCategory $ProductCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ProductCategoriesController extends AppController {

    

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function products($id = NULL) {
        if ($this->request->is('post')) {
            
            if ($this->request->data['ProductCategory']['id'] != '') {
                $this->ProductCategory->id = $this->request->data['ProductCategory']['id'];
            }
            if ($this->ProductCategory->save($this->request->data)) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->ProductCategory->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }

        if ($id) {
            $locationDetail = $this->ProductCategory->findById($id);
            if (!empty($locationDetail)) {
                $response['status'] = true;
                $response['data'] = $locationDetail;
            } else {
                $response['status'] = false;
                $response['message'] = "Product category detail can not found";
            }
            echo json_encode($response);
            die;
        }

        $products = $this->ProductCategory->find('all');
        //pr($products);die;
        $productList = $this->ProductCategory->generateTreeList();
        $this->set('products', $products);
        $this->set('productList',$productList);
    }

    public function productsDelete($id) {
        if ($this->ProductCategory->deleteAll(array('ProductCategory.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

}
