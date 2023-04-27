<?php 

require_once("FileReaderInterFace.php");

class JsonFileReader implements FileReaderInterface
{
    public function readAsAssociativeArray($filename)
    {
        // gets content from the file and convert it to a string
        $contentString = file_get_contents($filename);

        // Decode into associative array 
        $items = json_decode($contentString, true);

        return $items;

    }
}

?>