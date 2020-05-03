<?php
require_once "vendor/autoload.php";

$myGarage = new Garage(800, [WheeledVehicle::CATEGORY], [Car::TYPE, Truck::TYPE]);
$timeUnit = Garage::TIMEUNIT;
$myGarage->setCostPer(2);

$truck = new Truck("Toyota");
$myGarage->park($truck);

$nowEmptySpace = $myGarage->getEmptySpace();
$parkedCount = $myGarage->getParkedCount();
$myGarage->log("Parked: {$parkedCount} and Space left: {$nowEmptySpace}");

sleep(1); // lets pretend 1 second = 1 day
$myGarage->log("One more {$timeUnit} has passed");

$car = new Car("Volkswagen");
$myGarage->park($car);

$nowEmptySpace = $myGarage->getEmptySpace();
$parkedCount = $myGarage->getParkedCount();
$myGarage->log("Parked: {$parkedCount} and Space left: {$nowEmptySpace}");

sleep(1);
$myGarage->log("One more {$timeUnit} has passed");

try {
    $parkedFor = $myGarage->parked($truck);
    $cost = $myGarage->unPark($truck);
    $myGarage->log("You parked for {$parkedFor} {$timeUnit}s. Please pay {$cost}");
} catch (\Exception $e) {
    echo $e->getMessage();
}

$nowEmptySpace = $myGarage->getEmptySpace();
$parkedCount = $myGarage->getParkedCount();
$myGarage->log("Parked: {$parkedCount} and Space left: {$nowEmptySpace}");