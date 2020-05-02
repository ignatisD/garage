<?php
require_once "Vehicle.php";

abstract class WheeledVehicle extends Vehicle
{
    const CAR = "car";
    const TRUCK = "truck";

    protected $brand;
    protected $category;

    function __construct($brand, $type, $size = 25)
    {
        parent::__construct($type, $size);
        $this->category = Vehicle::WHEELED;
        $this->brand = $brand;
        $this->plate = uniqid("W_");
    }

    public function getBrand() {
        return $this->brand;
    }

}