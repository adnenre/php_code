<?php

# Variable and Scope
# ==================

# Global Scope
# ============

# Variables defined outside any function or class have a global scope. They can be accessed globally, but not directly inside functions.
# In PHP, the global keyword is used to access global variables within a function. By default, variables declared outside of a function 
# are not accessible within the function's scope. To access them, you can use the global keyword.

$globalVariable = 'I am a global variable';

# example 1

function testGlobal() {
    global $globalVariable;
    echo $globalVariable . PHP_EOL;;
}

testGlobal();


# example 2
$x = 10;
$y = 20;

function add() {
    return $GLOBALS['x'] + $GLOBALS['y'];
}
echo "Sum = : " . add() . PHP_EOL;

# Local Scope
# ===========

# Variables defined within a function have a local scope and can only be accessed within that function.

function testLocal() {
    $localVar = 'I am local';
    echo $localVar . PHP_EOL;;
}
testLocal();

# static scope
# ============

# A static variable retains its value between function calls and is local to the function in which it is defined. It is declared using the static keyword.

function testStatic() {
    static $count = 0; // Initialized only once
    $count++;
    echo $count . PHP_EOL; // Outputs the incremented value on each call
}

testStatic(); // Outputs: 1
testStatic(); // Outputs: 2


# Function Arguments Scope
# ========================
# Variables passed to a function have a function scope and can only be accessed within that function.

function greet($name) {
    echo "Hello, $name" . PHP_EOL;
}

greet('Jhone');
