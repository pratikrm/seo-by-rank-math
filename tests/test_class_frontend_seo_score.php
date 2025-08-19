<?php
/**
 * Class Test_Class_Frontend_Seo_Score
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Frontend_SEO_Score class.
 */
class Test_Class_Frontend_Seo_Score extends WP_UnitTestCase {

	/**
	 * Test get_rating().
	 */
	public function test_get_rating() {
		$frontend_seo_score = new RankMath\Frontend_SEO_Score();
		$this->assertSame( 'bad', $frontend_seo_score->get_rating( 40 ) );
		$this->assertSame( 'good', $frontend_seo_score->get_rating( 70 ) );
		$this->assertSame( 'great', $frontend_seo_score->get_rating( 90 ) );
	}

	/**
	 * Test get_score().
	 */
	public function test_get_score() {
		$frontend_seo_score = new RankMath\Frontend_SEO_Score();
		$post_id = $this->factory->post->create();
		update_post_meta( $post_id, 'rank_math_seo_score', 85 );
		$this->assertSame( '85', $frontend_seo_score->get_score( $post_id ) );
	}
}
