<?php
/**
 * Deal Fixture
 */
class DealFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'campaign_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'deal_type' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => '0=fixed, 1=percentage'),
		'deal_value' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'start_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'uses' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'per user uses, 0=unlimited'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'supplier_id' => 1,
			'campaign_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'image' => 'Lorem ipsum dolor sit amet',
			'deal_type' => 1,
			'deal_value' => 1,
			'start_datetime' => '2016-10-02 14:13:10',
			'end_datetime' => '2016-10-02 14:13:10',
			'uses' => 1,
			'amount' => 1,
			'created' => '2016-10-02 14:13:10',
			'modified' => '2016-10-02 14:13:10'
		),
	);

}
