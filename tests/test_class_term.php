<?php
/**
 * Class Test_Class_Term
 *
 * @package Rank_Math
 */

/**
 * Test case for RankMath\Term class.
 */
class Test_Class_Term extends WP_UnitTestCase {

	/**
	 * Test get().
	 */
	public function test_get() {
		$term_id = $this->factory->category->create();
		$term = RankMath\Term::get( $term_id );
		$this->assertInstanceOf( 'RankMath\Term', $term );
		$this->assertSame( $term_id, $term->term_id );
	}

	/**
	 * Test get_meta().
	 */
	public function test_get_meta() {
		$term_id = $this->factory->category->create();
		update_term_meta( $term_id, 'rank_math_some_meta', 'some_value' );
		$this->assertSame( 'some_value', RankMath\Term::get_meta( 'some_meta', $term_id ) );
	}
}
