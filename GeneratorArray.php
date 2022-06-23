<?php


class GeneratorArray
{
	protected array $excluded;
	protected array $array;

	protected int $min = 1;
	protected int $max = 1000;

	public function __construct()
	{
		$this->excluded = [];
		$this->array = [];
	}

	public function min(int $number): self
	{
		$this->min = $number;
		return $this;
	}

	public function max(int $number): self
	{
		$this->max = $number;
		return $this;
	}

	public function generate(int $columns = 5, int $rows = 7): void
	{
		for ($currentRow = 0; $currentRow < $rows; $currentRow++) {
			for ($currentColumn = 0; $currentColumn < $columns; $currentColumn++) {
				$this->array[$currentRow][$currentColumn] = $this->getRandomNumber();
			}
		}
	}

	public function getResult():array {
		return $this->array;
	}

	protected function getRandomNumber(): int
	{
		$number = mt_rand($this->min, $this->max);

		if($this->isNotExcludedNumber($number)) {
			$this->addExcludeNumber($number);
			return $number;
		}

		return $this->getRandomNumber();
	}

	protected function isNotExcludedNumber(int $number): bool
	{
		return !in_array($number, $this->excluded);
	}

	protected function addExcludeNumber(int $number): void
	{
		array_push($this->excluded, $number);
	}

}