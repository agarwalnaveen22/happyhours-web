<?php
/**
 * SupplierDocument Fixture
 */
class SupplierDocumentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'supplier_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'original_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'converted_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'file_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '1=profile, 2=other'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'supplier_detail_id' => 1,
			'original_name' => 'Lorem ipsum dolor sit amet',
			'converted_name' => 'Lorem ipsum dolor sit amet',
			'file_type' => 1,
			'created' => '2016-09-28 10:21:09',
			'modified' => '2016-09-28 10:21:09'
		),
	);

}
