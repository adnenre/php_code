<?php
// Queue class using an array
class Queue {
    private $queue = [];

    // Enqueue an element at the end of the queue
    public function enqueue($element) {
        array_push($this->queue, $element);
    }

    // Dequeue an element from the front of the queue
    public function dequeue() {
        if (empty($this->queue)) {
            return "Queue is empty!";
        }
        return array_shift($this->queue);
    }

    // Peek at the front element of the queue
    public function peek() {
        if (empty($this->queue)) {
            return "Queue is empty!";
        }
        return $this->queue[0];
    }

    // Check if the queue is empty
    public function isEmpty() {
        return empty($this->queue);
    }

    // Get the size of the queue
    public function size() {
        return count($this->queue);
    }
}

// Example Usage
$queue = new Queue();
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
echo "Front of queue: " . $queue->peek() . "\n"; // 10
echo "Dequeued from queue: " . $queue->dequeue() . "\n"; // 10
echo "Is queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "\n"; // No
echo "Queue size: " . $queue->size() . "\n"; // 2
