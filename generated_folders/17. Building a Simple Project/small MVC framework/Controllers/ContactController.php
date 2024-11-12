<?php


namespace App\Controllers;

use App\Controllers\LayoutController;


class ContactController extends LayoutController {
    public function showContactPage() {
        // Render the Contacts view directly, no dynamic data needed
        $this->renderLayout('Contact');  // 'Contacts' corresponds to the Contacts.php view file
    }
}
