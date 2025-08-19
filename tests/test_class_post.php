<?php
/**
 * Class Test_Class_Post
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Post class.
 */
class Test_Class_Post extends WP_UnitTestCase {

	/**
	 * Test get().
	 */
	public function test_get() {
		$post_id = $this->factory->post->create();
		$post = RankMath\Post::get( $post_id );
		$this->assertInstanceOf( 'RankMath\Post', $post );
		$this->assertSame( $post_id, $post->ID );
	}

	/**
	 * Test get_meta().
	 */
	public function test_get_meta() {
		$post_id = $this->factory->post->create();
		update_post_meta( $post_id, 'rank_math_some_meta', 'some_value' );
		$this->assertSame( 'some_value', RankMath\Post::get_meta( 'some_meta', $post_id ) );
	}

	/**
	 * Test get_simple_page_id().
	 */
	public function test_get_simple_page_id() {
		$post_id = $this->factory->post->create( [ 'post_type' => 'page' ] );
		$this->go_to( get_permalink( $post_id ) );
		$this->assertSame( $post_id, RankMath\Post::get_simple_page_id() );
	}

	/**
	 * Test is_simple_page().
	 */
	public function test_is_simple_page() {
		$post_id = $this->factory->post->create( [ 'post_type' => 'page' ] );
		$this->go_to( get_permalink( $post_id ) );
		$this->assertTrue( RankMath\Post::is_simple_page() );
	}
}
