<?php

echo 'Arrow Function : ' . PHP_EOL;
echo "Syntax : \$functionName = fn(\$a,\$b) => \$a * \$b;" . PHP_EOL;

$multiply = fn($a, $b) => $a * $b;
echo 'Result : ' . $multiply(2, 3);  // 6
