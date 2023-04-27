<?php

require("FileReaderInterface.php");

class CsvFileReader implements FileReaderInterface{

    public function readAsAssociativeArray($filename)
    {
        // get the rows from the file as arrays
        $rows = array_map('str_getcsv', file($filename));

        // separate the headers
        $header = array_shift($rows);
        

        $items = [];
        
        
        print_r($header);
        echo "<br>";
        print_r($rows);
        foreach($rows as $row){
            $items[] = array_combine($header, $row);
        }

        return $items;
    }
}

?>