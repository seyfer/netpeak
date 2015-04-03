<?php

namespace Kosmoss\Controller;

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 02.04.15
 * Time: 13:22
 */
class ThreeSideController extends BaseController
{
    protected $defaultTpl     = 'three_side.phtml';
    protected $defaultFormTpl = 'three_side_form.phtml';
    protected $titleResult    = 'Result';
    protected $titleForm      = 'The definition of a third side of a right triangle';

    /**
     * NEED MORE REFACTORING !!!
     */
    public function process()
    {
        $a = isset($_POST['a']) ? $_POST['a'] : 0;
        $b = isset($_POST['b']) ? $_POST['b'] : 0;
        $c = isset($_POST['c']) ? $_POST['c'] : 0;

        if ($this->checkAllZero($a, $b, $c)) {
            $this->showForm($_POST);

            exit;
        }

        if (($a == 0 && $b == 0) || ($a == 0 && $c == 0) ||
            ($b == 0 && $c == 0) ||
            (($c > 0) && (($a >= $c) || ($b >= $c)))
        ) {
            $this->showResult("Incorrect data");

            exit;
        }

        if ($this->checkAllPositive($a, $b, $c)) {
            $this->checkExistence($a, $b, $c);

            $this->checkCorrectness($a, $b, $c);

            $this->showResult("a = " . strval($a) . ", b = " . strval($b) . ", c = " . strval($c));
        } else {
            if ($a == 0) {
                $result = "a = " . $this->triangleModel->calcCathetus($c, $b);
            } elseif ($b == 0) {
                $result = "b = " . $this->triangleModel->calcCathetus($c, $a);;
            } else {
                $result = "c = " . $this->triangleModel->calcHypotenuse($a, $b);;
            }

            $this->showResult($result);
        }
    }

}