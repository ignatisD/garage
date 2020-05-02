<?php
require_once "WheeledVehicle.php";

class Truck extends WheeledVehicle
{
    const TRUCK = "truck";

    function __construct($brand, $size = 25)
    {
        parent::__construct($brand, Truck::TRUCK, $size);
        $this->plate = uniqid("T_");
    }

}