<?php

$a = 5;
$b = 4;
$c = 1.2;

echo $a; 

echo "addition" .($a + $b). "<br>";
echo "soustraction" .($a - $b). "<br>";
echo "multiplication" .($a * $b). "<br>";
echo "division" .($a / $b). "<br>";
echo "modulo" .($a % $b). "<br>";


//nouveautes php 8.x :fdiv()permet de diviser
echo "division flottante avec fdiv: ". fdiv(num1: $a ,num2: $c). '<br>';
 