<?php

function duplicate_encode(string $word) : string
{
    $splittedWord = str_split(strtolower($word));
  	$countMap = array_count_values($splittedWord);

    $finalString = '';

    print_r($countMap);
    foreach ($splittedWord as $letter) {
        ($countMap[$letter] === 1) ? $finalString .= '(' : $finalString .= ')';
    }   

    return $finalString;
}

$a = duplicate_encode("qweety");
echo $a
?>