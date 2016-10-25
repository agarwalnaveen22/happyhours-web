<?php
App::uses('SupplierDetail', 'Model');

/**
 * SupplierDetail Test Case
 */
class SupplierDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.state'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SupplierDetail = ClassRegistry::init('SupplierDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SupplierDetail);

		parent::tearDown();
	}

}
