<?php

class ErrorsController extends AppController {
    public $name = 'Errors';

    public function beforeFilter() {
        //parent::beforeFilter();
        Configure::write('App.baseUrl', 'http://'.$_SERVER['HTTP_HOST'].$this->base);
        $this->Auth->allow('errorAccessDenied','error404');
    }

    public function unauthorized() {
        $this->layout = false;
    }
    
    public function error404() {
        $this->layout = false;
    }
    
}
