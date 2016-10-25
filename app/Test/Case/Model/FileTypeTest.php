<?php
App::uses('FileType', 'Model');

/**
 * FileType Test Case
 */
class FileTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.file_type',
		'app.supplier_document',
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
		$this->FileType = ClassRegistry::init('FileType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FileType);

		parent::tearDown();
	}

}
