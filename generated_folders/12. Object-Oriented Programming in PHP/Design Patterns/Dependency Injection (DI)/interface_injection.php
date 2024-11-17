<?php
//3- Interface Injection: This form of injection involves using an interface to inject the dependency. The class that requires the dependency implements an interface that defines a method for setting the dependency.

interface AuthServiceAware {
    public function setAuthService(AuthenticationService $authService);
}

class UserControllerEx3 implements AuthServiceAware {
    private $authService;

    public function setAuthService(AuthenticationService $authService) {
        $this->authService = $authService;  // Dependency injected via an interface method
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
$controller = new UserControllerEx3();
$controller->setAuthService($authService);  // Injected via interface method
$controller->login('admin', 'secret');
