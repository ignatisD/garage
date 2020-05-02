<?php
require_once "src/Vehicle.php";
require_once "src/Garage.php";
require_once "src/Car.php";
require_once "src/Truck.php";

$myGarage = new Garage(800, [Vehicle::WHEELED], [Car::CAR, Truck::TRUCK]);

$car = new Car("Volkswagen");
$myGarage->park($car);

$truck = new Truck("Toyota");
$myGarage->park($truck);