<?php
App::uses('Township', 'Model');

/**
 * Township Test Case
 */
class TownshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.township',
		'app.city',
		'app.state',
		'app.country',
		'app.setting',
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
		$this->Township = ClassRegistry::init('Township');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Township);

		parent::tearDown();
	}

}
