<?php
namespace Kosmoss\Netpeak;

class Triangle
{
    /**
     * @param $a
     * @param $b
     * @param $c
     * @return bool
     */
    public function existenceTriangle($a, $b, $c)
    {
        return ($c < ($a + $b)) && ($a < ($b + $c)) && ($b < ($a + $c));
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
     * @param $a
     * @param $b
     * @param $c
     * @return float
     */
    public function calcArea($a, $b, $c)
    {
        $p = (($a + $b + $c) / 2);
        $s = round(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)), 5);

        return $s;
    }
}