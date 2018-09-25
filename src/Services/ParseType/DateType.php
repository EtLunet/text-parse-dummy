<?php

namespace Services\ParseType;


class DateType implements Type
{
	protected $patternWords = ['uebermorgen', 'morgen', 'gestern'];
	protected $patternDates = ['([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4})'];

	protected $convertChars = ['ä' => 'ae', 'ö' => 'oe',  'ü'=>'ue'];

	private $matches = [];

	public function getPatterns(): array
	{
		return array_merge($this->patternWords, $this->patternDate);
	}

	public function parseString(string $input): array
	{
		$decodeInput = $this->decodeString($input);

		/** parse $patternWords */
		foreach ($this->patternWords as $pattern) {

			if (preg_match('/' . $pattern . '/', $decodeInput)) {
				$funcName = "get" . ucwords($pattern);

				$this->matches[] = $this->setFormat($this->$funcName());
			}
		}

		/** parse $patternDates  */
		foreach ($this->patternDates as $pattern) {
			if (preg_match_all('/' . $pattern . '/', $decodeInput, $dateMatches)) {
				/** @var  \DateTime $date */
				$date = getDate($dateMatches[0]);
				$this->matches[] = $this->setFormat($date);
			}
		}

		return $this->matches;
	}

	protected function getMorgen() : \DateTime
	{
		return (new \DateTime())->add(new \DateInterval('P1D'));
	}

	protected function getGestern() : \DateTime
	{
		return (new \DateTime())->sub(new \DateInterval('P1D'));
	}

	protected function getUebermorgen() : \DateTime
	{
		return (new \DateTime())->add(new \DateInterval('P2D'));
	}

	protected function getDate(string $dateTime) : \DateTime
	{
		return new \DateTime($dateTime);
	}

	protected function setFormat(\DateTime $dateTime)
	{
		return $dateTime->format('d.m.Y');
	}

	protected function decodeString(string $input) : string
	{
		$input = mb_strtolower($input);
		foreach ($this->convertChars as $orig => $ersatz) {
			$input = str_replace($orig, $ersatz, $input);
		}
		return $input;

	}

	public function getResult(): array
	{
		return ['date' => $this->matches];
	}
}