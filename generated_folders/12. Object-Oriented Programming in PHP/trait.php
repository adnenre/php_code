<?php

// Define a trait for common methods
trait Logger {
    public function log($message) {
        $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
        echo "[" . $timestamp . "] Log: " . $message . "\n";
    }
}

// Class using the Logger trait
class Application {
    use Logger;  // Including the Logger trait

    public function run() {
        $this->log("Application is running.");
    }
}

// Another class using the same Logger trait
class User {
    use Logger;  // Including the Logger trait

    public function login() {
        $this->log("User logged in.");
    }
}

$app = new Application();
$app->run();  // Outputs: Log: Application is running.

$user = new User();
$user->login();  // Outputs: Log: User logged in.


echo "Example of combining interface and trait \n";


// Define an interface
interface Notification {
    public function sendNotification($message);
}

// Define a trait with a method
trait EmailNotification {
    public function sendEmail($message) {
        $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
        echo "Sending email: at [" . $timestamp . "] " . $message . "\n";
    }
}

// Class using both the interface and the trait
class UserNotification implements Notification {
    use EmailNotification;

    // Implementing the interface method
    public function sendNotification($message) {
        $this->sendEmail($message);
    }
}

$userNotification = new UserNotification();
$userNotification->sendNotification("Welcome to our platform!");  // Outputs: Sending email: Welcome to our platform!
