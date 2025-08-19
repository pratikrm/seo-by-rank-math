<?php
/**
 * Class Test_Class_Helper
 *
 * @package Rank_Math
 */

/**
 * Sample test case.
 */
class Test_Class_Helper extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_get_settings_default_value() {
		// Replace this with some real tests.
		$this->assertSame( 'default_value', RankMath\Helper::get_settings( 'non_existent_setting', 'default_value' ) );
	}

	/**
	 * Test get_midnight().
	 */
	public function test_get_midnight() {
		$this->assertSame( 1577836800, RankMath\Helper::get_midnight( 1577880000 ) );
	}

	/**
	 * Test get_url_part().
	 */
	public function test_get_url_part() {
		$url = 'https://rankmath.com/blog/wordpress-seo/?key=value';
		$this->assertSame( 'rankmath.com', RankMath\Helper::get_url_part( $url, 'host' ) );
		$this->assertSame( '/blog/wordpress-seo/', RankMath\Helper::get_url_part( $url, 'path' ) );
		$this->assertSame( 'key=value', RankMath\Helper::get_url_part( $url, 'query' ) );
	}

	/**
	 * Test replace_vars().
	 */
	public function test_replace_vars() {
		$this->assertSame(
			'Hello World',
			RankMath\Helper::replace_vars( 'Hello %custom_variable%', [ 'custom_variable' => 'World' ] )
		);
	}
}
