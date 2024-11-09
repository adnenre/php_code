<?php

// Define the TrieNode class
class TrieNode {
    public $children = [];
    public $isEndOfWord = false;

    public function __construct() {
        $this->children = [];
        $this->isEndOfWord = false;
    }
}

// Define the Trie class
class Trie {
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    public function insert($word) {
        $node = $this->root;
        $length = strlen($word);

        for ($i = 0; $i < $length; $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }

        $node->isEndOfWord = true;
    }

    public function searchPrefix($prefix) {
        $node = $this->root;
        $length = strlen($prefix);

        for ($i = 0; $i < $length; $i++) {
            $char = $prefix[$i];
            if (!isset($node->children[$char])) {
                return null;
            }
            $node = $node->children[$char];
        }

        return $node;
    }

    public function getWordsWithPrefix($prefix) {
        $node = $this->searchPrefix($prefix);
        $words = [];

        if ($node === null) {
            return $words;
        }

        $this->collectWords($node, $prefix, $words);
        return $words;
    }

    private function collectWords($node, $prefix, &$words) {
        if ($node->isEndOfWord) {
            $words[] = $prefix;
        }

        foreach ($node->children as $char => $childNode) {
            $this->collectWords($childNode, $prefix . $char, $words);
        }
    }
}

// Initialize the Trie and add words
$trie = new Trie();
$words = ["automobile", "automation", "autonomous", "auto", "autograph", "autumn"];
foreach ($words as $word) {
    $trie->insert($word);
}

// Get the prefix from the query string
$prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '';

// Fetch suggestions based on the prefix
$suggestions = $trie->getWordsWithPrefix($prefix);

// Return the suggestions as JSON
echo json_encode($suggestions);
