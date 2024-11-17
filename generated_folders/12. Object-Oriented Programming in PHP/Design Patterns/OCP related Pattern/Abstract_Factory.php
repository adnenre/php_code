<?php


echo " - Senario : Suppose you are developing a cross-platform GUI application and you need to create various UI elements, such as buttons, checkboxes, and scroll bars, that should behave and look differently based on the platform (e.g., Windows, MacOS). You want to create a system where you can easily extend the family of UI elements for new platforms without modifying existing code." . PHP_EOL;
echo "#############################################################################################\n\n";



// Abstract Product Interfaces
interface Button {
    public function render();
}

interface Checkbox {
    public function render();
}

// Concrete Product - Windows
class WindowsButton implements Button {
    public function render() {
        echo "Rendering Windows Button\n";
    }
}

class WindowsCheckbox implements Checkbox {
    public function render() {
        echo "Rendering Windows Checkbox\n";
    }
}

// Concrete Product - MacOS
class MacOSButton implements Button {
    public function render() {
        echo "Rendering MacOS Button\n";
    }
}

class MacOSCheckbox implements Checkbox {
    public function render() {
        echo "Rendering MacOS Checkbox\n";
    }
}

// Abstract Factory Interface
interface GUIFactory {
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}

// Concrete Factory - Windows
class WindowsFactory implements GUIFactory {
    public function createButton(): Button {
        return new WindowsButton();
    }

    public function createCheckbox(): Checkbox {
        return new WindowsCheckbox();
    }
}

// Concrete Factory - MacOS
class MacOSFactory implements GUIFactory {
    public function createButton(): Button {
        return new MacOSButton();
    }

    public function createCheckbox(): Checkbox {
        return new MacOSCheckbox();
    }
}

// Client Code
class Application {
    private $button;
    private $checkbox;

    // Constructor accepts a factory to create the platform-specific products
    public function __construct(GUIFactory $factory) {
        $this->button = $factory->createButton();
        $this->checkbox = $factory->createCheckbox();
    }

    public function renderUI() {
        $this->button->render();
        $this->checkbox->render();
    }
}

// Usage - Client code selects the platform-specific factory
$platform = "Windows"; // You could determine this dynamically (e.g., system check)

if ($platform == "Windows") {
    $factory = new WindowsFactory();
} else {
    $factory = new MacOSFactory();
}

// Create application with the selected platform-specific factory
$app = new Application($factory);
$app->renderUI();
