<?php


echo "#. Open/Closed Principle (OCP)" . PHP_EOL;
echo "  - Pattern: Decorator Pattern" . PHP_EOL;
echo "Scenario: A pizza shop that can offer different types of pizza with various toppings. The system should allow new toppings to be added without modifying the existing pizza class." . PHP_EOL;
echo "#############################################################################################\n\n";

// Component Interface
interface Pizza {
    public function cost();
}

// Concrete Component
class BasicPizza implements Pizza {
    public function cost() {
        return 10; // Basic pizza cost
    }
}

// Decorators (Enhancers)
class CheeseDecorator implements Pizza {
    private $pizza;

    public function __construct(Pizza $pizza) {
        $this->pizza = $pizza;
    }

    public function cost() {
        return $this->pizza->cost() + 2; // Add cheese cost
    }
}

class PepperoniDecorator implements Pizza {
    private $pizza;

    public function __construct(Pizza $pizza) {
        $this->pizza = $pizza;
    }

    public function cost() {
        return $this->pizza->cost() + 3; // Add pepperoni cost
    }
}

// Client Code
$basicPizza = new BasicPizza();
echo "Cost of basic pizza: " . $basicPizza->cost() . "\n";

$cheesePizza = new CheeseDecorator($basicPizza);
echo "Cost of pizza with cheese: " . $cheesePizza->cost() . "\n";

$fullPizza = new PepperoniDecorator($cheesePizza);
echo "Cost of pizza with cheese and pepperoni: " . $fullPizza->cost() . "\n";


echo "\n\n#############################################################################################\n\n";

$Explanation = " Why Decorator: The Decorator Pattern allows us to add new toppings (decorators) to pizzas dynamically, without modifying the existing Pizza class. The system is open for extension (you can add new toppings) but closed for modification (no need to change the existing pizza classes)." . PHP_EOL;
echo $Explanation;
