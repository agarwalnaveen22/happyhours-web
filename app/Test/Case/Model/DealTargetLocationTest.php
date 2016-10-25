<?php
App::uses('DealTargetLocation', 'Model');

/**
 * DealTargetLocation Test Case
 */
class DealTargetLocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.deal_target_location',
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
		$this->DealTargetLocation = ClassRegistry::init('DealTargetLocation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DealTargetLocation);

		parent::tearDown();
	}

}
