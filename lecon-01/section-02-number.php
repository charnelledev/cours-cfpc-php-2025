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
 

$a += $b; // équivaut à $a = $a + $b;
echo "Après addition, \$a = $a<br>";
$a -= $b; // équivaut à $a = $a - $b;
echo "Après soustraction, \$a = $a<br>";
$a *= $b; // équivaut à $a = $a * $b;
echo "Après multiplication, \$a = $a<br>";
$a /= $b; // équivaut à $a = $a / $b;
echo "Après division, \$a = $a<br>";
$a %= $b; // équivaut à $a = $a % $b;
echo "Après modulo, \$a = $a<br>";


// 4. Opérateurs d'incrémentation

$a = 5;
$b = 8;

echo "Post-incrément (\$a++): " . $a++ . '<br>'; // Affiche 5, puis $a devient 6

echo "\$a = .$a".  ' <br>';

echo "Pré-incrément (++\$a): " . ++$b . '<br>'; // Incrémente à 7 puis affiche 7

echo "\$b = .$b".  ' <br>';

// 5. Opérateurs de décrémentation

echo "Post-décrément (\$a--): " . $a-- . '<br>'; // Affiche 7, puis $a devient 6
echo "Pré-décrément (--\$a): " . --$a . '<br>'; // Décrémente à 5 puis affiche 5

echo is_float(value:1.0);


$strNumber = '12.34';
$number = (float)$strNumber; // Ou utiliser floatval($strNumber)

floatval(value:$strNumber);
var_dump($number);
echo '<br>';



8. Fonctions mathématiques



echo "abs(-15) : " . abs(-15) . '<br>';

echo "pow(2, 3) : " . pow(2, 3) . '<br>';

echo "sqrt(16) : " . sqrt(16) . '<br>';

echo "max(2, 3) : " . max(2, 3) . '<br>';

echo "min(2, 3) : " . min(2, 3) . '<br>';

echo "round(2.4) : " . round(2.4) . '<br>';

echo "round(2.6) : " . round(2.6) . '<br>';

echo "floor(2.6) : " . floor(2.6) . '<br>';

echo "ceil(2.4) : " . ceil(2.4) . '<br>';








