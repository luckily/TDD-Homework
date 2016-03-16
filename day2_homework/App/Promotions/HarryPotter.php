<?php
/**
 * 哈利波特優惠
 * Created by PhpStorm.
 * User: Apple
 * Date: 16/3/17
 * Time: 上午3:39
 */

namespace Day2\App\Promotions;

use Day2\App\Promotions\ICalculate;

class HarryPotter implements ICalculate
{
    private $_products = array();

    public function __construct(array $products = array())
    {
        $this->setProducts($products);
    }

    public function setProducts(array $products)
    {
        $this->_products = $products;
    }

    /**
     * 計算購物車內的金額
     * @return int
     */
    public function calculate()
    {
        if(empty($this->_products))
            return 0;

        /**
         * 1 = 100
         * 1,2 = (100+100)*0.95
         * 1,2,3 = (100+100+100)*0.9
         * 1,1,2,3 = ((100+100+100)*0.9)+100
         * 1,1,2,2,3 = ((100+100+100)*0.9)+((100+100)*0.95)
         * 1,1,1,2,2,3 = ((100+100+100)*0.9)+((100+100)*0.95)+100
         * [1]
         */

        $calculationGroups = array();
        foreach($this->_products as $i => $product) {

            // 如果群組陣列是空(第一筆)的就塞進, 然後直接進入下一筆迴圈(產品)
            if(empty($calculationGroups) && $i == 0) {
                $calculationGroups[] = [(string)$product->getId() => $product->getPrice()];
                continue;
            }

            // 若有兩筆以上的產品，就要分組把不重複的書歸類到一個陣列，若有相同編號的產品，就開一個新的陣列存放
            $groupSize = count($calculationGroups);
            foreach($calculationGroups as $j => &$calculationGroup) {

                if(!$this->_isExistsInCalculationGroup($product->getId(), $calculationGroup)) {

                    $calculationGroup[(string)$product->getId()] = $product->getPrice();
                    break;

                } elseif($this->_isExistsInCalculationGroup($product->getId(), $calculationGroup) && !$this->_isLast($j, $groupSize)) {

                    continue;

                } else {

                    $calculationGroups[] = [(string)$product->getId() => $product->getPrice()];
                    break;

                }

            }

        }

        $results = $this->_getSumGroup($calculationGroups);
        return array_sum($results);
    }

    /**
     * 產品id是否已經在各別加總的陣列中?
     * @param $productId
     * @param $calculationGroup
     * @return bool
     */
    private function _isExistsInCalculationGroup($productId, $calculationGroup)
    {
        return array_key_exists((string)$productId, $calculationGroup);
    }

    /**
     * 是否為最後一組加總群組
     * @param $counter
     * @param $groupSize
     * @return bool
     */
    private function _isLast($counter, $groupSize)
    {
        return $counter +1 == $groupSize;
    }

    /**
     * 針對各別不同值的群組中，各別加總之後回傳金額陣列
     * @param $calculationGroups
     * @return array
     */
    private function _getSumGroup($calculationGroups)
    {

        // 遇到很奇怪的事情...foreach裡面一定要帶&才會是對的, COPY ON WRITE??

        $results = array();
        foreach($calculationGroups as &$calculationGroup) {
            switch(count($calculationGroup)) {
                case 2:
                    $results[] = floor(array_sum($calculationGroup) * 0.95);
                    break;
                case 3:
                    $results[] = floor(array_sum($calculationGroup) * 0.9);
                    break;
                case 4:
                    $results[] = floor(array_sum($calculationGroup) * 0.8);
                    break;
                case 5:
                    $results[] = floor(array_sum($calculationGroup) * 0.75);
                    break;
                default:
                    $results[] = array_sum($calculationGroup);
                    break;
            }
        }

        return $results;
    }
}