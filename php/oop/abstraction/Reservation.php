<?php

class Reservation{

    private $guest = "guest";  //dummy guest class
    private $host = "host";  //dummy guest class

    public function cancel(){
        // logic for cancelation of a package
        // refund the guest.... if refunds applicatble
        // make the room available again 
        // notify the host
            // in app notification
            // send them an email
        // send confirmation to the guest
        $this->sendCacellationNotification();
        $this->refundGuest();
    }

    private function sendCacellationNotification(){
        echo "Sending confirmation to $this->host";
    }

    private function refundGuest(){
        echo "Refunding $this->guest";
    }


}

?>