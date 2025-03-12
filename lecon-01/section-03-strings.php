<?php
//strings

// 1. Création d'une chaîne simple avec extraction de variable



$author = "Owen";
$string = "Hello $author"; // Utilisation de l'interpolation (double quotes)
$string2 = 'Hello ' . $author; // Utilisation de la concaténation (simple

echo $string . '<br>';
echo $string2 . '<br>';


// 2. Concaténation de chaînes
// Vous pouvez concaténer plusieurs chaînes en utilisant l'opérateur "." :


echo "Hello " . "World" . '<br>';




// 3. Fonctions sur les chaînes



$string = " Hello World ";

// Affichage de la longueur de la chaîne (espaces inclus)

echo "1 - Longueur : " . strlen($string) . '<br>';

// Suppression des espaces en début et fin de chaîne

echo "2 - Sans espaces : '" . trim($string) . "'<br>";

// Suppression des espaces à gauche

echo "3 - Sans espaces à gauche : '" . ltrim($string) . "'<br>";

// Suppression des espaces à droite

echo "4 - Sans espaces à droite : '" . rtrim($string) . "'<br>";

// Comptage des mots

echo "5 - Nombre de mots : " . str_word_count($string) . '<br>';

// Renversement de la chaîne

echo "6 - Inversée : " . strrev($string) . '<br>';

// Conversion en majuscules et minuscules

echo "7 - En majuscules : " . strtoupper($string) . '<br>';

echo "8 - En minuscules : " . strtolower($string) . '<br>';

// Mise en majuscule du premier caractère

echo "9 - ucfirst('hello') : " . ucfirst('hello') . '<br>';

// Mise en minuscule du premier caractère

echo "10 - lcfirst('HELLO') : " . lcfirst('HELLO') . '<br>';

// Mise en majuscule de la première lettre de chaque mot

echo "11 - ucwords('hello world') : " . ucwords('hello world') . '<br>';

// Recherche de la position d'une sous-chaîne (sensible à la casse)

echo "12 - strpos (sensible à la casse) : " . strpos($string, 'World') . '<br>';

// Recherche de la position d'une sous-chaîne (insensible à la casse)

echo "13 - stripos (insensible à la casse) : " . stripos($string, 'world') .
'<br>';

// Extraction d'une partie de la chaîne à partir d'un index

echo "14 - Substr à partir de l'index 8 : " . substr($string, 8) . '<br>';

// Remplacement d'une sous-chaîne (sensible à la casse)

echo "15 - Remplacement (World => PHP) : " . str_replace('World', 'PHP', $string)
. '<br>';

// Remplacement d'une sous-chaîne (insensible à la casse)

echo "16 - Remplacement insensible (world => PHP) : " . str_ireplace('world',
'PHP', $string) . '<br>';
