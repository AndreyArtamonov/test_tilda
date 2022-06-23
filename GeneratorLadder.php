<?php

class GeneratorLadder
{
	protected int $currentNumber = 1;
	protected int $maxNumber = 100;

	public function min(int $number): self
	{
		$this->currentNumber = $number;
		return $this;
	}

	public function max(int $number): self
	{
		$this->maxNumber = $number;
		return $this;
	}


	public function generate($string = ''): bool
	{
		if($this->currentNumber > $this->maxNumber) {
			return true;
		}

		$string = "$string $this->currentNumber \n";

		print '<div style="font-size: 10px">'.$string.'</div>';

		$this->currentNumber += 1;

		return $this->generate($string);
	}
}