<?php

namespace App\Core;

class Response {

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var int
     */
    private $statusCode = 200;

    /**
     * Set a header for the response
     *
     * @param string $name  The name of the header (e.g., 'Content-Type')
     * @param string $value The value of the header (e.g., 'application/json')
     */
    public function setHeader($name, $value) {
        $this->headers[$name] = $value;
    }

    /**
     * Set the HTTP status code for the response
     *
     * @param int $statusCode The HTTP status code (e.g., 200, 404)
     */
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    /**
     * Redirect the user to a different URL
     *
     * @param string $url The URL to redirect to
     * @param int $statusCode The HTTP status code for the redirect (default: 302)
     */
    public function redirect($url, $statusCode = 302) {
        $this->setStatusCode($statusCode);
        $this->setHeader('Location', $url);
        $this->send();
        exit;
    }

    /**
     * Output the headers and response content to the browser
     */
    public function send() {
        // Send HTTP status code
        http_response_code($this->statusCode);

        // Send headers
        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }
    }

    /**
     * Output content as a plain text response
     *
     * @param string $content The content to output
     */
    public function sendText($content) {
        $this->setHeader('Content-Type', 'text/plain');
        $this->send();
        echo $content;
    }

    /**
     * Output content as a JSON response
     *
     * @param mixed $content The content to output (usually an array or object)
     */
    public function sendJson($content) {
        $this->setHeader('Content-Type', 'application/json');
        $this->send();
        echo json_encode($content);
    }

    /**
     * Output content as an HTML response
     *
     * @param string $content The content to output (HTML string)
     */
    public function sendHtml($content) {
        $this->setHeader('Content-Type', 'text/html');
        $this->send();
        echo $content;
    }

    /**
     * Set a cookie to be sent with the response
     *
     * @param string $name The name of the cookie
     * @param string $value The value of the cookie
     * @param int $expire The expiration time of the cookie (in seconds)
     * @param string $path The path for which the cookie is valid
     * @param string $domain The domain for which the cookie is valid
     * @param bool $secure Whether the cookie should be sent only over HTTPS
     * @param bool $httpOnly Whether the cookie is accessible only through the HTTP protocol
     */
    public function setCookie($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httpOnly = true) {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }

    /**
     * Send a 404 Not Found response
     */
    public function sendNotFound() {
        $this->setStatusCode(404);
        $this->send();
        echo "404 Not Found";
    }

    /**
     * Send a 500 Internal Server Error response
     */
    public function sendServerError() {
        $this->setStatusCode(500);
        $this->send();
        echo "500 Internal Server Error";
    }
}
