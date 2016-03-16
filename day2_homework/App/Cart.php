<?php
/**
 * Created by PhpStorm.
 * User: Apple
 * Date: 16/3/17
 * Time: 上午1:26
 */

namespace Day2\App;


class Cart
{
    private $_products = array();

    public function __construct($products)
    {
        $this->setProducts($products);
    }

    public function setProducts($products)
    {
        $this->_products = $products;
    }

    public function getProducts()
    {
        return $this->_products;
    }

    public function calculatePrice()
    {
        return 100;
    }
}