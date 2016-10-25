<?php
App::uses('SupplierPoint', 'Model');

/**
 * SupplierPoint Test Case
 */
class SupplierPointTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.order_type',
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
		$this->SupplierPoint = ClassRegistry::init('SupplierPoint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SupplierPoint);

		parent::tearDown();
	}

}
