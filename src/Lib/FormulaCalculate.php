<?php


namespace Dashan\calculateDistance\Lib;


class FormulaCalculate implements Calculate
{

    protected $unit = 2;

    protected $order = 'asc';

    protected $limit = 3;

    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function calculateOneCoordinate($base, $need) :float
    {
        return $this->formula($base[0],$base[1],$need[1],$need[2]);
    }

    public function calculateRadius($base, $need, $dis) :array
    {
        return [];
    }

    public function calculateOrder($base, $need) :array
    {
        return [];
    }

    protected function formula($lng1, $lat1, $lng2, $lat2, $decimal = 2)
    {
        $unit = $this->unit;
        $EARTH_RADIUS = 6370.996; // 地球半径系数
        $PI           = 3.1415926535898;

        $radLat1 = $lat1 * $PI / 180.0;
        $radLat2 = $lat2 * $PI / 180.0;

        $radLng1 = $lng1 * $PI / 180.0;
        $radLng2 = $lng2 * $PI / 180.0;

        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;

        $distance = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $distance = $distance * $EARTH_RADIUS * 1000;

        if ($unit === 2) {
            $distance /= 1000;
        }

        return round($distance, $decimal);
    }

}