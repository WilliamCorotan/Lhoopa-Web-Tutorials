<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polymorphism</title>
</head>
<body>
    
<?php

require("CsvFileReader.php");
require("StockManager.php");
require("JsonFileReader.php");

$stockManager = new StockManager();
$csvFileReader = new CsvFileReader();
$jsonFileReader = new JsonFileReader();

$stockManager->updateStockFromFile('data.csv', $csvFileReader);
$stockManager->updateStockFromFile('data.json', $jsonFileReader);

$items = $csvFileReader->readAsAssociativeArray('data.csv');


// print_r($items); 
?>

</body>
</html>