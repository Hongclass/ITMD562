<?php

class City {
	public $country;
	public $name;
	public $lat;
	public $lng;
	public $altitude;

	function __construct($country,$name,$lat,$lng,$altitude){
		$this->$country = $country;
		$this->$name = $name;
		$this->$lat = $lat;
		$this->$lng = $lng;
		$this->$altitude = $altitude;
	}
}

$countries = array();

if (($handle = fopen("city.csv", "r")) !== FALSE) {
	$row = 1;
    while (($data = fgetcsv($handle)) !== FALSE) {
    	if ($row != 1) {
    		$obj = new City($data[0],$data[1],$data[2],$data[3],$data[4]);
    		array_push($countries, $obj);
    	}
    	$row++;
    }
    fclose($handle);
}

//print_r($countries);

$serialData = serialize($countries);

//print_r($serialData);

file_put_contents("citybackup.txt", $serialData) or die("ERROR: Cannot write the file");
print 'File Written';

?>