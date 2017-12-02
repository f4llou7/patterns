<?php

// Пример позднего статического связывания
// отличие self от static
class A {
    const MYCONST = 1;

    /**
     * Смотрит MYCONST именно в это классе, если от него
     * будут наследоваться класс
     * то все равно MYCONST = 1, даже если мы переопределим потом это свойство
     * @return int
     */
    public static function testSelf() {
        return self::MYCONST;
    }

    /**
     * Если мы делаем static, отнаследуемся от этого класса и переопределим константу, то увидим изменения
     * @return int
     */
    public static function testStatic() {
        return static::MYCONST;
    }
}

Class B extends A {
    const MYCONST = 2;
}

echo 'self - ' . B::testSelf();
echo 'static - ' . B::testStatic();

