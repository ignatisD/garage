<?php
require_once "WheeledVehicle.php";

class Car extends WheeledVehicle
{

    function __construct($brand, $size = 15)
    {
        parent::__construct($brand, WheeledVehicle::CAR, $size);
        $this->plate = uniqid("C_");
    }

}