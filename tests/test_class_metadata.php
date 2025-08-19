<?php
/**
 * Class Test_Class_Metadata
 *
 * @package Rank_Math
 */

/**
 * Mock class for Metadata.
 */
class Mock_Metadata extends RankMath\Metadata {

	/**
	 * Meta type.
	 *
	 * @var string
	 */
	protected $meta_type = 'post';


	/**
	 * Set object id.
	 *
	 * @param int $object_id Object id.
	 */
	public function set_object_id( $object_id ) {
		$this->object_id = $object_id;
	}
}

/**
 * Test case for RankMath\Metadata class.
 */
class Test_Class_Metadata extends WP_UnitTestCase {

	/**
	 * Test get_metadata().
	 */
	public function test_get_metadata() {
		$post_id = $this->factory->post->create();
		update_post_meta( $post_id, 'rank_math_some_meta', 'some_value' );
		$metadata = new Mock_Metadata( get_post( $post_id ) );
		$metadata->set_object_id( $post_id );
		$this->assertSame( 'some_value', $metadata->get_metadata( 'some_meta' ) );
	}

	/**
	 * Test maybe_replace_vars().
	 */
	public function test_maybe_replace_vars() {
		$replacer = new RankMath\Replace_Variables\Replacer();
		rank_math()->variables = new RankMath\Replace_Variables\Manager();
		rank_math_register_var_replacement(
			'title',
			[
				'name'        => 'Title',
				'description' => 'Post Title',
				'variable'    => 'title',
				'example'     => 'Title',
			],
			function() {
				return 'Hello World';
			}
		);

		$this->assertSame( 'Hello World', $replacer->replace( '%title%' ) );
	}
}
