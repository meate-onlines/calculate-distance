 基于redis的geoHash和坐标距离计算公式实现坐标间的距离计算
### Requirements
Redis >= 3.2.0

### Usage

composer require bastphp/calculate-distance
```
<?php


namespace App\Http\Controllers;
use Dashan\calculateDistance\Distance;
class TestController extends Controller
{
    public function index()
    {
        //默认使用redis作为驱动
        $distanceObj = Distance::distanceCalculate();
        //使用公式的方式计算
       // $distanceObj  = Distance::distanceCalculate('formula');
        //返回两个坐标间的距离
        $res = $distanceObj->calculateOneCoordinate([113.610042,34.758417,'a'],[113.620685,34.728388,'b']);
        $base = [113.610042,34.758417,'a'];
        $need = [[113.620685,34.728388,'b'],[114.620685,32.728388,'c']];
        $dis  = 12;
        //设置单位
        $distanceObj->setUnit('km')//支持km和m
        ->setOrder('asc')//支持asc和desc
        ->setLimit(3)//要取的个数
        //->calculateRadius($base,$need,$dis);//计算方圆12km内在给定的坐标内据我最近的三个
        ->calculateOrder($base,$need);//计算给定的坐标距基础坐标的按距离由近到远排序
        
    }
}
```
### formul驱动暂时不支持calculateRadius和calculateOrder方法
