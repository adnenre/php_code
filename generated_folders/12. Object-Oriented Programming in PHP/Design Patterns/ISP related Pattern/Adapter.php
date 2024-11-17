<?php


echo "#.  Interface Segregation Principle" . PHP_EOL;
echo "  - Pattern: Adapter Pattern" . PHP_EOL;
echo "Scenario: A system that manages different types of documents (e.g., PDFs, Word files). The system should be able to handle new document types without breaking functionality." . PHP_EOL;
echo "#############################################################################################\n\n";
// Old Interface
interface OldSystem {
    public function saveData();
    public function loadData();
}

// New System Interface
interface NewSystem {
    public function save();
}

// Adapter
class LegacyAdapter implements NewSystem {
    private $oldSystem;

    public function __construct(OldSystem $oldSystem) {
        $this->oldSystem = $oldSystem;
    }

    public function save() {
        $this->oldSystem->saveData(); // Adapting the old system's saveData to save
    }
}

// Legacy System
class LegacySystem implements OldSystem {
    public function saveData() {
        echo "Saving data in the old system\n";
    }

    public function loadData() {
        echo "Loading data in the old system\n";
    }
}

// Client Code
$legacySystem = new LegacySystem();
$adapter = new LegacyAdapter($legacySystem);
$adapter->save(); // Adapts to new system's interface



echo "\n\n#############################################################################################\n\n";

$Explanation = " Why Adapter: The Adapter Pattern helps us adapt the LegacySystem to the NewSystem interface. By doing this, we don't force the client to depend on methods it doesn't need, adhering to the Interface Segregation Principle." . PHP_EOL;
echo $Explanation;
