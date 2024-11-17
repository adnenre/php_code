<?php


echo "#.  Liskov Substitution Principle (LSP)" . PHP_EOL;
echo "  - Pattern:Template Method " . PHP_EOL;
echo "Scenario: Scenario: A system for generating reports in different formats (e.g., PDF, Excel). The Template Method Pattern defines the skeleton of the report generation process, while allowing specific steps to be customized by subclasses." . PHP_EOL;
echo "#############################################################################################\n\n";
// Abstract Class
abstract class ReportGenerator {
    // Template Method
    public function generateReport() {
        $this->startReport();
        $this->addContent();
        $this->finishReport();
    }

    // Steps that can be customized by subclasses
    abstract protected function startReport();
    abstract protected function addContent();
    abstract protected function finishReport();
}

// Concrete Class for PDF
class PDFReportGenerator extends ReportGenerator {
    protected function startReport() {
        echo "Starting PDF report...\n";
    }

    protected function addContent() {
        echo "Adding content to PDF...\n";
    }

    protected function finishReport() {
        echo "Finishing PDF report...\n";
    }
}

// Concrete Class for Excel
class ExcelReportGenerator extends ReportGenerator {
    protected function startReport() {
        echo "Starting Excel report...\n";
    }

    protected function addContent() {
        echo "Adding content to Excel...\n";
    }

    protected function finishReport() {
        echo "Finishing Excel report...\n";
    }
}

// Client Code
$pdfReport = new PDFReportGenerator();
$pdfReport->generateReport();

$excelReport = new ExcelReportGenerator();
$excelReport->generateReport();



echo "\n\n#############################################################################################\n\n";

$Explanation = " Why Template Method: The Template Method Pattern defines the structure of an algorithm in the base class (ReportGenerator), while allowing subclasses (PDFReportGenerator, ExcelReportGenerator) to implement specific steps." . PHP_EOL;
echo $Explanation;
