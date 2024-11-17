<?php


echo "#. Liskov Substitution Principle (LSP)" . PHP_EOL;
echo "  - Pattern: Factory Method Pattern" . PHP_EOL;
echo "Scenario: A system that manages different types of documents (e.g., PDFs, Word files). The system should be able to handle new document types without breaking functionality." . PHP_EOL;
echo "#############################################################################################\n\n";

// Abstract Product
abstract class Document {
    abstract public function render();
}

// Concrete Products
class PDFDocument extends Document {
    public function render() {
        echo "Rendering PDF document\n";
    }
}

class WordDocument extends Document {
    public function render() {
        echo "Rendering Word document\n";
    }
}

// Abstract Creator
abstract class DocumentCreator {
    abstract public function createDocument(): Document;
}

// Concrete Creators
class PDFDocumentCreator extends DocumentCreator {
    public function createDocument(): Document {
        return new PDFDocument();
    }
}

class WordDocumentCreator extends DocumentCreator {
    public function createDocument(): Document {
        return new WordDocument();
    }
}

// Client Code
$docCreator = new PDFDocumentCreator();
$doc = $docCreator->createDocument();
$doc->render();

$docCreator = new WordDocumentCreator();
$doc = $docCreator->createDocument();
$doc->render();





echo "\n\n#############################################################################################\n\n";

$Explanation = " Why Factory Method: The Factory Method Pattern allows the creation of different document types (PDFDocument, WordDocument) in a way that ensures the new document types can replace the parent Document class without altering the behavior of the client code. This ensures the Liskov Substitution Principle (derived classes can be used interchangeably with their base class)." . PHP_EOL;
echo $Explanation;
