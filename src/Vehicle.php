<?php


abstract class Vehicle
{
    const GENERIC = "generic";

    protected $size;
    protected $category;
    protected $type;
    protected $plate;
    public $parked = false;

    protected function __construct($type, $size = 1)
    {
        $this->type = $type;
        $this->size = $size;
        $this->category = Vehicle::GENERIC;
        $this->plate = uniqid("V_");
    }

    public function getSize() {
        return $this->size;
    }

    public function getType() {
        return $this->type;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getPlate() {
        return $this->plate;
    }
}