<?php
/**
 * UserOrder Fixture
 */
class UserOrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'deal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'transaction_amount' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'transaction_status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '1=success, 2=failure'),
		'transaction_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'failure_reason' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'user_id' => 1,
			'deal_id' => 1,
			'transaction_amount' => 1,
			'transaction_status' => 1,
			'transaction_id' => 'Lorem ipsum dolor sit amet',
			'failure_reason' => 'Lorem ipsum dolor sit amet',
			'user_card_id' => 1,
			'created' => '2016-10-19 08:17:34',
			'modified' => '2016-10-19 08:17:34'
		),
	);

}
