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
    protected $parkedAt = [];

    protected $perSize;
    /**
     * Garage constructor.
     * @param int $size
     * @param string[] $categories
     * @param string[] $types
     */
    function __construct($size, $categories, $types = [])
    {
        $this->size = $size;
        $this->emptySpace = $size;
        $this->categories = $categories;
        $this->types = $types;
        $this->setCostPer(1);
    }

    protected function now() {
        return date("Y-m-d H:i:s");
    }

    public function log($line = "") {
        echo $line.PHP_EOL;
    }

    public function setCostPer($costPer = 1) {
        $this->perSize = $costPer;
        return $this;
    }

    public function getCostPer() {
        return $this->perSize;
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
        $this->parkedAt[$plate] = $this->now();
        $vehicle->parked = true;
        $this->emptySpace -= $vehicle->getSize();
        return true;
    }

    /**
     * @param Vehicle $vehicle
     * @return float|int
     * @throws ErrorException
     */
    public function unPark(Vehicle $vehicle) {
        $plate = $vehicle->getPlate();
        if (!isset($this->parked[$plate])) {
            throw new ErrorException("Vehicle not parked in the garage");
        }
        $cost = $this->cost($vehicle);
        unset($this->parked[$plate]);
        unset($this->parkedAt[$plate]);
        $vehicle->parked = false;
        $this->emptySpace += $vehicle->getSize();
        return $cost;
    }

    public function cost(Vehicle $vehicle, $timeUnits = null) {
        if (!$timeUnits && !isset($this->parkedAt[$vehicle->getPlate()])) {
            return 0;
        }
        if (!$timeUnits) {
            $parkedAt = $this->parkedAt[$vehicle->getPlate()];
            $now = $this->now();
            $timeUnits = ceil(abs(strtotime($now) - strtotime($parkedAt))); // seconds
        }
        return $this->getCostPer() * $timeUnits * $vehicle->getSize();
    }


    /**
     * @return int
     */
    public function getEmptySpace() {
        return $this->emptySpace;
    }

    /**
     * @return int
     */
    public function getParkedCount() {
        return sizeof($this->parked);
    }
}