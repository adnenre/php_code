<?php

# object
# ======
// In PHP, objects are instances of classes

class Person {
    // Properties
    public $name;
    public $lastName;
    public $age;

    //constructor
    public function __construct($name, $lastName, $age) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFullName() {
        return "$this->name $this->lastName";
    }
}



// instanciation
$person = new Person('Jhone', 'Doe', 30);

echo 'Name : ' . $person->name . PHP_EOL;
echo 'lastName: ' . $person->lastName . PHP_EOL;
echo 'Age : ' . $person->age . PHP_EOL;

echo 'full Name :' . $person->getFullName() . PHP_EOL;


#Another way of creating object in PHP
// function and stdClass

function createPerson() {
    $person = new stdClass();
    $person->name = 'Jhone';
    $person->lastName = 'Doe';
    $person->age = 30;
    return $person;
}

$newPerson = createPerson();
echo "this object is created using stdClass \n";
echo $newPerson->name;
