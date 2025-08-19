<?php
/**
 * Class Test_Class_Common
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Common class.
 */
class Test_Class_Common extends WP_UnitTestCase {

	/**
	 * Test nofollow_link().
	 */
	public function test_nofollow_link() {
		$common = new RankMath\Common();
		$this->assertSame( '<a rel="nofollow" href="#">link</a>', $common->nofollow_link( '<a href="#">link</a>' ) );
		$this->assertSame( '<a rel="nofollow" href="#">link</a>', $common->nofollow_link( '<a rel="nofollow" href="#">link</a>' ) );
	}

	/**
	 * Test hide_rank_math_meta().
	 */
	public function test_hide_rank_math_meta() {
		$common = new RankMath\Common();
		$this->assertTrue( $common->hide_rank_math_meta( false, 'rank_math_some_meta' ) );
		$this->assertFalse( $common->hide_rank_math_meta( false, 'some_other_meta' ) );
	}
}
