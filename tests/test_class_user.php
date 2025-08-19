<?php
/**
 * Class Test_Class_User
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\User class.
 */
class Test_Class_User extends WP_UnitTestCase {

	/**
	 * Test get().
	 */
	public function test_get() {
		$user_id = $this->factory->user->create();
		$user = RankMath\User::get( $user_id );
		$this->assertInstanceOf( 'RankMath\User', $user );
		$this->assertSame( $user_id, $user->ID );
	}

	/**
	 * Test get_meta().
	 */
	public function test_get_meta() {
		$user_id = $this->factory->user->create();
		update_user_meta( $user_id, 'rank_math_some_meta', 'some_value' );
		$this->assertSame( 'some_value', RankMath\User::get_meta( 'some_meta', $user_id ) );
	}
}
