<?php
/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 03.04.15
 * Time: 11:31
 */

namespace Kosmoss\Netpeak;


class TriangleModel
{
    /**
     * @var Triangle
     */
    private $triangle;

    public function __construct(Triangle $triangle)
    {
        $this->setTriangle($triangle);
    }

    /**
     * @return Triangle
     */
    public function getTriangle()
    {
        return $this->triangle;
    }

    /**
     * @param Triangle $triangle
     * @return $this
     */
    public function setTriangle($triangle)
    {
        $this->triangle = $triangle;

        return $this;
    }

    /**
     * @return bool
     */
    public function existenceTriangle()
    {
        list ($a, $b, $c) = $this->getTriangle()->getSidesArray();

        return ($c < ($a + $b)) && ($a < ($b + $c)) && ($b < ($a + $c));
    }

    /**
     * @return bool
     */
    public function isCorrect()
    {
        list ($a, $b, $c) = $this->getTriangle()->getSidesArray();

        return sqrt(pow($a, 2) + pow($b, 2)) == $c;
    }

    /**
     * @param $arg1
     * @param $arg2
     * @return float
     */
    public function calcCathetus($arg1, $arg2)
    {
        return round(sqrt(pow($arg1, 2) - pow($arg2, 2)), 5);
    }

    /**
     * @param $arg1
     * @param $arg2
     * @return float
     */
    public function calcHypotenuse($arg1, $arg2)
    {
        return round(sqrt(pow($arg1, 2) + pow($arg2, 2)), 5);
    }

    /**
     * @return float
     */
    public function calcArea()
    {
        list ($a, $b, $c) = $this->getTriangle()->getSidesArray();

        $p = (($a + $b + $c) / 2);
        $s = round(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)), 5);

        $this->getTriangle()->setArea($s);

        return $s;
    }

    /**
     * @return bool
     */
    public function checkAllSidesPositive()
    {
        list ($a, $b, $c) = $this->getTriangle()->getSidesArray();

        return $a > 0 && $b > 0 && $c > 0;
    }

    /**
     * @return bool
     */
    public function checkAllSidesZero()
    {
        list ($a, $b, $c) = $this->getTriangle()->getSidesArray();

        return $a == 0 && $b == 0 && $c == 0;
    }
}