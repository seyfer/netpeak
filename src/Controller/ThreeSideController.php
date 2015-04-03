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

    public function process()
    {
        if ($this->triangleModel->checkAllSidesZero()) {
            $this->showForm($_POST);

            exit;
        }

        $this->checkCorrectInput();

        if ($this->triangleModel->checkAllSidesPositive()) {
            $this->checkExistence();

            $this->checkCorrectness();

            $this->showResult($this->formCorrectResult());
        } else {
            $this->calcSide();
        }
    }

    private function calcSide()
    {
        list ($a, $b, $c) = $this->triangleModel->getTriangle()->getSidesArray();

        if ($a == 0) {
            $result = "a = " . $this->triangleModel->calcCathetus($c, $b);
        } elseif ($b == 0) {
            $result = "b = " . $this->triangleModel->calcCathetus($c, $a);;
        } else {
            $result = "c = " . $this->triangleModel->calcHypotenuse($a, $b);;
        }

        $this->showResult($result);
    }

    private function checkCorrectInput()
    {
        list ($a, $b, $c) = $this->triangleModel->getTriangle()->getSidesArray();

        if (($a == 0 && $b == 0) || ($a == 0 && $c == 0) ||
            ($b == 0 && $c == 0) ||
            (($c > 0) && (($a >= $c) || ($b >= $c)))
        ) {
            $this->showResult("Incorrect data");

            exit;
        }
    }

    /**
     * @return string
     */
    private function formCorrectResult()
    {
        list ($a, $b, $c) = $this->triangleModel->getTriangle()->getSidesArray();

        return "a = " . strval($a) . ", b = " . strval($b) . ", c = " . strval($c);
    }

}