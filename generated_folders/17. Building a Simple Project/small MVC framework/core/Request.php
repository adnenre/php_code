<?php

namespace App\Core;

class Request {
    public function get($key = '') {
        if ($key === 'uri') {
            return $_SERVER['REQUEST_URI'];
        }
        return $_GET[$key] ?? null;
    }

    public function post(string $key = '') {
        if ($key != '') {
            return isset($_POST[$key]) ? $_POST[$key] : null;
        }
        return $_POST;
    }
    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function input(string $key = '') {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($key != '') {
            return isset($data[$key]) ? $data[$key] : null;
        }
        return $data;
    }
}
