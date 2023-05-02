<?php 

function rowSumOddNumbers($n) {
    // your code here
    $starting_point = 1;
    $total = 0;

    
    for($x=$n; $x>1; $x--)   
    {  
        $starting_point = $starting_point + $x;  
    }
    
    $starting_point = $starting_point - $n + 1;
    
    $first_num = 2 * $starting_point - 1;
    
    for($i = 0; $i < $n; $i++){     
        $total = $total + $first_num;
        $first_num = $first_num + 2;
    }
    
    return $first_num;
    
  }


echo rowSumOddNumbers(3);
?>