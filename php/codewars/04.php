<?php 

function nbYear($p0, $percent, $aug, $p) {
    $total = $p0;
    $years = 0;
  while($total < $p){
      $total = $total + ($total * ($percent / 100) + $aug);
      $years++;
      echo "total: $total <br>";
      echo "p: $p <br>";
      echo "years: $years <br>";
  }
  
  return $years;
  
}



?>