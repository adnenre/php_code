<?php

namespace App\Models;


class AboutModel {
    public function getAboutData() {
        return [
            'title' => 'About',
            'content' => 'Here is the About page of our small MVC framework.'
        ];
    }
}
