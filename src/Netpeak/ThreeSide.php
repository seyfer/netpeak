<?php

namespace Kosmoss\Netpeak;

class ThreeSide extends BaseTriangle
{
    protected $defaultTpl     = 'three_side.phtml';
    protected $defaultFormTpl = 'three_side_form.phtml';
    protected $titleResult    = 'Result';
    protected $titleForm      = 'The definition of a third side of a right triangle';

    public function existenceTriangle($a, $b, $c)
    {
        return (($c > ($a + $b)) || ($a > ($b + $c)) || ($b > ($a + $c))) ? 0 : 1;
    }
}