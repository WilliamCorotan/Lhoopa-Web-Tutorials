<?php
// This lives in the server
// array of name suggestions
$nameArray = ["Anna", "Brittany", "Cinderella", "Diana", "Eva","Fiona","Gunda","Hege","Inga","Johanna","Kitty","Linda","Nina","Ophelia","Petunia","Amanda","Raquel","Cindy","Doris","Eve","Evita","Sunniva","Tove","Unni","Violet","Liza","Elizabeth","Ellen","Wenche","Vicky"];


$queryString = $_REQUEST['user'];

$suggestions = "";


if (!empty($queryString)) {
    $queryString = strtolower($queryString);
    $len=strlen($queryString);
    foreach($nameArray as $name) {
        // stristr find a string inside another string, 
      if (stristr($queryString, substr($name, 0, $len))) {
        if ($suggestions === "") {
          $suggestions = $name;
        } else {
          $suggestions .= ", $name";
        }
      }
    }
  }
  
echo empty($suggestions)  ? "no suggestions" : $suggestions
?>