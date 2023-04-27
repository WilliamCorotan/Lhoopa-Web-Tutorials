<?php
// part 1
// creating new object
class User{
    public $name;
    public $username;
    public $followerCount;
}

// instantiating a new object
$newUser = new User();

// assigning values to each property of the object
$newUser->name = 'William';
$newUser->username = 'williamcorotan';
$newUser->followerCount = 20;

// print_r($newUser);

// part 2 
class Basket{

    public $itemsTotal;
    public  $shippingCost;
    public $discount;

    public function calculateSubTotal(){
        
        return $this->itemsTotal + $this->shippingCost - $this->discount;
    }
}

$newCart = new Basket();


$newCart->itemsTotal = 12;
$newCart->shippingCost = 45;
$newCart->discount = 30;

// var_dump($newCart->calculateSubTotal());
// var_dump($newCart);


// part 3

// Song Object
class Song{

    public $songId;
    public $title;

}

// Playlist Object
class Playlist {
    public $name;
    public $songs = [];

    public function addSong($song){
        $this->songs[] = $song;
    }
}

$song001 = new Song();
$song001->songId = "001";
$song001->title = "Bridges";

$song002 = new Song();
$song002->songId = "002";
$song002->title = "Inside";

$song003 = new Song();
$song003->songId = "003";
$song003->title = "Your Head";


$rock = new Playlist();

$rock->name = "Rock";

$rock->addSong($song001);
$rock->addSong($song002);
$rock->addSong($song003);

var_dump($rock->songs);

?>