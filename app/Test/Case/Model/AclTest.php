<?php
App::uses('Acl', 'Model');

/**
 * Acl Test Case
 */
class AclTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acl',
		'app.role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Acl = ClassRegistry::init('Acl');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acl);

		parent::tearDown();
	}

}
