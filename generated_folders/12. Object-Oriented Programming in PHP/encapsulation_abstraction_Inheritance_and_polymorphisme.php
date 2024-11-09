<?php

// Encapsulation: Using private properties and public methods to control access to data
class Car {
    private $brand;
    private $model;

    // Setter and Getter (Encapsulation)
    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getModel() {
        return $this->model;
    }

    // Method to display car details
    public function displayDetails() {
        echo "Car Brand: " . $this->getBrand() . "\n";
        echo "Model: " . $this->getModel() . "\n \n";
    }
}

// Abstraction: Hiding the complexity of the start method through an abstract class
abstract class Vehicle {
    // Abstract method (must be implemented by subclasses)
    abstract public function start();

    public function stop() {
        echo "Vehicle stopped.\n \n";
    }
}

class Bike extends Vehicle {
    public function start() {
        echo "Bike started.\n";
    }
}

// Inheritance: Child class inherits from Car class
class ElectricCar extends Car {
    private $batteryLevel;

    public function setBatteryLevel($level) {
        $this->batteryLevel = $level;
    }

    public function getBatteryLevel() {
        return $this->batteryLevel;
    }

    // Overriding the displayDetails method (Polymorphism)
    public function displayDetails() {
        parent::displayDetails();
        echo "Battery Level: " . $this->getBatteryLevel() . "\n";
    }
}

// Polymorphism: Different classes implement the same method in their own way
class Truck extends Vehicle {
    public function start() {
        echo "Truck started with a loud noise.\n";
    }
}

// Creating objects and demonstrating OOP principles

// Encapsulation Example
$car = new Car();
$car->setBrand("Toyota");
$car->setModel("Corolla");
$car->displayDetails(); // Displays brand and model

// Abstraction Example
$bike = new Bike();
$bike->start(); // Calls the start method specific to the Bike class
$bike->stop();  // Calls the stop method from Vehicle class

// Inheritance Example

$electricCar = new ElectricCar();
$electricCar->setBrand("Tesla");
$electricCar->setModel("Model S");
$electricCar->setBatteryLevel(85);
$electricCar->displayDetails(); // Displays brand, model, and battery level

// Polymorphism Example
$truck = new Truck();
$truck->start(); // Calls the start method specific to the Truck class
$truck->stop();  // Calls the stop method from Vehicle class
