<?php
App::uses('CommonAccess', 'Model');

/**
 * CommonAccess Test Case
 */
class CommonAccessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.common_access'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommonAccess = ClassRegistry::init('CommonAccess');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommonAccess);

		parent::tearDown();
	}

}
