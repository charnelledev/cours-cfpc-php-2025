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

function sumAll(...$nums):mixed  {
    return array_reduce(array: $nums,callback: fn($carry, $n):float int => $carry +  0);
   }
   echo "Sum of numbers 1,2,3,4,5: " . sumAll(nums:1, 2, 3, 4, 5) . "<br>";