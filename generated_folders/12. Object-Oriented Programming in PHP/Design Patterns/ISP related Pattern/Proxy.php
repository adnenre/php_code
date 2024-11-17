<?php


echo "#.  Interface Segregation Principle" . PHP_EOL;
echo "  - Pattern: Proxy Pattern" . PHP_EOL;
echo "Scenario: Scenario: A system that needs to interact with a large image file. The Proxy Pattern allows the system to load the image only when it is required, thus improving performance. The proxy ensures that the system can still treat the image as if it’s fully loaded." . PHP_EOL;
echo "#############################################################################################\n\n";
// Subject Interface
interface Image {
    public function display();
}

// Real Subject
class RealImage implements Image {
    private $fileName;

    public function __construct($fileName) {
        $this->fileName = $fileName;
        $this->loadImage();
    }

    private function loadImage() {
        echo "Loading image: " . $this->fileName . "\n";
    }

    public function display() {
        echo "Displaying image: " . $this->fileName . "\n";
    }
}

// Proxy
class ProxyImage implements Image {
    private $realImage;
    private $fileName;

    public function __construct($fileName) {
        $this->fileName = $fileName;
    }

    public function display() {
        if (!$this->realImage) {
            $this->realImage = new RealImage($this->fileName); // Lazy loading
        }
        $this->realImage->display();
    }
}

// Client Code
$image1 = new ProxyImage("image1.jpg");
$image1->display();  // Will load and display the image

$image2 = new ProxyImage("image2.jpg");
$image2->display();  // Will load and display the image


echo "\n\n#############################################################################################\n\n";

$Explanation = " The Proxy Pattern provides a substitute object (ProxyImage) that controls access to the real object (RealImage). This allows for lazy loading, meaning the image is only loaded when needed. The client can use the proxy object as if it were the real object," . PHP_EOL;
echo $Explanation;
