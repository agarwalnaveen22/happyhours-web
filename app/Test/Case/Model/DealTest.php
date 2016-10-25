<?php
App::uses('Deal', 'Model');

/**
 * Deal Test Case
 */
class DealTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.deal',
		'app.supplier',
		'app.campaign',
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
		'app.deal_timing',
		'app.supplier_point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Deal = ClassRegistry::init('Deal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Deal);

		parent::tearDown();
	}

}
