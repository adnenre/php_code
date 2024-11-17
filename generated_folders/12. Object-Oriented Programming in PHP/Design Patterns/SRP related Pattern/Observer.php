<?php

echo "#.  Liskov Substitution Principle (LSP)" . PHP_EOL;
echo "  - Pattern: Observer Pattern" . PHP_EOL;
echo "  - definition : The Observer Pattern is a behavioral design pattern used to allow one object (the subject) to notify multiple other objects (the observers) about changes in its state" . PHP_EOL;
echo "# The Subject :  is the core component that holds the data or state and notifies the Observers when there’s a change." . PHP_EOL;
echo "# The Observers : are objects that are interested in changes to the Subject. They register themselves with the Subject and react to state changes." . PHP_EOL;
echo "# The Subject : typically provides methods to attach and detach observers, allowing dynamic control over the notifications." . PHP_EOL;
echo "#############################################################################################\n\n";
echo "Scenario: A common real-world example is a stock price update system. Imagine a stock trading platform where multiple users are interested in receiving notifications about a particular stock's price. When the stock price changes, the platform (the subject) notifies all users (the observers) about the update." . PHP_EOL;
echo "#############################################################################################\n\n";

// Subject Interface
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// Observer Interface
interface Observer {
    public function update($state);
}

// Concrete Subject (Stock)
class Stock implements Subject {
    private $observers = [];
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $this->observers = array_filter($this->observers, function ($item) use ($observer) {
            return $item !== $observer;
        });
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->price);
        }
    }

    public function setPrice($price) {
        $this->price = $price;
        $this->notify();  // Notify all observers about the price change
    }
}

// Concrete Observer (User)
class User implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update($price) {
        echo "User {$this->name} has been notified. New stock price: $price\n";
    }
}

// Client Code
$stock = new Stock(100);  // Initial stock price
$user1 = new User("Alice");
$user2 = new User("Bob");

$stock->attach($user1);
$stock->attach($user2);

$stock->setPrice(105);  // Price change, observers will be notified

$stock->detach($user1);  // Alice is no longer interested in price updates

$stock->setPrice(110);  // Only Bob will be notified now


echo "\n\n#############################################################################################\n\n";

$Explanation = " In this example, the stock price is the state that the Stock object maintains. Users (observers) are interested in changes to this price. By using the Observer Pattern, the system ensures that the users are decoupled from the stock object, meaning that the stock object doesn't need to know anything about the users, only that it needs to notify them when the price changes." . PHP_EOL;
echo $Explanation;
