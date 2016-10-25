<?php
App::uses('UserDetail', 'Model');

/**
 * UserDetail Test Case
 */
class UserDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_detail',
		'app.user',
		'app.role',
		'app.acl',
		'app.device',
		'app.rating',
		'app.supplier_detail',
		'app.country',
		'app.setting',
		'app.state',
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
		'app.user_order',
		'app.deal_location',
		'app.deal_target_location',
		'app.user_card',
		'app.user_login'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDetail = ClassRegistry::init('UserDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDetail);

		parent::tearDown();
	}

}
