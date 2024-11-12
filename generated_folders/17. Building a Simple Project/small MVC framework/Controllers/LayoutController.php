<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\NavbarModel;


class LayoutController extends BaseController {
    protected $navbarItems;

    public function __construct() {
        parent::__construct();

        $navbarItems = new NavbarModel();
        $this->navbarItems = $navbarItems->getNavbarItems();
    }

    public function renderLayout($view, $data = []) {
        // Add the navbar items to the data for rendering
        $data['navbarItems'] = $this->navbarItems;

        // Render the view with the common layout (navbar, footer, etc.)
        $this->render($view, $data);
    }
}
