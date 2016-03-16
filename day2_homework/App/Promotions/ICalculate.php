<?php
/**
 * Created by PhpStorm.
 * User: Apple
 * Date: 16/3/17
 * Time: 上午3:45
 */

namespace Day2\App\Promotions;


interface ICalculate
{
    public function calculate();

    public function setProducts(array $products);
}