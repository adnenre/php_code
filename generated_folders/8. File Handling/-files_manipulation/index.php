<?php

// Define file paths
$file = 'path/to/your/file.txt';
$directory = 'path/to/your/directory';
$uploadDirectory = 'uploads/';
$uploadedFileName = 'uploaded_image.jpg';

// 1. Check if the file exists
echo "1. Checking if the file exists:\n";
if (file_exists($file)) {
    echo "The file '$file' exists.\n";
} else {
    echo "The file '$file' does not exist.\n";
}
echo "\n";

// 2. Check if the directory exists
echo "2. Checking if the directory exists:\n";
if (is_dir($directory)) {
    echo "The directory '$directory' exists.\n";
} else {
    echo "The directory '$directory' does not exist.\n";
}
echo "\n";

// 3. Check if the file is readable and writable
echo "3. Checking if the file is readable and writable:\n";
if (is_readable($file)) {
    echo "The file '$file' is readable.\n";
} else {
    echo "The file '$file' is not readable.\n";
}

if (is_writable($file)) {
    echo "The file '$file' is writable.\n";
} else {
    echo "The file '$file' is not writable.\n";
}
echo "\n";

// 4. Opening a file for writing
echo "4. Opening the file for writing:\n";
$handle = fopen($file, 'w');  // Open file for writing (creates the file if it doesn't exist)
if ($handle) {
    echo "The file '$file' has been opened for writing.\n";
    fwrite($handle, "This is a test content written to the file.\n");
    echo "Content has been written to the file.\n";
    fclose($handle);  // Close the file after writing
    echo "The file '$file' has been closed.\n";
} else {
    echo "Unable to open the file '$file' for writing.\n";
}
echo "\n";

// 5. Opening the file for reading
echo "5. Opening the file for reading:\n";
$handle = fopen($file, 'r');  // Open file for reading
if ($handle) {
    echo "The file '$file' has been opened for reading.\n";
    $content = fread($handle, filesize($file));  // Read the entire content of the file
    echo "Content of the file: \n$content\n";
    fclose($handle);  // Close the file after reading
    echo "The file '$file' has been closed.\n";
} else {
    echo "Unable to open the file '$file' for reading.\n";
}
echo "\n";

// 6. Working with file permissions
echo "6. Checking and changing file permissions:\n";

// Check the current file permissions
$permissions = fileperms($file);
echo "Current permissions of '$file': " . substr(decoct($permissions), -4) . "\n";  // Display permissions in octal format

// Change file permissions to make it writable (chmod)
if (chmod($file, 0644)) {  // Give owner write permission, others only read
    echo "File permissions for '$file' have been changed to 0644 (rw-r--r--).\n";
} else {
    echo "Failed to change file permissions for '$file'.\n";
}
echo "\n";

// 7. File upload handling and saving to a directory
echo "7. Handling file upload:\n";

// Simulate file upload data (for demonstration purposes)
$uploadedFile = [
    'name' => $uploadedFileName,
    'tmp_name' => '/tmp/phpX2T6T8',
    'error' => 0,
    'size' => 150000  // 150KB
];

// Check for file upload error
if ($uploadedFile['error'] == 0) {
    echo "File uploaded successfully: {$uploadedFile['name']}.\n";

    // Check if the uploaded file is an image (MIME type check)
    if (in_array($uploadedFile['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
        echo "Uploaded file is a valid image.\n";

        // Check if upload directory exists and create it if necessary
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);  // Create upload directory with full permissions
            echo "Upload directory '$uploadDirectory' has been created.\n";
        }

        // Move the uploaded file to the upload directory
        $destination = $uploadDirectory . $uploadedFile['name'];
        if (move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
            echo "File moved to: $destination.\n";
        } else {
            echo "Failed to move the uploaded file.\n";
        }
    } else {
        echo "Invalid file type. Only images (JPG, PNG, GIF) are allowed.\n";
    }
} else {
    echo "Error in file upload.\n";
}


// real world scenario of loggin to files


// Log file path
$logFile = 'logs/app_log.txt';

// Function to log messages
function logMessage($message) {
    global $logFile;

    // Check if the directory exists, create it if it doesn't
    $directory = dirname($logFile);  // Get the directory part of the file path
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);  // Create the directory with full permissions
        echo "Directory '$directory' created.\n";
    }

    // Open the log file in append mode (will create the file if it doesn't exist)
    $handle = fopen($logFile, 'a');

    if ($handle) {
        // Prepare the message to be logged
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message\n";

        // Write the log message to the file
        fwrite($handle, $logMessage);

        // Close the file after writing
        fclose($handle);
    } else {
        echo "Unable to open log file.";
    }
}

// Example usage of the logging function
logMessage('User logged in');
logMessage('Error: Database connection failed');
logMessage('User performed a search: "PHP logging"');

echo "Messages have been logged.\n";
