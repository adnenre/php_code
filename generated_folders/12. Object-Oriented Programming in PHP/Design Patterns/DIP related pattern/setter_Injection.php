<?php

//2- Setter Injection :In setter injection, the dependency is provided via a setter method, allowing the class to be instantiated without the dependency and then set later.

class UserControllerEx2 {
    private $authService;

    // Setter method to inject the dependency
    public function setAuthService(AuthenticationService $authService) {
        $this->authService = $authService;
    }

    public function login($username, $password) {
        if ($this->authService->authenticate($username, $password)) {
            echo "Login successful!" . PHP_EOL;
        } else {
            echo "Login failed!" . PHP_EOL;
        }
    }
}

class AuthenticationService {
    public function authenticate($username, $password) {
        return $username === 'admin' && $password === 'secret';
    }
}

// Usage
$authService = new AuthenticationService();
$controller = new UserControllerEx2();
$controller->setAuthService($authService);  // Injected via setter
$controller->login('admin', 'secret');
