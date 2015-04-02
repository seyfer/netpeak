<?php
/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 02.04.15
 * Time: 16:55
 */

namespace Kosmoss\Controller;


use Kosmoss\Netpeak\AreaTriangle;

class AreaController extends BaseController
{
    public function __construct()
    {
        $this->triangleModel = new AreaTriangle();
    }

    /**
     * NEED MORE REFACTORING !!!
     */
    public function process()
    {
        $a = isset($_POST['a']) ? $_POST['a'] : 0;
        $b = isset($_POST['b']) ? $_POST['b'] : 0;
        $c = isset($_POST['c']) ? $_POST['c'] : 0;

        if ($this->checkAllZero($a, $b, $c)) {
            $this->triangleModel->showForm($_POST);

            exit;
        }

        if (($a == 0) || ($b == 0) || ($c == 0) || ($a > $c) || ($b > $c)) {
            $this->triangleModel->showResult("Incorrect data");

            exit;
        }

        if ($this->checkAllPositive($a, $b, $c)) {
            $this->checkExistence($a, $b, $c);

            $this->checkCorrectness($a, $b, $c);

            $s = $this->triangleModel->calcArea($a, $b, $c);

            $result = "S = " . $s;

            $this->triangleModel->showResult($result);
        }
    }
}