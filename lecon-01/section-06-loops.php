<?php
//  Boucle while 

$counter = 0;
while ($counter < 5) {
 echo "While loop counter: $counter<br>";
 $counter++;
}

// Boucle do-while

$counter = 0;
do {
 echo "Do-while loop counter: $counter<br>";
 $counter++;
} while ($counter < 5);

// Boucle for

for ($i = 0; $i < 5; $i++) {
    echo "For loop counter: $i<br>";
   }

//    Boucle foreach

$fruits = ["Apple", "Banana", "Cherry"];
foreach ($fruits as $index => $fruit) {
 echo "Fruit $index: $fruit<br>";
}
