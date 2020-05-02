<?php
require_once "Vehicle.php";

abstract class WheeledVehicle extends Vehicle
{
    const WHEELED = "wheeled";

    protected $brand;
    protected $category;

    protected function __construct($brand, $type, $size = 25)
    {
        parent::__construct($type, $size);
        $this->category = WheeledVehicle::WHEELED;
        $this->brand = $brand;
        $this->plate = uniqid("W_");
    }

    public function getBrand() {
        return $this->brand;
    }

}