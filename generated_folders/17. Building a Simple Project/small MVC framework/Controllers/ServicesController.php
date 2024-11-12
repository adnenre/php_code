<?php


namespace App\Controllers;

use App\Controllers\LayoutController;
use App\Models\ServicesModel;

class ServicesController extends LayoutController {
    public function showServicePage() {

        $servicesModel = new ServicesModel();
        $services = $servicesModel->getServicesData();

        // Render the services view directly, no dynamic data needed
        $this->renderLayout('services', ['services' => $services]);  // 'services' corresponds to the services.php view file
    }
}
