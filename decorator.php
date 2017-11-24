<?php
/**
 * Created by PhpStorm.
 * User: f4llou7
 * Date: 24.11.17
 * Time: 23:07
 * Паттерн Decorator (обертка, украшение)
 * подсмотрено на laracast.com
 *
 */

interface CarService {
    public function getCost();

    public function getMessage();
}

class BasicInspection implements CarService {

    public function getCost()
    {
       return 10;
    }

    public function getMessage()
    {
        return 'Базовое обслуживание';
    }
}


class OilChange implements CarService
{
    protected  $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 25 + $this->carService->getCost();
    }

    public function getMessage()
    {
        return $this->carService->getMessage() . ' и замена топлива';
    }
}


class TireRotation implements CarService
{
    protected  $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 45 + $this->carService->getCost();
    }

    public function getMessage()
    {
        return $this->carService->getMessage() . ' и замена шин';
    }
}


$basic = new BasicInspection();
echo $basic->getMessage(). ' : ' . $basic->getCost() . '<br>';

$oil = new OilChange($basic);
echo $oil->getMessage(). ' : ' . $oil->getCost() . '<br>';

$tire = new TireRotation($basic);
echo $tire->getMessage(). ' : ' . $tire->getCost() . '<br>';


