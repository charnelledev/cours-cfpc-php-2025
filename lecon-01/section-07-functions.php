<?php


// Fonction simple de salutation
function hello ($name): void
{
    echo"hello $name<br>";
}


hello(name:'owen');

function sum ($a,$b):mixed 
{
    return $a + $b;
}
echo sum(a:4, b:6). '<br>';

function sumAll(...$nums): mixed  {
    return array_reduce(array: $nums, callback: fn($carry, $n): float|int => $carry + $n +0);
   }
   echo "Sum of numbers 1,2,3,4,5: " . sumAll( 1, 2, 3, 4, 5, 6, 7, 8, 9) . "<br>";