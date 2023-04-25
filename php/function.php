<?php declare(strict_types=1);

/* 

    FUNCTIONS
        function naming convention
            Camel Case - myFunction() >> laravel, symphony
            Snake Case - my_function() >> codeigniter
            Pascal Case - for Classes

*/
function echoo():void{
    echo "hello world!";
}

function func():string{
    return "func-ky beat!";
}

$var = 1;

// functional mindset: the original data is immutable
function add_one(int $num):int{
    return $num += 1 ;
}

// using pointers / passsed by reference
function add_one_ref(int &$num):int{
    return $num += 1;
}


$a = add_one($var);

echo "orig: $var func: $a";

$b = add_one_ref($var);

echo "orig: $var func: $b";

$a = func();
echoo();
echo $a;

?>