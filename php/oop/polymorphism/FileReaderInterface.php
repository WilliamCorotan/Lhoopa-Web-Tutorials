<?php 

// this is polymorphic
interface FileReaderInterface {

    /**
     * 
     * @param $filename
     * @return array
     * 
     */
    public function readAsAssociativeArray($filename);

}

?>