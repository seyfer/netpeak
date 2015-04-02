<?php

namespace Kosmoss\Netpeak;

class ThreeSide extends BaseTriangle
{
    protected $defaultTpl     = 'three_side.phtml';
    protected $defaultFormTpl = 'three_side_form.phtml';
    protected $titleResult    = 'Result';
    protected $titleForm      = 'The definition of a third side of a right triangle';

    public function calcCathetus($arg1, $arg2)
    {
        return round(sqrt(pow($arg1, 2) - pow($arg2, 2)), 5);
    }

    public function calcHypotenuse($arg1, $arg2)
    {
        return round(sqrt(pow($arg1, 2) + pow($arg2, 2)), 5);
    }
}