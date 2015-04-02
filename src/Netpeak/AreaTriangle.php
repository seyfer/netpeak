<?php

namespace Kosmoss\Netpeak;

class AreaTriangle extends BaseTriangle
{
    protected $defaultTpl     = 'area.phtml';
    protected $defaultFormTpl = 'area_form.phtml';
    protected $titleResult    = 'Result';
    protected $titleForm      = 'Calculating the area of a triangle';

    public function calcArea($a, $b, $c)
    {
        $p = (($a + $b + $c) / 2);
        $s = round(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)), 5);

        return $s;
    }
}
