<?php

abstract class WheeledVehicle extends Vehicle
{
    const CATEGORY = "wheeled";

    protected $brand;
    protected $category;

    protected function __construct($brand, $type, $size = 25)
    {
        parent::__construct($type, $size);
        $this->category = WheeledVehicle::CATEGORY;
        $this->brand = $brand;
        $this->plate = uniqid("W_");
    }

    public function getBrand() {
        return $this->brand;
    }

}