<?php 

class Bid 
{
    private $minimumBid = 5;
    private $bidAmount;

    public function setBidAmmount($amount)
    {
        if($amount < $this->minimumBid){
            $this->bidAmount = $this->minimumBid;
            return;
        }
           $this->bidAmount = $amount ;
    }

    public function getBidAmmount()
    {
        return $this->bidAmount;
    }

}

?>