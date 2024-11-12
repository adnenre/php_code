<?php

namespace App\Controllers;

use App\Controllers\LayoutController;
use App\Models\HomeModel;


class HomeController extends LayoutController {
    public function index() {
        // Create a Response instance to set a header or status code
        $homeModel = new HomeModel();
        $data = $homeModel->getHomeData();
        // Render the view
        $this->renderLayout('home', $data);
    }
}
