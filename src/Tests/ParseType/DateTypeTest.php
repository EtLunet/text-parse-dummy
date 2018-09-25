<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Services\ParseType\DateType;

class DateTypeTest extends TestCase
{

    /**
     * @test
     */
	public function parseStringTest()
	{
		$testString = 'Morgen Kaffee kaufen';
		$dateType = new DateType();

		$dateType->parseString($testString);

		$result = $dateType->getResult();

		$this->assertCount(1, $result);
		$this->assertArrayHasKey('date', $result);
    }

	/**
	 * @test
	 */
	public function parseMorgenStringTest()
	{
		$testString = 'Morgen Kaffee kaufen';
		$morgen = (new \DateTime())->add(new \DateInterval('P1D'))->format('d.m.Y');
		$dateType = new DateType();

		$dateType->parseString($testString);

		$result = $dateType->getResult();

		$this->assertCount(1, $result['date']);
		$this->assertEquals($morgen, $result['date'][0]);
	}

	/**
	 * @test
	 */
	public function parseGesternStringTest()
	{
		$testString = 'Gestern Kaffee kaufen';
		$gestern = (new \DateTime())->sub(new \DateInterval('P1D'))->format('d.m.Y');
		$dateType = new DateType();

		$dateType->parseString($testString);

		$result = $dateType->getResult();

		$this->assertCount(1, $result['date']);
		$this->assertEquals($gestern, $result['date'][0]);
	}

	/**
	 * @test
	 */
	public function parseUebermorgenStringTest()
	{
		$testString = 'Übermorgen Kaffee kaufen';
		$ueber = (new \DateTime())->add(new \DateInterval('P2D'))->format('d.m.Y');
		$dateType = new DateType();

		$dateType->parseString($testString);

		$result = $dateType->getResult();

		$this->assertCount(2, $result['date']);
		$this->assertEquals($ueber, $result['date'][0]);
	}


}
