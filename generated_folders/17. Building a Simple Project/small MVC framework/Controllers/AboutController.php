<?php

namespace App\Controllers;


use App\Controllers\LayoutController;
use App\Models\AboutModel;

class AboutController extends LayoutController {

    /**
     * Display the About page
     */
    public function showAboutPage() {
        // Data to pass to the view
        $aboutModel = new AboutModel();
        $data = $aboutModel->getAboutData();

        // Render the about view with data
        $this->renderLayout('about', $data);
    }
}
