<?php

class SampleClass {
	public $color = 'blue2';

	public static $size = 25;

	const COUNT = 50;

	protected $name = 'brian';

	public function getColor(){
		print $this->color;
		print self::$size;
		print self::COUNT;
	}
}

$obj = new SampleClass();

print $obj->getColor();

print $obj->name;  //error

print PHP_EOL;

print SampleClass::$size;

SampleClass::COUNT;