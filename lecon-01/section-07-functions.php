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