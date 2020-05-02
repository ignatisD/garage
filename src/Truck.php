<?php
require_once "WheeledVehicle.php";

class Truck extends WheeledVehicle
{

    function __construct($brand, $size = 25)
    {
        parent::__construct($brand, WheeledVehicle::TRUCK, $size);
        $this->plate = uniqid("T_");
    }

}