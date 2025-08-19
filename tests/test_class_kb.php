<?php
/**
 * Class Test_Class_Kb
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\KB class.
 */
class Test_Class_Kb extends WP_UnitTestCase {

	/**
	 * Test get().
	 */
	public function test_get() {
		$this->assertSame( 'https://rankmath.com/?utm_source=Plugin&utm_campaign=WP', RankMath\KB::get( 'seo-suite' ) );
		$this->assertSame( '#', RankMath\KB::get( 'non_existent_link' ) );
	}
}
