<?php
/**
 * Created by PhpStorm.
 * User: briantbailey
 * Date: 9/16/15
 * Time: 8:21 PM
 */

namespace bbailey4\demo4;

class Car {
    private $doors;
    private $color;

    function __construct($acolor = 'blue'){
        $this->color = $acolor;
        $this->doors = 2;
    }

    /**
     * @return mixed
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * @param mixed $doors
     */
    public function setDoors($doors)
    {
        $this->doors = $doors;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    public function drive(){
        print 'Car is Driving!!!';
    }
}