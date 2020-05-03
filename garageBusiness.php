<?php
require_once "vendor/autoload.php";

$timeUnit = Garage::TIMEUNIT;
$myGarage = new Garage(800, [WheeledVehicle::CATEGORY], [Car::TYPE, Truck::TYPE]);
$myGarage->setCostPer(2);

$truck = new Truck("Toyota");
$myGarage->park($truck);

$myGarage->log("Parked: {$myGarage->getParkedCount()} and Space left: {$myGarage->getEmptySpace()}");

sleep(1); // lets pretend 1 second = 1 day
$myGarage->log("One more {$timeUnit} has passed");

$car = new Car("Volkswagen");
$myGarage->park($car);

$myGarage->log("Parked: {$myGarage->getParkedCount()} and Space left: {$myGarage->getEmptySpace()}");

sleep(1);
$myGarage->log("One more {$timeUnit} has passed");

try {
    $parkedFor = $myGarage->parked($truck);
    $cost = $myGarage->unPark($truck);
    $myGarage->log("You parked for {$parkedFor} {$timeUnit}s. Please pay {$cost}");
} catch (\Exception $e) {
    echo $e->getMessage();
}

$myGarage->log("Parked: {$myGarage->getParkedCount()} and Space left: {$myGarage->getEmptySpace()}");