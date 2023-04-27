<?php
 declare(strict_types = 1);

function alphabet_position(string $s): string {
    // Your code here
    $characters = str_split(strtolower($s));
    $characterArray = '';
    foreach($characters as $character){
        if(ctype_alpha($character)){
            $ascii = ord($character);
            $ascii -= 96;
            //echo "$ascii";
            $characterArray .= "$ascii";
        }
    }

    return  trim($characterArray);
    
  }


$a = alphabet_position('alphabet12');
echo $a;
?>