<?php
/**
 * Created by PhpStorm.
 * User: f4llou7
 * Date: 25.11.17
 * Time: 0:15
 */

interface Car
{
    public function getName();
}

class BMW implements Car
{

    public function getName()
    {
        return 'BMW';
    }
}

class Skoda implements Car
{

    public function getName()
    {
        return 'Skoda';
    }
}

class Factory
{
    public static function create($type)
    {
        switch ($type) {
            case 'BMW':
                return new BMW();
            case 'Skoda':
                return new Skoda();
            default:
                return new BMW();
        }
    }
}

$model = Factory::create('Skoda');
echo $model->getName();