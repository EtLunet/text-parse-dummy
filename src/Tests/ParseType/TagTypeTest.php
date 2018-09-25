<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Services\ParseType\TagType;

class TagTypeTest extends TestCase
{

    /**
     * @test
     */
	public function parseStringTest()
	{
		$tag = 'juhu';
		$testString = 'Wir machen einen Ausflug #'.$tag;
		$tagType = new TagType();

		$tagType->parseString($testString);

		$result = $tagType->getResult();

		$this->assertCount(1, $result);
		$this->assertArrayHasKey('tags', $result);
		$this->assertEquals($tag, $result['tags'][0]);
    }

	public function parseDoubleStringTest()
	{
		$tag1 = 'juhu';
		$tag2 = 'joho';
		$testString = 'Wir machen einen Ausflug #'. $tag1 . ' #'. $tag2 ;
		$tagType = new TagType();

		$tagType->parseString($testString);

		$result = $tagType->getResult();

		$this->assertCount(1, $result);
		$this->assertArrayHasKey('tags', $result);
		$this->assertCount(2, $result['tags']);
		$this->assertEquals($tag1, $result['tags'][0]);
		$this->assertEquals($tag2, $result['tags'][1]);
	}

}
