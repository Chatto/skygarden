<?php
App::uses('articles', 'Model');

/**
 * articles Test Case
 *
 */
class articlesTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.articles'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->articles = ClassRegistry::init('articles');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->articles);

		parent::tearDown();
	}

}
