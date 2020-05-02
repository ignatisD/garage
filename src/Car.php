<?php

class Car extends WheeledVehicle
{
    const TYPE = "car";

    function __construct($brand, $size = 15)
    {
        parent::__construct($brand, CAR::TYPE, $size);
        $this->plate = uniqid("C_");
    }

}