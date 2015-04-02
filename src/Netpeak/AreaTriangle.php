<?php

namespace Kosmoss\Netpeak;

class AreaTriangle extends BaseTriangle
{
    protected $defaultTpl     = 'area.phtml';
    protected $defaultFormTpl = 'area_form.phtml';
    protected $titleResult    = 'Result';
    protected $titleForm      = 'Calculating the area of a triangle';

    /**
     * @param $a
     * @param $b
     * @param $c
     * @return bool
     */
    public function existenceTriangle($a, $b, $c)
    {
        return (($c < ($a + $b)) && ($a < ($b + $c)) && ($b < ($a + $c)));
    }
}
