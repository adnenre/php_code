<?php

namespace App\Models;


class NavbarModel {
    public function getNavbaritems() {
        return [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'About', 'url' => '/about'],
            ['title' => 'Services', 'url' => '/services'],
            ['title' => 'Contact', 'url' => '/contact'],
        ];
    }
}
