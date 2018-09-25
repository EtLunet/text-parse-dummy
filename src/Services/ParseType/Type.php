<?php
namespace Services\ParseType;


interface Type
{
	/**
	 * @return array patterns
	 */
	public function getPatterns() : array;

	/**
	 * @param string $input
	 * @return array
	 */
	public function parseString(string $input) : array;

	public function getResult() : array;

}