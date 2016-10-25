<?php
App::uses('DealLocation', 'Model');

/**
 * DealLocation Test Case
 */
class DealLocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.deal_location',
		'app.deal',
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
		'app.city',
		'app.township',
		'app.company_category',
		'app.company_status',
		'app.supplier_document',
		'app.file_type',
		'app.location',
		'app.supplier_point',
		'app.order_type',
		'app.campaign',
		'app.product_category',
		'app.deal_refresh_period'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DealLocation = ClassRegistry::init('DealLocation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DealLocation);

		parent::tearDown();
	}

}
