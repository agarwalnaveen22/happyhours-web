<?php
App::uses('CompanyCategory', 'Model');

/**
 * CompanyCategory Test Case
 */
class CompanyCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompanyCategory = ClassRegistry::init('CompanyCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompanyCategory);

		parent::tearDown();
	}

}
