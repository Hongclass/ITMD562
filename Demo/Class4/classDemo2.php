<?php

class Car {
	private $color;

	function __construct($aColor = 'red'){
		$this->color = $aColor;
	}

	public function getColor(){
		return $this->color;
	}
}

class Ford extends Car {
	public $make = 'Ford';

	function __construct(){
		parent::__construct();
	}
}

$car = new Car('green');

//print $car->getColor();

$ford = new Ford();
print $ford->make;
print $ford->getColor();