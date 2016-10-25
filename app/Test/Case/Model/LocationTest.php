<?php
App::uses('Location', 'Model');

/**
 * Location Test Case
 */
class LocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.location',
		'app.supplier_detail',
		'app.user',
		'app.role',
		'app.device',
		'app.rating',
		'app.user_cab_click',
		'app.user_card',
		'app.user_detail',
		'app.user_login',
		'app.user_order',
		'app.country',
		'app.setting',
		'app.state',
		'app.company_category',
		'app.company_status',
		'app.supplier_document',
		'app.file_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Location = ClassRegistry::init('Location');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Location);

		parent::tearDown();
	}

}
