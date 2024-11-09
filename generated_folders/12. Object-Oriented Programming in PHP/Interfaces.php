<?php

// Define an interface
# An interface in PHP defines a contract for what methods a class must implement, but it does not provide the method implementations themselves. A class that implements an interface must implement all of its methods.
interface Shape {
    public function getArea();
    public function getPerimeter();
}

// Class implementing the Shape interface
class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    // Implementing the getArea method from the interface
    public function getArea() {
        return $this->width * $this->height;
    }

    // Implementing the getPerimeter method from the interface
    public function getPerimeter() {
        return 2 * ($this->width + $this->height);
    }
}

$rectangle = new Rectangle(5, 10);
echo "Area: " . $rectangle->getArea() . "\n";  // Outputs: Area: 50
echo "Perimeter: " . $rectangle->getPerimeter() . "\n";  // Outputs: Perimeter: 30
