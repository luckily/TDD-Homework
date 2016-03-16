<?php
/**
 * Created by PhpStorm.
 * User: Apple
 * Date: 16/3/17
 * Time: 上午1:30
 */

namespace Day2\App;


interface IProduct
{
    public function getId();
    public function setId($id);
    public function getPrice();
    public function setPrice($price);
}