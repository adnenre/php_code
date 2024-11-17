<?php

# Definition: Dependency Injection is a design pattern used to implement Dependency Inversion. It is a technique where one object (or function) is provided with the dependencies it needs, rather than creating them internally.

#Key Idea: DI allows the external passing of dependencies (services or objects) into a class or method, rather than the class being responsible for creating or managing them.

//Types of DI:

//1- Constructor Injection: Dependencies are provided via the class constructor.
//2- Setter Injection: Dependencies are provided via setter methods.
//3- Interface Injection: Dependencies are provided via an interface that the class implements.
//4- service locator : also provides dependencies, but it does so by storing and retrieving services from a centralized registry. You don't pass dependencies into the class; instead, the class locates its dependencies from the service locator.
//The dependent object (in this case, AuthenticationService) is passed through the constructor of the class that needs it (UserController).


class AuthenticationService {
    public function authenticate($username, $password) {
        return $username === 'admin' && $password === 'secret';
    }
}

class UserController {
    private $authService;

    public function __construct(AuthenticationService $authService) {
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


// Usage
$authService = new AuthenticationService();
$controller = new UserController($authService);
$controller->login('admin', 'secret');
