<?php
namespace Dashan\calculateDistance\Lib;

interface Calculate
{
    public function setUnit($unit);

    public function setOrder($order);

    public function setLimit($limit);

    public function calculateOneCoordinate($base,$need) :float ;

    public function calculateRadius($base,$need,$dis) :array ;

    public function calculateOrder($base,$need) :array ;
}