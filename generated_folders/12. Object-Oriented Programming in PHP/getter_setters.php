<?php
class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->setEmail($email);  // Validate email during object creation
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            echo "Invalid email format.<br>";
        }
    }
}

// Usage
$user = new User("John Doe", "john.doe@example.com");
echo $user->getName();  // Output: John Doe
echo $user->getEmail(); // Output: john.doe@example.com

// Attempting to set invalid email
$user->setEmail("invalid-email");  // Output: Invalid email format.
