<?php
/**
 * Class Test_Class_Data_Encryption
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Data_Encryption class.
 */
class Test_Class_Data_Encryption extends WP_UnitTestCase {

	/**
	 * Test encrypt() and decrypt().
	 */
	public function test_encrypt_decrypt() {
		$original_string = 'This is a test string.';
		$encrypted_string = RankMath\Data_Encryption::encrypt( $original_string );
		$this->assertNotEquals( $original_string, $encrypted_string );
		$this->assertSame( $original_string, RankMath\Data_Encryption::decrypt( $encrypted_string ) );
	}

	/**
	 * Test deep_encrypt() and deep_decrypt().
	 */
	public function test_deep_encrypt_decrypt() {
		$original_array = [
			'key1' => 'value1',
			'key2' => [
				'nested_key' => 'nested_value',
			],
		];
		$encrypted_array = RankMath\Data_Encryption::deep_encrypt( $original_array );
		$this->assertNotEquals( $original_array, $encrypted_array );
		$this->assertSame( $original_array, RankMath\Data_Encryption::deep_decrypt( $encrypted_array ) );
	}

	/**
	 * Test is_available().
	 */
	public function test_is_available() {
		$this->assertTrue( RankMath\Data_Encryption::is_available() );
	}
}
