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
$words = [
    "apple",
    "ant",
    "airplane",
    "alpha",
    "art",
    "banana",
    "bat",
    "ball",
    "book",
    "bottle",
    "cat",
    "car",
    "circle",
    "cake",
    "candle",
    "dog",
    "diamond",
    "door",
    "desk",
    "dolphin",
    "elephant",
    "engine",
    "ear",
    "egg",
    "eagle",
    "fish",
    "football",
    "flower",
    "frog",
    "fan",
    "grape",
    "goat",
    "guitar",
    "gate",
    "glove",
    "house",
    "hat",
    "hero",
    "hammer",
    "hockey",
    "ice",
    "internet",
    "igloo",
    "ink",
    "iron",
    "jacket",
    "jungle",
    "juice",
    "jigsaw",
    "jewelry",
    "kite",
    "kangaroo",
    "key",
    "king",
    "keyboard",
    "lion",
    "lemon",
    "lamp",
    "leaf",
    "laptop",
    "mouse",
    "mountain",
    "moon",
    "milk",
    "music",
    "nose",
    "night",
    "notebook",
    "net",
    "nurse",
    "orange",
    "octopus",
    "ocean",
    "owl",
    "office",
    "pen",
    "pencil",
    "pizza",
    "piano",
    "pyramid",
    "queen",
    "quilt",
    "quiz",
    "quick",
    "question",
    "rose",
    "rabbit",
    "rocket",
    "rain",
    "river",
    "sun",
    "star",
    "sock",
    "snow",
    "scissors",
    "tree",
    "table",
    "toy",
    "tiger",
    "television",
    "umbrella",
    "unicorn",
    "uniform",
    "user",
    "ufo",
    "van",
    "vulture",
    "vampire",
    "vase",
    "vacuum",
    "water",
    "window",
    "wolf",
    "whale",
    "whistle",
    "x-ray",
    "xenon",
    "xylophone",
    "xerox",
    "xmas",
    "yellow",
    "yoga",
    "yarn",
    "yacht",
    "yak",
    "zebra",
    "zombie",
    "zero",
    "zoo",
    "zipper"
];
foreach ($words as $word) {
    $trie->insert($word);
}

// Get the prefix from the query string
$prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '';

// Fetch suggestions based on the prefix
$suggestions = $trie->getWordsWithPrefix($prefix);

// Return the suggestions as JSON
echo json_encode($suggestions);
