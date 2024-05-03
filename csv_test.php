<?php
// @todo update tests to PHPUnit
die();

require_once('class.csv.php');

/**
 * Tests the \Module\CSV\Document() class
 *
 * @internal
 * @date August 13, 2014
 * @author Jaime A. Rodriguez <hi.i.am.jaime@gmail.com>
 * @version 1.8
 * @license  http://opensource.org/licenses/MIT
 */
class TestOfCSV extends UnitTestCase {
	function setUp() {
		$this->filename = getcwd() . '/testing.csv';
		$this->csv = new \Module\CSV\Document($this->filename);
	}

	function tearDown() {
		unlink($this->filename);
	}

	// Test the CSV class
	function testCSV() {
		// Add a single record
		$this->csv->add(array(
			'Abraham',
			'Lincoln'
		));

		// Add multiple new records
		$data = array(
			array('George', 'Washington'),
			array('Bill', 'Clinton')
		);
		$this->csv->add($data);

		// Search for rows and delete them
		$results = $this->csv->search('Lincoln');
		$this->assertTrue(count($results) === 1);

		foreach ($results as $key => $value) {
			$this->assertTrue($this->csv->delete($key));
		}

		// There should not be any more 'Lincoln'
		$this->assertFalse($this->csv->search('Lincoln'));

		// Check if exception is thrown for invalid index
		$this->expectException(new Exception("CSV::delete - Row does not exist. Data not removed."));
		$this->csv->delete(10000000);

		// Make sure saving works
		$this->assertTrue($this->csv->save());
		$this->assertTrue(file_exists($this->filename));
	}
}