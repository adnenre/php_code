<?php

namespace App\Product;


class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getProductInfo() {
        return $this->name . " " . $this->price . '$';
    }
}
