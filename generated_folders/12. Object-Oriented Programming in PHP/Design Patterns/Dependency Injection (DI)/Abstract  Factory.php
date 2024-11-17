<?php

# Abstract Factory Pattern:

## The Abstract Factory is a creational design pattern that provides an interface for creating families of related or dependent objects without specifying their concrete classes.
## It allows a system to be independent of how its objects are created, composed, and represented.

interface Product {
    public function doSomething();
}

class ConcreteProductA implements Product {
    public function doSomething() {
        echo "Product A doing something\n";
    }
}

class ConcreteProductB implements Product {
    public function doSomething() {
        echo "Product B doing something\n";
    }
}

interface AbstractFactory {
    public function createProduct(): Product;
}

class ConcreteFactoryA implements AbstractFactory {
    public function createProduct(): Product {
        return new ConcreteProductA();
    }
}

class ConcreteFactoryB implements AbstractFactory {
    public function createProduct(): Product {
        return new ConcreteProductB();
    }
}

// Client code depends on AbstractFactory and Product, not on concrete factories
function clientCode(AbstractFactory $factory) {
    $product = $factory->createProduct();
    $product->doSomething();
}

// Usage
$factoryA = new ConcreteFactoryA();
clientCode($factoryA); // Outputs: Product A doing something

$factoryB = new ConcreteFactoryB();
clientCode($factoryB); // Outputs: Product B doing something
