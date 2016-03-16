<?php

/**
 * Created by PhpStorm.
 * User: Apple
 * Date: 16/3/17
 * Time: 上午12:33
 */
class CartTest extends PHPUnit_Framework_TestCase
{
    public function test_buy_1_book_result_100_dollar()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 100;

        //Assert
        $this->assertEquals($expected, $actual);

    }

    public function test_buy_2_books_one_is_episode1_and_one_is_episode2_result_190()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);
        $products[] = new stubProduct(2, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 190;

        //Assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_3_different_books_result_270()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);
        $products[] = new stubProduct(2, 100);
        $products[] = new stubProduct(3, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 270;

        //Assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_4_different_books_result_320()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);
        $products[] = new stubProduct(2, 100);
        $products[] = new stubProduct(3, 100);
        $products[] = new stubProduct(4, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 320;

        //Assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_5_different_books_result_375()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);
        $products[] = new stubProduct(2, 100);
        $products[] = new stubProduct(3, 100);
        $products[] = new stubProduct(4, 100);
        $products[] = new stubProduct(5, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 375;

        //Assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_4_books_one_is_episode1_and_one_is_episode2_and_two_episode3_result_370()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);
        $products[] = new stubProduct(2, 100);
        $products[] = new stubProduct(3, 100);
        $products[] = new stubProduct(3, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 370;

        //Assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_5_books_one_is_episode1_and_two_episode2_and_two_episode3_result_460()
    {
        //Arrange
        $products = array();
        $products[] = new stubProduct(1, 100);
        $products[] = new stubProduct(2, 100);
        $products[] = new stubProduct(2, 100);
        $products[] = new stubProduct(3, 100);
        $products[] = new stubProduct(3, 100);


        //Act
        $cart = new Day2\App\ShoppingCart($products);
        $actual = $cart->calculatePrice(new Day2\App\Promotions\HarryPotter());
        $expected = 460;

        //Assert
        $this->assertEquals($expected, $actual);
    }
}


class stubProduct implements Day2\App\IProduct
{
    private $_id = null;
    private $_price = null;

    public function __construct($id, $price)
    {
        $this->setId($id);
        $this->setPrice($price);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setPrice($price)
    {
        $this->_price = $price;
    }
}