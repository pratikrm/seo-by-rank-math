<?php
/**
 * Class Test_Class_Installer
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Installer class.
 */
class Test_Class_Installer extends WP_UnitTestCase {

	/**
	 * Test on_delete_blog().
	 */
	public function test_on_delete_blog() {
		global $wpdb;
		$installer = new RankMath\Installer();
		$tables = [ 'some_table' ];
		$result = $installer->on_delete_blog( $tables );
		$this->assertContains( $wpdb->prefix . 'rank_math_404_logs', $result );
		$this->assertContains( $wpdb->prefix . 'rank_math_redirections', $result );
		$this->assertContains( $wpdb->prefix . 'rank_math_redirections_cache', $result );
		$this->assertContains( $wpdb->prefix . 'rank_math_internal_links', $result );
		$this->assertContains( $wpdb->prefix . 'rank_math_internal_meta', $result );
		$this->assertContains( $wpdb->prefix . 'rank_math_sc_analytics', $result );
	}
}
