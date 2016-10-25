<?php
/**
 * SupplierPoint Fixture
 */
class SupplierPointFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'supplier_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'points' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'point_type' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => '1=add, 0=less'),
		'remaining_points' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'order_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'deal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'in case of redemption'),
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
			'points' => 1,
			'point_type' => 1,
			'remaining_points' => 1,
			'order_type_id' => 1,
			'deal_id' => 1,
			'created' => '2016-10-03 09:02:40',
			'modified' => '2016-10-03 09:02:40'
		),
	);

}
