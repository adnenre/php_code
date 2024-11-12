<?php

namespace App\Core;

class View {
    public static function render($viewName, $data = [], $layout = 'layout') {
        $viewPath = __DIR__ . '/../views/' . $viewName . '.php';

        if (file_exists($viewPath)) {
            extract($data);  // Make $title, $footer, and other variables available

            ob_start();
            include_once $viewPath;  // Capture the view's output
            $content = ob_get_clean();

            include_once __DIR__ . '/../views/' . $layout . '.php';  // Inject into layout
        } else {
            echo "View not found!";
        }
    }
}
