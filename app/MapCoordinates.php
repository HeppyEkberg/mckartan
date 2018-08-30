<?php
namespace App;

class MapCoordinates
{

    public $zoom = 5;
    public $latitude = 63.1717547;
    public $longitude = 14.7717495;

    public function zoom($value) {
        $this->zoom = $value;
        return $this;
    }

    public function latitude($val) {
        $this->latitude = $val;
        return $this;
    }

    public function longitude($val) {
        $this->longitude = $val;
        return $this;
    }

}