<?php

require_once 'src/Users/User.php';
require_once 'src/Users/Profile.php';
require_once 'src/Product/Product.php';

use App\User\User;
use App\User\Profile;
use App\Product\Product;




// create instance of User and Product 

$user = new User('Jhone');
$profile = new Profile($user, "Software Developer");
$product = new Product('Laptop', 1000);


echo "User Name : " . $user->getName() . PHP_EOL;
echo "User Bio : " . $Profile->getBio() . PHP_EOL;
echo "Product Info : " . $product->getProductInfo();
