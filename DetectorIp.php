<?php

class DetectorIp
{
	const DEFAULT_PHONE = '8 (800) 888-88-88';

	protected string $ip;
	protected array $data;
	protected array $phoneNumbers;

	public function __construct(string $ip)
	{
		$this->ip = $ip;

		$this->phoneNumbers = [
			'Moscow' => '8 (800) 111-11-11',
			'Saint Petersburg' => '8 (800) 222-22-22',
			'Kemerovo' => '8 (800) 333-44-44',
		];

		$this->loadData();
	}

	public function loadData() {
		$response = file_get_contents('http://ipwho.is/' . $this->ip);
		$this->data = json_decode($response, true);
	}

	public function getData(): array
	{
		return $this->data;
	}

	public function getPhone()
	{
		if(array_key_exists($this->data['city'], $this->phoneNumbers)) {
			return $this->phoneNumbers[$this->data['city']];
		}

		return self::DEFAULT_PHONE;
	}
}