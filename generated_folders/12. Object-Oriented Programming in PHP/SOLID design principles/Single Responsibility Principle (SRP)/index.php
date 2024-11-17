<?php

$definition = 'he Single Responsibility Principle (SRP) states that a class should have only one reason to change, meaning it should have only one responsibility. This principle focuses on keeping a class focused on a single task or responsibility to make the system easier to understand, maintain, and extend.' . PHP_EOL;

echo $definition;
echo '######################################################################################################' . PHP_EOL;
// Responsible for generating timestamps
class TimestampGenerator {
    public function getTimestamp(): string {
        return date('Y-m-d H:i:s');
    }
}

// Interface for log storage mechanisms
interface LogStorageInterface {
    public function save(string $message): void;
}

// Responsible for saving logs to a file
class FileLogStorage implements LogStorageInterface {
    private string $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    public function save(string $message): void {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

// Responsible for formatting and handling logs
class Logger {
    private TimestampGenerator $timestampGenerator;
    private LogStorageInterface $logStorage;

    public function __construct(TimestampGenerator $timestampGenerator, LogStorageInterface $logStorage) {
        $this->timestampGenerator = $timestampGenerator;
        $this->logStorage = $logStorage;
    }

    public function log(string $message): void {
        $timestamp = $this->timestampGenerator->getTimestamp();
        $formattedMessage = "[$timestamp] $message";
        $this->logStorage->save($formattedMessage);
    }
}

// Usage
$timestampGenerator = new TimestampGenerator();
$fileStorage = new FileLogStorage("logs.txt");
$logger = new Logger($timestampGenerator, $fileStorage);

// Log a message
$logger->log("This is a log message.");

echo "Log entry written to logs.txt" . PHP_EOL;
