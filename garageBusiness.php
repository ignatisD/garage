<?php
require_once "src/Vehicle.php";
require_once "src/WheeledVehicle.php";
require_once "src/Garage.php";
require_once "src/Car.php";
require_once "src/Truck.php";

$myGarage = new Garage(800, [WheeledVehicle::CATEGORY], [Car::TYPE, Truck::TYPE]);
$myGarage->setCostPer(2);

$truck = new Truck("Toyota");
$myGarage->park($truck);

$nowEmptySpace = $myGarage->getEmptySpace();
$parkedCount = $myGarage->getParkedCount();
$myGarage->log("Parked: {$parkedCount} and Space left: {$nowEmptySpace}");

sleep(1); // lets pretend 1 second = 1 day
$myGarage->log("One more day has passed");

$car = new Car("Volkswagen");
$myGarage->park($car);

$nowEmptySpace = $myGarage->getEmptySpace();
$parkedCount = $myGarage->getParkedCount();
$myGarage->log("Parked: {$parkedCount} and Space left: {$nowEmptySpace}");

sleep(1);
$myGarage->log("One more day has passed");

try {
    $cost = $myGarage->unPark($truck);
    $myGarage->log("Please pay {$cost}");
} catch (\Exception $e) {
    echo $e->getMessage();
}

$nowEmptySpace = $myGarage->getEmptySpace();
$parkedCount = $myGarage->getParkedCount();
$myGarage->log("Parked: {$parkedCount} and Space left: {$nowEmptySpace}");