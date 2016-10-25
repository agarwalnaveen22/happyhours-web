<?php
App::uses('AppModel', 'Model');
/**
 * FileType Model
 *
 * @property SupplierDocument $SupplierDocument
 */
class FileType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SupplierDocument' => array(
			'className' => 'SupplierDocument',
			'foreignKey' => 'file_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'file_type_id',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
