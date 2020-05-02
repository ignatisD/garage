<?php
require_once "WheeledVehicle.php";

class Car extends WheeledVehicle
{
    const CAR = "car";

    function __construct($brand, $size = 15)
    {
        parent::__construct($brand, CAR::CAR, $size);
        $this->plate = uniqid("C_");
    }

}