<?php
/**
 * Class Test_Class_Compatibility
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Compatibility class.
 */
class Test_Class_Compatibility extends WP_UnitTestCase {

	/**
	 * Test disable_genesis_seo().
	 */
	public function test_disable_genesis_seo() {
		$compatibility = new RankMath\Compatibility();
		$array = [
			'classes'   => [],
			'functions' => [],
		];
		$result = $compatibility->disable_genesis_seo( $array );
		$this->assertContains( '\RankMath\RankMath', $result['classes'] );
		$this->assertContains( 'rank_math', $result['functions'] );
	}
}
