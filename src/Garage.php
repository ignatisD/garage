<?php
require_once "Vehicle.php";

class Garage
{
    protected $size;
    protected $types;
    protected $categories;
    protected $emptySpace;

    /**
     * @var Vehicle[]
     */
    protected $parked = [];

    /**
     * Garage constructor.
     * @param number $size
     * @param string[] $categories
     * @param string[] $types
     */
    function __construct($size, $categories, $types = [])
    {
        $this->size = $size;
        $this->emptySpace = $size;
        $this->categories = $categories;
        $this->types = $types;
    }

    public function canPark(Vehicle $vehicle) {
        $category = $vehicle->getCategory();
        $type = $vehicle->getType();
        $vSize = $vehicle->getSize();
        if (!in_array($category, $this->categories)) {
            return false;
        }
        if (sizeof($this->types) > 0 && !in_array($type, $this->types)) {
            return false;
        }
        if ($vSize > $this->emptySpace) {
            return false;
        }

        return true;
    }

    public function park(Vehicle $vehicle) {
        if (!$this->canPark($vehicle)) {
            return false;
        }
        $plate = $vehicle->getPlate();
        $this->parked[$plate] = $vehicle;
        $vehicle->parked = true;
        $this->emptySpace -= $vehicle->getSize();
        return true;
    }

}