<?php

namespace App\Core;

use App\Core\View;
use App\Core\Response;

class BaseController {

    protected $response;

    public function __construct() {
        // Initialize the Response object
        $this->response = new Response();
    }

    /**
     * Set a HTTP header (e.g., content-type, status code)
     *
     * @param string $header
     */
    public function setHeader($header) {
        header($header);
    }

    /**
     * Render a view and pass data to it
     *
     * @param string $view
     * @param array $data
     */
    public function render($view, $data = []) {
        View::render($view, $data);
    }

    /**
     * Send a JSON response (for API responses)
     *
     * @param array $data
     */
    public function sendJson($data) {
        $this->setHeader('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * Handle not found (404) error
     */
    public function notFound() {
        $this->setHeader('HTTP/1.0 404 Not Found');
        $this->render('errors/404');
    }
}
