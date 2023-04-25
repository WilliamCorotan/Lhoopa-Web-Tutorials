<?php
/* 
    ARRAYS
        -Indexed
        -Associative
        -Multidimensional

*/

//Indexed
// using array() function
$people = array('Kevin', 'Jeremy', 'Sara');
// using brackets
$cars = ['Toyota', 'Honda', 'Mistubishi'];

//adding to an indexed array
// specific index
$cars[3] = 'Chev';
//  adds to the last element
$cars[] = "BMW";

print_r($cars);


// Associative [key - value pair]
// using array function
$people = array('Brad' => 35, 'Jose' => 24, 'William' => 37);
//using brackets
$cars = ['a'=> 1, 'b'=> 2, 'c' => 3];

//adding to an associative array
$people['key'] = 'value';
print_r(($cars));

//Multidimensional 
// using array() function
$cars = array(
    array('Honda', 20, 10),
    array('Toyota', 10, 30), 
    array('Ford', 20, 20) 
);

$arr = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

print_r($arr[1][1]);
?>

