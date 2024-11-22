<?php

use PHPUnit\Framework\TestCase;

/**
 * Tests for the WPStreamImporter class.
 */
class WPStreamImporterTests extends TestCase {

	protected function setUp(): void {
		parent::setUp();

		if ( ! isset( $_SERVER['SERVER_SOFTWARE'] ) || $_SERVER['SERVER_SOFTWARE'] !== 'PHP.wasm' ) {
			$this->markTestSkipped( 'Test only runs in Playground' );
		}
	}

	public function test_import_wxr_is_missing() {
		$import = data_liberation_import( __DIR__ . '/wxr/not-a-valid-file.xml' );

		$this->assertFalse( $import );
	}

	public function test_import_simple_wxr() {
		$import = data_liberation_import( __DIR__ . '/wxr/small-export.xml' );

		$this->assertTrue( $import );
	}
}
