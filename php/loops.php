<?php

/*
    LOOPS
        For
        While
        Do While
        Foreach
*/

// basic loop structure
// for(iterator declaration, condition, increment/decrement)
for($i = 0; $i < 5; $i++){
    echo $i;
    echo "<br>";
}
echo "<br>";
// while(condition)
$i = 0;
while($i < 5){
    echo $i;
    $i++;
    echo "<br>";
}

/* 
    do{
        Code goes here
    } whiile(condition);
*/
echo "<br>";
$j = 0;
do{
    echo $j;
    $j++;
    echo "<br>";
}
while($j <  5);

echo "<br>";
// foreach($originalArray as $individualIndex )
// indexed array
$numberArr = [1,2,3,4,5,6];
foreach($numberArr as $number){
 echo $number;
 echo "<br>";
}

echo "<br>";
// associative array
$assocArr = ['index1' => 1, 'index2' => 2, 'index3' => 3];
foreach($assocArr as $key => $value){
    echo $key;
    echo $value;
    echo "<br>";
}
?>