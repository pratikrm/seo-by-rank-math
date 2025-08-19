<?php
/**
 * Class Test_Class_Settings
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Settings class.
 */
class Test_Class_Settings extends WP_UnitTestCase {

	/**
	 * Test get().
	 */
	public function test_get() {
		$settings = new RankMath\Settings();
		update_option( 'rank-math-options-general', [ 'setting1' => 'value1' ] );
		$settings->reset();
		$this->assertSame( 'value1', $settings->get( 'general.setting1' ) );
	}

	/**
	 * Test set().
	 */
	public function test_set() {
		$settings = new RankMath\Settings();
		$settings->set( 'general', 'setting2', 'value2' );
		$this->assertSame( 'value2', $settings->get( 'general.setting2' ) );
	}

	/**
	 * Test all().
	 */
	public function test_all() {
		$settings = new RankMath\Settings();
		update_option( 'rank-math-options-general', [ 'setting3' => 'value3' ] );
		$settings->reset();
		$all_settings = $settings->all();
		$this->assertArrayHasKey( 'general', $all_settings );
		$this->assertArrayHasKey( 'setting3', $all_settings['general'] );
		$this->assertSame( 'value3', $all_settings['general']['setting3'] );
	}

	/**
	 * Test all_raw().
	 */
	public function test_all_raw() {
		$settings = new RankMath\Settings();
		update_option( 'rank-math-options-general', [ 'setting4' => 'value4' ] );
		$all_settings_raw = $settings->all_raw();
		$this->assertArrayHasKey( 'general', $all_settings_raw );
		$this->assertArrayHasKey( 'setting4', $all_settings_raw['general'] );
		$this->assertSame( 'value4', $all_settings_raw['general']['setting4'] );
	}
}
