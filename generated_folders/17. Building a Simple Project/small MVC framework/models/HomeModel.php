<?php

namespace App\Models;


class HomeModel {
    public function getHomeData() {
        return [
            'title' => 'Home',
            'message' => 'Welcome to the Home Page!',
            'description' => 'Here is the home page of our small MVC framework.'
        ];
    }
}
