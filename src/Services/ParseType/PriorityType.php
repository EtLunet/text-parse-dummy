<?php

namespace Services\ParseType;


class PriorityType implements Type
{
	private $patterns = ['§p([0-9]+)'];
	private $matches = [];

	public function getPatterns(): array
	{
		return $this->patterns;
	}

	public function parseString(string $input): array
	{
		$priorityMatches = [];
		foreach ($this->getPatterns() as $pattern) {
			preg_match_all('/'. $pattern .'/', strtolower($input), $priorityMatches);
		}

		if(count($priorityMatches[1]) > 0) {
			foreach ($priorityMatches[1] as $match) {
				$this->matches[] = $match;
			}
		}

		return $this->matches;

	}

	public function getResult(): array
	{
		return ['priority' => $this->matches];
	}
}