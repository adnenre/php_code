<?php

// Define the Node class for a Binary Search Tree (BST)
class Node {
    public $data;
    public $left;
    public $right;

    // Constructor to initialize the node with data
    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

// Define the Binary Search Tree class
class BinarySearchTree {
    private $root;

    // Constructor to initialize the tree
    public function __construct() {
        $this->root = null;
    }

    // Function to insert a node in the tree
    public function insert($data) {
        $this->root = $this->insertNode($this->root, $data);
    }

    // Helper function to insert node recursively
    private function insertNode($node, $data) {
        if ($node == null) {
            return new Node($data);  // If the node is null, create a new node
        }

        // Traverse the tree: if data is smaller, go to the left; if larger, go to the right
        if ($data < $node->data) {
            $node->left = $this->insertNode($node->left, $data);
        } else {
            $node->right = $this->insertNode($node->right, $data);
        }

        return $node;
    }

    // Function to search for a value in the tree
    public function search($data) {
        return $this->searchNode($this->root, $data);
    }

    // Helper function to search a node recursively
    private function searchNode($node, $data) {
        // Base case: If the node is null, return false (data not found)
        if ($node == null) {
            return false;
        }

        // If the data is found, return true
        if ($node->data == $data) {
            return true;
        }

        // If the data is smaller, search the left subtree
        if ($data < $node->data) {
            return $this->searchNode($node->left, $data);
        }

        // If the data is larger, search the right subtree
        return $this->searchNode($node->right, $data);
    }

    // Function to display the tree (In-order traversal)
    public function inOrderTraversal() {
        $this->inOrder($this->root);
        echo "\n";
    }

    // Helper function to perform in-order traversal (left, root, right)
    private function inOrder($node) {
        if ($node != null) {
            $this->inOrder($node->left);
            echo $node->data . " ";
            $this->inOrder($node->right);
        }
    }
}

// Creating a Binary Search Tree instance
$bst = new BinarySearchTree();
$bst->insert(50);
$bst->insert(30);
$bst->insert(20);
$bst->insert(40);
$bst->insert(70);
$bst->insert(60);
$bst->insert(80);

// Display the tree using in-order traversal
echo "In-order Traversal of the Tree: ";
$bst->inOrderTraversal();

// Searching for a value in the tree
$searchValue = 40;
echo "Searching for value $searchValue in the tree...\n";
if ($bst->search($searchValue)) {
    echo "Value $searchValue found in the tree.\n";
} else {
    echo "Value $searchValue not found in the tree.\n";
}
