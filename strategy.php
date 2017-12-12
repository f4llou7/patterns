<?php
namespace strategy;

/**
 * Interface IEngine
 * @package strategy
 *
 * Интерфейс движка
 */
interface IEngine
{
    public function Move();
}

/**
 * Class PetrolEngine
 * @package strategy
 *
 * Класс бензиновыого движка, с методом движения (Move), реализующий интерфейс IEngine
 */
class PetrolEngine implements IEngine
{
    public function Move()
    {
        echo 'Едем на бензине';
    }
}

/**
 * Class DieselEngine
 * @package strategy
 *
 * Аналогично
 */
class DieselEngine implements IEngine
{
    public function Move()
    {
        echo 'Едем на солярке';
    }
}

/**
 * Class Car
 * @package strategy
 *
 * Класс машины, со свойствами (полями) МОДЕЛЬ и ДВИЖОК и методом ДВИЖЕНИЕ.
 */
class Car
{
    private $model;
    private $engine;

    public function __construct($model, IEngine $engine)
    {
        $this->model = $model;
        $this->engine = $engine;
    }

    public function Move()
    {
        $this->engine->Move();
    }
}

/**
 * Class Main
 * @package strategy
 *
 * Основной класс, где создаём объекты тачек с разными типами движков.
 */
class Main
{
    public function index()
    {
        $volvo = new Car("S60", new PetrolEngine());
        $volvo->Move(); // Заводим Volvo S60 с бензиновым двигателем.

        $audi = new Car("A4", new DieselEngine());
        $audi->Move(); // Заводим Audi A4 с дизельным движком.
    }
}
