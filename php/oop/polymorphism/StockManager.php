<?php 

class StockManager{

    public function updateStockFromFile($filename, $fileReader){
        $stockItems = $fileReader->readAsAssociativeArray($filename);
        foreach($stockItems as $stockItem){
            print "Updating the dataabase with the item: ". $stockItem['name'];
        }
    }
}

?>