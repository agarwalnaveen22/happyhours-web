<?php
App::uses('UserOrder', 'Model');

/**
 * UserOrder Test Case
 */
class UserOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_order',
		'app.user',
		'app.role',
		'app.acl',
		'app.device',
		'app.rating',
		'app.supplier_detail',
		'app.country',
		'app.setting',
		'app.state',
		'app.user_detail',
		'app.city',
		'app.township',
		'app.company_category',
		'app.company_status',
		'app.supplier_document',
		'app.file_type',
		'app.location',
		'app.supplier_point',
		'app.order_type',
		'app.deal',
		'app.campaign',
		'app.product_category',
		'app.deal_refresh_period',
		'app.user_cab_click',
		'app.deal_location',
		'app.deal_target_location',
		'app.user_card',
		'app.user_login',
		'app.transaction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserOrder = ClassRegistry::init('UserOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserOrder);

		parent::tearDown();
	}

}
