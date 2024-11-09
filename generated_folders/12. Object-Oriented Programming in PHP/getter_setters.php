<?php
class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->setEmail($email);  // Validate email during object creation
    }

    public function getName() {

        return $this->name . "\n";
    }

    public function getEmail() {
        return $this->email . "\n";
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            echo "Invalid email format.\n";
        }
    }
}

// Usage
$user = new User("John Doe", "john.doe@example.com");
echo "name : " . $user->getName();  // Output: John Doe
echo "Email : " . $user->getEmail(); // Output: john.doe@example.com

// Attempting to set invalid email
$user->setEmail("a.doe.com");  // Output: Invalid email format.
