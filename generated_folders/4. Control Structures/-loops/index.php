<?php

// 1. While Loop Example
echo "While Loop Example:\n";
$i = 0;
while ($i < 5) {
    echo "Iteration: $i\n";
    $i++;
}

// 2. Do-While Loop Example
echo "\nDo-While Loop Example:\n";
$i = 0;
do {
    echo "Iteration: $i\n";
    $i++;
} while ($i < 5);

// 3. For Loop Example
echo "\nFor Loop Example:\n";
for ($i = 0; $i < 5; $i++) {
    echo "Iteration: $i\n";
}

// 4. Foreach Loop Example
echo "\nForeach Loop Example:\n";
$fruits = ["Apple", "Banana", "Cherry"];
foreach ($fruits as $fruit) {
    echo "Fruit: $fruit\n";
}


$userInput = "";
while ($userInput != "exit") {
    echo "Enter something (type 'exit' to quit): ";
    $userInput = trim(fgets(STDIN));
    echo "You entered: $userInput\n";
}
