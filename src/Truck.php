<?php

class Truck extends WheeledVehicle
{
    const TYPE = "truck";

    function __construct($brand, $size = 25)
    {
        parent::__construct($brand, Truck::TYPE, $size);
        $this->plate = uniqid("T_");
    }

}