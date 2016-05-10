<?php
/**
 * Created by PhpStorm.
 * User: briantbailey
 * Date: 9/16/15
 * Time: 8:21 PM
 */

namespace bbailey4\app;

class Car {
    public $color = 'green';
}

require_once 'Car.php';

use \bbailey4\demo4;

$c = new demo4\Car('red');
$c2 = new Car();

print $c->getColor();
print PHP_EOL;
print $c2->color;
print PHP_EOL;
$date = new \DateTime('2000-01-01', new \DateTimeZone('Pacific/Nauru'));
echo $date->format('Y-m-d H:i:sP') . "\n";