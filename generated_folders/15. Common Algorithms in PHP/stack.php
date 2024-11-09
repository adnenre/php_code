<?php
// Stack class using an array
class Stack {
    private $stack = [];

    // Push an element onto the stack
    public function push($element) {
        array_push($this->stack, $element);
    }

    // Pop an element from the stack
    public function pop() {
        if (empty($this->stack)) {
            return "Stack is empty!";
        }
        return array_pop($this->stack);
    }

    // Peek the top element of the stack
    public function peek() {
        if (empty($this->stack)) {
            return "Stack is empty!";
        }
        return end($this->stack);
    }

    // Check if the stack is empty
    public function isEmpty() {
        return empty($this->stack);
    }

    // Get the size of the stack
    public function size() {
        return count($this->stack);
    }
}

// Example Usage
$stack = new Stack();
$stack->push(10);
$stack->push(20);
$stack->push(30);
echo "Top of stack: " . $stack->peek() . "\n"; // 30
echo "Popped from stack: " . $stack->pop() . "\n"; // 30
echo "Is stack empty? " . ($stack->isEmpty() ? "Yes" : "No") . "\n"; // No
echo "Stack size: " . $stack->size() . "\n"; // 2
