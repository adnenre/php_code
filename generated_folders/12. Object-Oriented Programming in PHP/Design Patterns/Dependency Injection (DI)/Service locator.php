<?php

// Logger Service
class Logger {
    public function log($message) {
        echo "Log: " . $message . PHP_EOL;
    }
}

// Authentication Service
class AuthService {
    public function authenticate($username, $password) {
        return $username === 'admin' && $password === 'secret';
    }
}

// Email Service
class EmailService {
    public function sendEmail($to, $subject, $body) {
        echo "Sending email to $to with subject $subject..." . PHP_EOL;
    }
}

// Service Locator Class
class ServiceLocator {
    // Static array to hold registered services
    private static $services = [];

    // Method to register a service
    public static function addService($name, $service) {
        self::$services[$name] = $service;
    }

    // Method to retrieve a service
    public static function getService($name) {
        if (isset(self::$services[$name])) {
            return self::$services[$name];
        }
        throw new Exception("Service not found: " . $name);
    }
}

// Register services with the Service Locator
ServiceLocator::addService('logger', new Logger());
ServiceLocator::addService('auth', new AuthService());
ServiceLocator::addService('email', new EmailService());

// UserController that uses the Service Locator
class UserControllerEx4 {
    public function login($username, $password) {
        // Retrieve services from Service Locator
        $authService = ServiceLocator::getService('auth');
        $logger = ServiceLocator::getService('logger');

        if ($authService->authenticate($username, $password)) {
            $logger->log("Login successful for user: $username");
            echo "Login successful!" . PHP_EOL;
        } else {
            $logger->log("Login failed for user: $username");
            echo "Login failed!" . PHP_EOL;
        }
    }

    public function sendWelcomeEmail($username) {
        // Retrieve the EmailService from Service Locator
        $emailService = ServiceLocator::getService('email');
        $emailService->sendEmail($username, 'Welcome!', 'Thank you for signing up!');
    }
}

// Usage
$userController = new UserControllerEx4();
$userController->login('admin', 'secret');
$userController->sendWelcomeEmail('admin@example.com');
