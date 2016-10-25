<?php

App::uses('AppModel', 'Model');

/**
 * SupplierDocument Model
 *
 * @property SupplierDetail $SupplierDetail
 */
class SupplierDocument extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'supplier_detail_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'original_name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'converted_name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'file_type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'SupplierDetail' => array(
            'className' => 'SupplierDetail',
            'foreignKey' => 'supplier_detail_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'FileType' => array(
            'className' => 'FileType',
            'foreignKey' => 'file_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => 'file_type_id'
        )
    );
    
}
