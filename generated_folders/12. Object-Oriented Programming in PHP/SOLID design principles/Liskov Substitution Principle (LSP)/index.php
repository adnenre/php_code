<?php

$definition = 'Objects of a superclass should be replaceable with objects of a subclass without altering the correctness of the program' . PHP_EOL;

echo $definition;
echo '##############################################################################' . PHP_EOL;


// Base FileReader class
class FileReader {
    public function saveFile(string $filePath, string $content): void {
        file_put_contents($filePath, $content);
        echo "File saved at: $filePath\n";
    }

    public function readFile(string $filePath): string {
        return file_get_contents($filePath);
    }
}

// EncryptedFileReader class
class EncryptedFileReader extends FileReader {
    private const ENCRYPTION_KEY = 'my_secret_key'; // Simplified for demo purposes

    public function saveFile(string $filePath, string $content): void {
        $encryptedContent = $this->encrypt($content);
        parent::saveFile($filePath, $encryptedContent);
    }

    public function readFile(string $filePath): string {
        $encryptedContent = parent::readFile($filePath);
        return $this->decrypt($encryptedContent);
    }

    private function encrypt(string $content): string {
        return base64_encode(openssl_encrypt($content, 'AES-128-ECB', self::ENCRYPTION_KEY));
    }

    private function decrypt(string $encryptedContent): string {
        return openssl_decrypt(base64_decode($encryptedContent), 'AES-128-ECB', self::ENCRYPTION_KEY);
    }
}

// Usage
function processFile(FileReader $reader, string $filePath, string $contentToSave): void {
    // Save the file
    $reader->saveFile($filePath, $contentToSave);

    // Read the file
    $readContent = $reader->readFile($filePath);
    echo "File Content: $readContent\n";
}

// Example Usage
$fileReader = new FileReader();
$encryptedFileReader = new EncryptedFileReader();

$filePathPlain = 'plain.txt';
$filePathEncrypted = 'encrypted.enc';

// Using the basic FileReader
processFile($fileReader, $filePathPlain, 'This is plain text.');

// Using the EncryptedFileReader
processFile($encryptedFileReader, $filePathEncrypted, 'This is sensitive information.');

echo '##############################################################################' . PHP_EOL;

echo "The EncryptedFileReader subclass maintains the same method signature and does not introduce new restrictions or conditions." . PHP_EOL;
