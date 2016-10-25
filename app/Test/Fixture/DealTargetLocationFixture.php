<?php
/**
 * DealTargetLocation Fixture
 */
class DealTargetLocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'deal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'township_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'deal_id' => 1,
			'state_id' => 1,
			'city_id' => 1,
			'township_id' => 1,
			'created' => '2016-10-04 11:47:37',
			'modified' => '2016-10-04 11:47:37'
		),
	);

}
