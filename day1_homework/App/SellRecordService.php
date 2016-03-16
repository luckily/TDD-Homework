<?php

namespace Day1\App;

/**
 * 銷售記錄商業邏輯
 * Class SellRecordService
 * @package App
 */
class SellRecordService
{
    protected $sellRecords = array();

    public function __construct(array $sellRecords = null)
    {
        $this->setSellRecords($sellRecords);
    }

    /**
     * 設定sellRecords
     * @param array $sellRecords
     */
    public function setSellRecords(array $sellRecords = null)
    {
        if(isset($sellRecords))
            $this->sellRecords = $sellRecords;
    }

    /**
     * 取得sellRecords
     * @return array
     */
    public function getSellRecords()
    {
        return $this->sellRecords;
    }

    /**
     * 依照給定的欄位跟每幾筆一組，回傳加總陣列
     * @param $attribute
     * @param int $perNum
     * @return array
     */
    public function getValueSumBy($attribute, $perNum = 1)
    {
        $temp = 0;
        $sums = array();
        $recordSize = count($this->sellRecords);

        foreach($this->sellRecords as $i => $sellRecord) {

            $method = 'get' . ucfirst($attribute);
            $temp += $sellRecord->$method();

            if((($i+1) % $perNum == 0) || ($i+1) == $recordSize ) {
                $sums[] = $temp;
                $temp = 0;
            }
        }

        return $sums;
    }
}