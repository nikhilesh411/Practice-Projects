<?php
// define a superclass .. no instances will be made of 'animal' itself,
// but it is useful to define common characteristics and behaviours
// (ie: properties and methods) of all our classes of animals
class Animal {

    // this constructor function is called whenever a new instance
    // of the Animal class is created (or any class that inherits from Animal)
    function Animal ($colour) {

        // install the argument as an attribute of any instances of Animal
        $this->colour = $colour;
    }

    // this method will be available to all classes that inherit from Animal
    function report () {
        return "This ".$this->colour." ".get_class($this)." has ".$this->legs." legs.<br />";
    }
}

// this class inherits from Animal
class Cat extends Animal {

    // set the legs attribute
    public $legs = 4;

    // create a method that can be called from any instances of Cat
    function make_noise () {
        echo "MEOW!<br />";
    }
}

// this class inherits from Cat, and from Animal
class Panther extends Cat {

    // specifies the colour attribute
    public $colour = "black";

    // overwrites the constructor function that would otherwise be
    // inherited from Animal, with a blank constructor.
    function Panther () {}

    // overwrites the method inherited from Cat
    function make_noise () {
        echo "ROARRRR!<br />";
    }
}

// this class inherits from Animal
class Snake extends Animal {
    public $legs = 0;
}

// this class is unrelated to the others
class PetShop {

    // set up an array to store the pets that the shop will stock
    public $pets = array ();

    // set up a variable to store the total cash in the pet shop
    public $cash;

    // this method creates a new object and adds it to the pets array
    function add_pet ($petclass, $price, $colour) {

        // set up a variable containing the number of elements in the pets array
        $n_pets = count($this->pets);

        // add to the pets array, a new instance of the class specified as
        // the first argument in this method, using the last argument as the
        // colour argument that is passed to the specified class's constructor
        $this->pets[$n_pets] = new $petclass($colour);

        // add a 'price' attribute to the pet object
        $this->pets[$n_pets]->price = $price;
    }

    // this method removes the specified pet from the array and adds the price
    // to the pet shop's cash variable
    function sell_pet ($n) {

        // add pet's price to the cash total
        $this->cash += $this->pets[$n]->price;

        // remove the pet object from the array
        array_splice($this->pets, $n, 1);

        // give a message about the sale
        echo "SALE: Pet no. ".$n." sold. Total cash is now \$".$this->cash.".<br /><br />";
    }

    // this method reports on the pet shop's stock
    function show_pets () {

        // show the number of pets available
        echo "<B>Shop stock:</B><br />We have ".count($this->pets)." pets for sale.";
        echo "<br /><br />";

        // iterate through the pets array and show information about each one
        for ($i = 0; $i < count($this->pets); $i++) {
            echo "<B>Pet No. ".$i.": </b>".$this->pets[$i]->report();
            echo "Price: \$".$this->pets[$i]->price."<br />";
        }
        echo "<br />";
    }
}

// instantiate a new PetShop object
$shop = new PetShop ();

// add three pets to the shop
$shop->add_pet(cat, 20, "tabby");
$shop->add_pet(snake, 40, "brown");
$shop->add_pet(snake, 60, "black");

// show the pet's stock
$shop->show_pets();

// sell the first pet in the stock
$shop->sell_pet(0);

// show the pet's stock after the sale
$shop->show_pets();
?>