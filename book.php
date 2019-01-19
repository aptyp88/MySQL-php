<?php

class Book
{
    protected $name;
    protected $price;

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return round($this->price, 2) . 'uah';
    }
}