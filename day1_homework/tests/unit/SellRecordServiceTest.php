<?php

/**
 * 測試銷售記錄
 * Class SellRecordServiceTest
 */
class SellRecordServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * 3筆一組，取Cost總和	6,15,24,21
     */
    public function test_get_cost_sum_per_3_records_should_be_6_15_24_21()
    {
        //Arrange
        $target = new Day1\App\SellRecordService();
        $sellRecords = array(
            (new StubSellRecord())->setCost(1)->setRevenue(11)->setSellPrice(21),
            (new StubSellRecord())->setCost(2)->setRevenue(12)->setSellPrice(22),
            (new StubSellRecord())->setCost(3)->setRevenue(13)->setSellPrice(23),
            (new StubSellRecord())->setCost(4)->setRevenue(14)->setSellPrice(24),
            (new StubSellRecord())->setCost(5)->setRevenue(15)->setSellPrice(25),
            (new StubSellRecord())->setCost(6)->setRevenue(16)->setSellPrice(26),
            (new StubSellRecord())->setCost(7)->setRevenue(17)->setSellPrice(27),
            (new StubSellRecord())->setCost(8)->setRevenue(18)->setSellPrice(28),
            (new StubSellRecord())->setCost(9)->setRevenue(19)->setSellPrice(29),
            (new StubSellRecord())->setCost(10)->setRevenue(20)->setSellPrice(30),
            (new StubSellRecord())->setCost(11)->setRevenue(21)->setSellPrice(31),
        );

        //Act
        $target->setSellRecords($sellRecords);

        $actual = $target->getValueSumBy('cost', 3);
        $expected = array(6, 15, 24, 21);

        //Assert
        $this->assertTrue($this->arrayAreSimilar($expected, $actual));
    }

    /**
     * 4筆一組，取Revenue總和	50,66,60
     */
    public function test_get_revenue_sums_per_4_records_should_be_50_66_60()
    {
        //Arrange
        $target = new Day1\App\SellRecordService();
        $sellRecords = array(
            (new StubSellRecord())->setCost(1)->setRevenue(11)->setSellPrice(21),
            (new StubSellRecord())->setCost(2)->setRevenue(12)->setSellPrice(22),
            (new StubSellRecord())->setCost(3)->setRevenue(13)->setSellPrice(23),
            (new StubSellRecord())->setCost(4)->setRevenue(14)->setSellPrice(24),
            (new StubSellRecord())->setCost(5)->setRevenue(15)->setSellPrice(25),
            (new StubSellRecord())->setCost(6)->setRevenue(16)->setSellPrice(26),
            (new StubSellRecord())->setCost(7)->setRevenue(17)->setSellPrice(27),
            (new StubSellRecord())->setCost(8)->setRevenue(18)->setSellPrice(28),
            (new StubSellRecord())->setCost(9)->setRevenue(19)->setSellPrice(29),
            (new StubSellRecord())->setCost(10)->setRevenue(20)->setSellPrice(30),
            (new StubSellRecord())->setCost(11)->setRevenue(21)->setSellPrice(31),
        );

        //Act
        $target->setSellRecords($sellRecords);

        $actual = $target->getValueSumBy('revenue', 4);
        $expected = array(50, 66, 60);

        //Assert
        $this->assertTrue($this->arrayAreSimilar($expected, $actual));
    }

    /**
     * 比較兩組陣列是否相等
     * @param $a
     * @param $b
     * @return bool
     */
    public function arrayAreSimilar($a, $b)
    {
        // if the indexes don't match, return immediately
        if (count(array_diff_assoc($a, $b))) {
            return false;
        }
        // we know that the indexes, but maybe not values, match.
        // compare the values between the two arrays
        foreach($a as $k => $v) {
            if ($v !== $b[$k]) {
                return false;
            }
        }
        // we have identical indexes, and no unequal values
        return true;
    }
}

/**
 * 假銷售記錄Class
 * Class StubSellRecord
 */
class StubSellRecord
{
    protected $cost, $revenue, $sellPrice;

    public function getCost()
    {
        return $this->cost;
    }

    public function getRevenue()
    {
        return $this->revenue;
    }

    public function getSellPrice()
    {
        return $this->sellPrice;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }


    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;
        return $this;
    }

    public function setSellPrice($sellPrice)
    {
        $this->sellPrice = $sellPrice;
        return $this;
    }
}