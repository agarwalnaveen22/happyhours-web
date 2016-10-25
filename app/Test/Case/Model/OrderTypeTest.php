<?php
App::uses('OrderType', 'Model');

/**
 * OrderType Test Case
 */
class OrderTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_type',
		'app.supplier_point',
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
		'app.file_type',
		'app.deal',
		'app.campaign',
		'app.deal_timing'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderType = ClassRegistry::init('OrderType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderType);

		parent::tearDown();
	}

}
