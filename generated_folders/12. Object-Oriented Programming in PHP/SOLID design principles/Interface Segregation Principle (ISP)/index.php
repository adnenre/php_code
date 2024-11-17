<?php

$definition = "A class should not be forced to implement interfaces it does not use." . PHP_EOL;
echo $definition;
echo "#########################################################################################";
interface Printer {
    public function printDocument();
}

interface Scanner {
    public function scanDocument();
}

class AllInOnePrinter implements Printer, Scanner {
    public function printDocument() {
        echo "Printing document..." . PHP_EOL;
    }

    public function scanDocument() {
        echo "Scanning document..." . PHP_EOL;
    }
}

class BasicPrinter implements Printer {
    public function printDocument() {
        echo "Printing document..." . PHP_EOL;
    }
}
