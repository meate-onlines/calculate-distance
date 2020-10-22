<?php
namespace Dashan\calculateDistance;
use Dashan\calculateDistance\Lib\FormulaCalculate;
use Dashan\calculateDistance\Lib\RedisCalculate;
class Distance
{
    protected static $drive_array = [
        'redis'   => RedisCalculate::class,
        'formula' => FormulaCalculate::class
    ];
    public static function distanceCalculate($drive = 'redis')
    {
        return new self::$drive_array[$drive];
    }
}