<?php
/**
 * Class Test_Class_Defaults
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Defaults class.
 */
class Test_Class_Defaults extends WP_UnitTestCase {

	/**
	 * Test exclude_taxonomies().
	 */
	public function test_exclude_taxonomies() {
		$defaults = new RankMath\Defaults();
		$taxonomies = [
			'post_format'            => 'post_format',
			'product_shipping_class' => 'product_shipping_class',
			'category'               => 'category',
		];
		$result = $defaults->exclude_taxonomies( $taxonomies );
		$this->assertArrayNotHasKey( 'product_shipping_class', $result );
	}

	/**
	 * Test excluded_post_types().
	 */
	public function test_excluded_post_types() {
		$defaults = new RankMath\Defaults();
		$post_types = [
			'elementor_library' => 'elementor_library',
			'post'              => 'post',
		];
		$result = $defaults->excluded_post_types( $post_types );
		$this->assertArrayNotHasKey( 'elementor_library', $result );
	}
}
