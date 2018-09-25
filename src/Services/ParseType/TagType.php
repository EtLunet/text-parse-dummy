<?php
/**
 * Created by PhpStorm.
 * User: an-stas-stan
 * Date: 25.09.18
 * Time: 11:11
 */

namespace Services\ParseType;


class TagType implements Type
{
	private $patterns = ['#([a-zA-Z0-9äÄüÜöÖ]+)'];
	private $matches = [];

	public function getPatterns(): array
	{
		return $this->patterns;
	}

	public function parseString(string $input): array
	{
		$tagMatches = [];

		foreach ($this->getPatterns() as $pattern) {
			preg_match_all('/'. strtolower($pattern) .'/', $input, $tagMatches);
		}

		if(count($tagMatches[1]) > 0){
			foreach ($tagMatches[1] as $match) {
				$this->matches[] = $match;
			}
		}

		return $this->matches;
	}

	public function getResult(): array
	{
		return ['tags' => $this->matches];
	}
}