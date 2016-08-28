<?php

class Books {
    /* Member variables */

    var $price;
    var $title;

    function __construct($par1, $par2) {
        $this->title = $par1;
        $this->price = $par2;
    }

    /* Member functions */

    function setPrice($par) {
        $this->price = $par;
    }

    function getPrice() {
        echo $this->price . "<br/>";
    }

    function setTitle($par) {
        $this->title = $par;
    }

    function getTitle() {
        echo $this->title . " <br/>";
    }

}

class Novel extends Books {

    var $publisher;

    function setPublisher($par) {
        $this->publisher = $par;
    }

    function getPublisher() {
        echo $this->publisher . "<br />";
    }

    function getPrice() {
        echo $this->price . "<br/>";
        return $this->price;
    }

    function getTitle() {
        echo $this->title . "<br/>";
        return $this->title;
    }

}

