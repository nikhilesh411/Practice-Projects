<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of car
 *
 * @author Nikhilesh
 */
class car {

    var $brake;
    var $accelarator;
    var $gear;
    var $steering;
    
    var $color;
    var $no_of_doors;
    var $horsepower;
    var $seating_cap;
    var $make;
    var $model;
    var $type;
    var $category;
    
    function __construct($color,$seating_cap){
        $this->color=$color;
        $this->seating_cap=$seating_cap;
    }
    
    function __destruct() {
        echo "The class ". _class_." is Destroyed";
    }

    function goForward() {
        echo "Heading forward";
    }

    function goBack() {
        echo "Heading backwards";
    }

    function turnRight() {
        echo "Turning right";
    }

    function turnLeft() {
        echo "Turning left";
    }

    function soundHorn() {
        echo "Horn Sounded";
    }

}

class racecar extends car{
var $nitro;
}

class truck extends car{
    var $trailer;
}