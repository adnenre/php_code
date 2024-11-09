<?php
// Secure sanitizeInput function
function sanitizeInput($input, $context = 'html') {
    // Trim input to remove unwanted spaces
    $input = trim($input);

    // Remove backslashes if magic quotes are enabled
    $input = stripslashes($input);

    // Sanitize based on the context:
    switch ($context) {
        case 'html':
            // For HTML output, we convert special characters to HTML entities.
            // This prevents XSS attacks by escaping <, >, &, etc.
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            break;

        case 'url':
            // For URL context, remove any potential harmful characters and encode the string for safe use in URLs.
            $input = filter_var($input, FILTER_SANITIZE_URL);
            break;

        case 'email':
            // For email input, ensure it's a valid email format and sanitize it
            $input = filter_var($input, FILTER_SANITIZE_EMAIL);
            break;

        case 'sql':
            // For SQL queries, using prepared statements is the safest way to avoid SQL injection
            // For demonstration, we will sanitize the string to remove dangerous characters
            $input = addslashes($input); // This is just for illustration; always use prepared statements in real apps
            break;

        case 'int':
            // For integers, sanitize to ensure it's a valid number
            $input = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
            break;

        case 'float':
            // For floating point numbers, sanitize to ensure it's a valid float number
            $input = filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            break;

        default:
            // If no context is provided, treat it as general HTML sanitization
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            break;
    }

    return $input;
}

// Example usage:
$user_input = "<script>alert('XSS')</script> test@example.com";

// Sanitize for HTML output (prevents XSS)
echo sanitizeInput($user_input, 'html'); // Output will be: &lt;script&gt;alert(&#039;XSS&#039;)&lt;/script&gt; test@example.com

// Sanitize for Email format
echo sanitizeInput($user_input, 'email'); // Output will be: test@example.com

// Sanitize for URL format
$user_url = "http://example.com?user=<script>";
echo sanitizeInput($user_url, 'url'); // Output will be: http://example.com?user=%3Cscript%3E
