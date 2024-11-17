<?php


echo "#.  Interface Segregation Principle" . PHP_EOL;
echo "  - Pattern: Facade Pattern" . PHP_EOL;
echo "Scenario: A complex system with multiple subsystems (e.g., for managing a multimedia system with video, audio, and subtitles). The Facade Pattern provides a simplified interface to the complex system, making it easier for clients to interact with." . PHP_EOL;
echo "#############################################################################################\n\n";
// Subsystems
class AudioSystem {
    public function playAudio() {
        echo "Playing audio...\n";
    }
}

class VideoSystem {
    public function playVideo() {
        echo "Playing video...\n";
    }
}

class SubtitleSystem {
    public function displaySubtitles() {
        echo "Displaying subtitles...\n";
    }
}

// Facade
class MediaFacade {
    private $audioSystem;
    private $videoSystem;
    private $subtitleSystem;

    public function __construct() {
        $this->audioSystem = new AudioSystem();
        $this->videoSystem = new VideoSystem();
        $this->subtitleSystem = new SubtitleSystem();
    }

    public function playMedia() {
        $this->audioSystem->playAudio();
        $this->videoSystem->playVideo();
        $this->subtitleSystem->displaySubtitles();
    }
}

// Client Code
$mediaFacade = new MediaFacade();
$mediaFacade->playMedia();  // Simplified interface to play media

echo "\n\n#############################################################################################\n\n";

$Explanation = " The Proxy Pattern provides a substitute object (ProxyImage) that controls access to the real object (RealImage). This allows for lazy loading, meaning the image is only loaded when needed. The client can use the proxy object as if it were the real object," . PHP_EOL;
echo $Explanation;
