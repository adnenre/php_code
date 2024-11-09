<?php

// 1. Process the form data (if form is submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2. Sanitize and validate user inputs
    // Sanitize user input to remove unwanted characters and spaces
    $name = sanitizeInput($_POST['name']);   // Sanitize 'name' input
    $email = sanitizeInput($_POST['email']); // Sanitize 'email' input
    $password = sanitizeInput($_POST['password']); // Sanitize 'password' input

    // 3. Validate form data
    $errors = []; // Array to store error messages

    // 3.1. Validate name: Only letters and spaces allowed, between 3 and 50 characters
    if (!preg_match("/^[a-zA-Z ]{3,50}$/", $name)) {
        $errors[] = "Invalid name. It should only contain letters and spaces, and be between 3 and 50 characters.";
    }

    // 3.2. Validate email: Check if email format is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // 3.3. Validate password: At least 8 characters, at least one number, one uppercase, and one lowercase letter
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one number.";
    }

    // 4. If there are no validation errors, proceed with form processing
    if (empty($errors)) {
        // 4.1. Hash the password before storing it securely in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Securely hash the password

        // 4.2. Database connection (using environment variables for credentials)
        // Retrieve database credentials from environment variables
        $servername = getenv('DB_SERVER'); // Load the DB server name
        $username = getenv('DB_USER');     // Load the DB username
        $passwordDB = getenv('DB_PASSWORD'); // Load the DB password securely
        $dbname = getenv('DB_NAME');       // Load the DB name

        // 4.3. Establish a connection to the database
        $conn = new mysqli($servername, $username, $passwordDB, $dbname);

        // 4.4. Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); // Handle connection error
        }

        // 4.5. Prepared statement to prevent SQL injection
        // Use a prepared statement to safely insert the sanitized and validated data
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword); // "sss" means 3 string parameters

        // 4.6. Execute the prepared statement
        if ($stmt->execute()) {
            echo "User registered successfully!"; // Success message
        } else {
            echo "Error: " . $stmt->error; // Display error if insertion fails
        }

        // 4.7. Close the statement and the database connection
        $stmt->close();
        $conn->close();
    } else {
        // 5. Display validation errors if any
        // Loop through each error and display it
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>"; // Display each error in red
        }
    }
}

// 6. Function to sanitize inputs
// This function removes unwanted characters and prevents XSS attacks
// It trims any spaces and converts special characters into HTML entities
function sanitizeInput($data) {
    return htmlspecialchars(trim($data)); // Trim spaces and convert special characters to HTML entities
}

?>

<!-- 7. HTML Form -->
<!-- This form collects name, email, and password from the user -->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Register</button> <!-- Submit button to send form data -->
</form>

<!-- 
1. Process the Form Data
    We first check if the form is submitted using the POST method with $_SERVER['REQUEST_METHOD'] === 'POST'. The form will only be processed when the user submits the form.
2. Sanitize User Inputs
    Sanitization: The inputs (name, email, password) are sanitized using the sanitizeInput() function. This ensures that any potentially dangerous characters are converted to safe HTML entities and that spaces are trimmed from the input values.
    The sanitizeInput() function uses htmlspecialchars() to prevent XSS (Cross-Site Scripting) attacks by converting special characters like <, >, &, etc., into their HTML equivalents.
3. Validate User Inputs
    Name Validation: We use preg_match() to validate that the name contains only letters and spaces, and that it has a length between 3 and 50 characters. If this validation fails, an error message is added to the $errors array.
Email Validation: The filter_var() function is used with the FILTER_VALIDATE_EMAIL filter to ensure the email is in the correct format (e.g., user@example.com).
    Password Validation: A regular expression is used to ensure the password is at least 8 characters long, contains at least one uppercase letter, one lowercase letter, and one number.
4. Password Hashing and Database Insertion
    Password Hashing: The password is hashed using password_hash() before storing it in the database. This ensures that even if the database is compromised, passwords remain secure.
    Database Connection: We establish a connection to the database using mysqli. Ensure to replace the database credentials ($servername, $username, $passwordDB, $dbname) with your actual database settings.
    Prepared Statements: To prevent SQL Injection, we use prepared statements with placeholders (?) and bind_param() to bind the values. This ensures that user input is treated as data and not executable code.
    Execution: After preparing the statement, we execute it using $stmt->execute(). If successful, a success message is displayed, and if it fails, an error message is shown.
5. Display Validation Errors
    If there are any validation errors, we loop through the $errors array and display each error message in red text using HTML.
6. Sanitize Input Function
    The sanitizeInput() function trims spaces and converts special characters into HTML entities. This prevents potential XSS attacks by ensuring that any HTML tags or special characters are not executed within the page.
7. HTML Form
    The HTML form includes three fields: name, email, and password. When the user submits the form, the data is sent to the same page using $_SERVER['PHP_SELF'].
    Each input is marked as required, so the form cannot be submitted without these fields being filled out.
-->