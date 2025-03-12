<?php

$age = 14;
$salary = 450000;

echo $age < 22 ? 'Young' : 'Old'; // Affiche "Old" car 25 n'est pas inférieur à 22
echo'<br>';

// Opérateur ternaire imbriqué

echo $age < 22 ? ($age < 16 ? 'Too young' : 'Young') : 'Old';
echo'<br>';

//  Opérateur ternaire court (Null coalescing)

$myAge = $age ?: 18; // Si $age est évalué à false, 18 est assigné
echo "myAge = $myAge<br>";


$name = null;
$displayName = $name ?? 'Eva';
echo "Name:----". $displayName.'<br>';

// Opérateur de fusion 
$person = [
    'name'
];
$per = ['a','b']; 
$person['name'] ??= 'Anonymous';
echo "person name:".$person['name'].'<br>';

// Switch statement

$userRole = 'editor';
switch ($userRole) {
 case 'admin':
 echo 'You have full access.<br>';
 break;
 case 'editor':
 echo 'You can edit content.<br>';
 break;
 case 'user':
 echo 'You can view posts and comment.<br>';
 break;
 default:
 echo 'Unknown role.<br>';
 break;
}