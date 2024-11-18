<?php


## Variable Scope

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;

echo "Variable Scope" . PHP_EOL;

$globalVar = "I'm global";

function testScope() {
    global $globalVar;
    $localVar = "I'm local";

    echo $globalVar . PHP_EOL;  // Accessible
    echo $localVar . PHP_EOL;   // Only accessible within function
}

testScope();
echo "\n\n";

// Static variables
function counter() {
    static $count = 0;
    return ++$count;
}

echo counter();  // 1
echo counter();  // 2
echo counter();  // 3
