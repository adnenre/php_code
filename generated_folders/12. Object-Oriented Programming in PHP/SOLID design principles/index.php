<?php
// Header row
$header = ['SOLID Principle', 'Related Design Patterns'];
$data = [
    ['Single Responsibility Principle (SRP)', 'Facade, Strategy, Observer'],
    ['Open/Closed Principle (OCP)', 'Strategy, Decorator, Abstract Factory'],
    ['Liskov Substitution Principle (LSP)', 'Template Method, Factory Method'],
    ['Interface Segregation Principle (ISP)', 'Adapter, Proxy, Facade'],
    ['Dependency Inversion Principle (DIP)', 'Dependency Injection (DI), Service Locator, Abstract Factory'],
];



// Find the longest string in the first column (index 0)
$longestLengths = array_reduce($data, function ($carry, $item) {
    // Get the length of the longest string in the first column (item[0]) and second column (item[1])
    $col1Length = strlen($item[0]);
    $col2Length = strlen($item[1]);

    // Update the carry array for both columns
    $carry[0] = $carry[0] > $col1Length ? $carry[0] : $col1Length;
    $carry[1] = $carry[1] > $col2Length ? $carry[1] : $col2Length;

    return $carry;
}, [0, 0]);

$longestColumn1 = $longestLengths[0];
$longestColumn2 = $longestLengths[1];
// Calculate the column width based on the longest string in the first column
$colWidth = 60 - 5;

// Function to print rows with padding
function printRow($col1, $col2, $longestLengths) {
    echo "# " . str_pad($col1, $longestLengths[0]) . " # " . str_pad($col2, $longestLengths[1]) . " #\n";
}

function printBorder($longestLengths) {
    echo str_repeat('#', $longestLengths[0] + $longestLengths[1] + 7) . "\n";
}
// Print the table with borders
printBorder($longestLengths);
printRow($header[0], $header[1], $longestLengths);
echo str_repeat('#', $longestLengths[0] + $longestLengths[1] + 7) . "\n";

// Print the data rows
foreach ($data as $row) {
    printRow($row[0], $row[1], $longestLengths);
}

// Print the bottom border
echo str_repeat('#', $colWidth * 2 + 7) . "\n";
