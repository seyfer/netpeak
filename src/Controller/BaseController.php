<?php

namespace Kosmoss\Controller;

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 02.04.15
 * Time: 16:46
 */
abstract class BaseController
{
    protected $triangleModel;

    protected function checkExistence($a, $b, $c)
    {
        $triangleExistence = $this->triangleModel->existenceTriangle($a, $b, $c);

        if (!$triangleExistence) {
            $this->triangleModel->showResult("Incorrect data");

            exit;
        }
    }

    protected function checkCorrectness($a, $b, $c)
    {
        if (sqrt(pow($a, 2) + pow($b, 2)) != $c) {
            $this->triangleModel->showResult("Triangle is not right triangle");

            exit;
        }
    }

    protected function checkAllPositive($a, $b, $c)
    {
        return $a > 0 && $b > 0 && $c > 0;
    }

    protected function checkAllZero($a, $b, $c)
    {
        return $a == 0 && $b == 0 && $c == 0;
    }
}