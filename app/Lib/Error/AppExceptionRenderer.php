<?php

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function unauthorized($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'unauthorized'));
    }
    
    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
}