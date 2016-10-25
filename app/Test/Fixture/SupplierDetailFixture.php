<?php
/**
 * SupplierDetail Fixture
 */
class SupplierDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'company_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_registration_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_bar_licence_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'establishment_year' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 4),
		'landline_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mobile' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fax' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address_1' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address_2' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '1=proprietor, 2=partnership, 3=private ltd, 4=public ltd, 5=society'),
		'company_website' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_category' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'profile_picture' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_type' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'comment' => '1=paid, 2=free'),
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
			'company_name' => 'Lorem ipsum dolor sit amet',
			'company_registration_number' => 'Lorem ipsum dolor sit amet',
			'company_bar_licence_number' => 'Lorem ipsum dolor sit amet',
			'establishment_year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'landline_number' => 'Lorem ipsum d',
			'mobile' => 'Lorem ipsum d',
			'fax' => 'Lorem ipsum d',
			'country_id' => 1,
			'state_id' => 1,
			'city' => 'Lorem ipsum dolor sit amet',
			'address_1' => 'Lorem ipsum dolor sit amet',
			'address_2' => 'Lorem ipsum dolor sit amet',
			'company_email' => 'Lorem ipsum dolor sit amet',
			'company_status' => 1,
			'company_website' => 'Lorem ipsum dolor sit amet',
			'company_category' => 1,
			'profile_picture' => 'Lorem ipsum dolor sit amet',
			'account_type' => 1,
			'created' => '2016-09-28 07:19:20',
			'modified' => '2016-09-28 07:19:20'
		),
	);

}
