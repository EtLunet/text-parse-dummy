<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Services\ParseType\PriorityType;

class PriorityTypeTest extends TestCase
{

    /**
     * @test
     */
	public function parseStringTest()
	{
		$priority = 2;
		$testString = "§p" . $priority . " Wurst einkaufen";
		$priorityType = new PriorityType();

		$priorityType->parseString($testString);

		$result = $priorityType->getResult();

		$this->assertCount(1, $result);
		$this->assertArrayHasKey('priority', $result);
		$this->assertEquals($priority, $result['priority'][0]);
    }

	/**
	 * @test
	 */
	public function parseDoubleStringTest()
	{
		$priority1 = 2;
		$priority2 = 3;
		$testString = "§p" . $priority1 . " Wurst einkaufen §p". $priority2;
		$priorityType = new PriorityType();

		$priorityType->parseString($testString);

		$result = $priorityType->getResult();

		$this->assertCount(1, $result);
		$this->assertArrayHasKey('priority', $result);
		$this->assertCount(2, $result['priority']);
		$this->assertEquals($priority1, $result['priority'][0]);
		$this->assertEquals($priority2, $result['priority'][1]);
	}


}
