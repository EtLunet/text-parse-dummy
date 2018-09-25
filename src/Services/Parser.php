<?php
namespace Services;


use Services\ParseType\Type;

class Parser
{
	private $types = [];

	public function addType(Type $parseType) : void
	{
		$this->types[] = new $parseType;
	}

	public function parse(string $input) : array
	{
		$result = ['input' => $input, 'merkmale' => []];
		foreach ($this->types as $type) {
			if(count($type->parseString($input)) > 0) {
				$result['merkmale'] = array_merge($result['merkmale'], $type->getResult());
			}
		}
		return $result;
	}
}