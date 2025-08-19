<?php
/**
 * Class Test_Class_Rewrite
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Rewrite class.
 */
class Test_Class_Rewrite extends WP_UnitTestCase {

	/**
	 * Test author_link().
	 */
	public function test_author_link() {
		$this->set_permalink_structure( '/%author%/%postname%/' );
		$rewrite = new RankMath\Rewrite();
		$author_id = $this->factory->user->create( [ 'role' => 'author' ] );
		$author_nicename = get_the_author_meta( 'user_nicename', $author_id );
		update_user_meta( $author_id, 'rank_math_permalink', 'new-author-base' );
		$link = get_author_posts_url( $author_id );
		$this->assertStringContainsString( 'new-author-base', $rewrite->author_link( $link, $author_id, $author_nicename ) );
	}

	/**
	 * Test no_category_base().
	 */
	public function test_no_category_base() {
		$rewrite = new RankMath\Rewrite();
		$category = $this->factory->category->create_and_get();
		$link = get_term_link( $category, 'category' );
		$this->assertStringNotContainsString( '/category/', $rewrite->no_category_base( $link, $category, 'category' ) );
	}
}
