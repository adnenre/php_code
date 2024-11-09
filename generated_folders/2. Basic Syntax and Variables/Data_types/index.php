<?php

#  DATA TYPE
#  =========
#  In PHP, there are several data types.


# String
#  =====
$name = "Jhone Doe";
echo "Name : $name\n";


# Integer
#  ======
$age = 30;
echo "Age : $age\n";

#  Float
#  =====
$height = 1.75;
echo "Height: $height\n";

#  Boolean
#  =======
$isMale = true;
echo "Is Male: " . ($isMale ? 'yes' : 'no') . "\n";


# array
# =====
$colors = array("red", "green", "blue");
// implode here is to join all the items in the array;
print_r($colors);
echo 'All Colors in one String : ' . implode(', ', $colors);


# associative Array
#  ===============
$person = array('name' => 'Jhone', 'last name' => 'Doe', 'age' => 30);
$person2 = ['name' => 'Jhone', 'last name' => 'Doe', 'age' => 30];
print_r($person);
print_r($person2);
