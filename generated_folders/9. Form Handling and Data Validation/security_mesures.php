<?php
// input validation
class Validator {
    private $errors = [];

    public function validate($data) {
        // Validate name
        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        } elseif (strlen($data['name']) < 2) {
            $this->errors['name'] = "Name must be at least 2 characters";
        }

        // Validate email
        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format";
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}

class FormSecurity {
    // Prevent XSS
    public static function sanitize($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    // Prevent SQL Injection using PDO
    public static function insertUser($pdo, $name, $email) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    // CSRF Protection
    public static function generateToken() {
        return bin2hex(random_bytes(32));
    }

    public static function validateToken($token) {
        return hash_equals($_SESSION['csrf_token'], $token);
    }
}

// Complete secure form handling example
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validator();

    if ($validator->validate($_POST)) {
        // Verify CSRF token
        if (!FormSecurity::validateToken($_POST['csrf_token'])) {
            die("Invalid token");
        }

        // Sanitize input
        $name = FormSecurity::sanitize($_POST['name']);
        $email = FormSecurity::sanitize($_POST['email']);

        // Database connection
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=myapp", "user", "pass");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert data safely
            if (FormSecurity::insertUser($pdo, $name, $email)) {
                echo "User registered successfully";
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "An error occurred";
        }
    } else {
        // Display validation errors
        foreach ($validator->getErrors() as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!-- Secure form with CSRF protection -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

    <div>
        <label>Name:</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>

    <button type="submit">Submit</button>
</form>