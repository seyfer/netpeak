<?php
/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 02.04.15
 * Time: 16:55
 */

namespace Kosmoss\Controller;

class AreaController extends BaseController
{
    protected $defaultTpl     = 'area.phtml';
    protected $defaultFormTpl = 'area_form.phtml';
    protected $titleResult    = 'Result';
    protected $titleForm      = 'Calculating the area of a triangle';

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

            $s = $this->triangleModel->calcArea();

            $result = "S = " . $s;

            $this->showResult($result);
        }
    }

    private function checkCorrectInput()
    {
        list ($a, $b, $c) = $this->triangleModel->getTriangle()->getSidesArray();

        if (($a == 0) || ($b == 0) || ($c == 0) || ($a > $c) || ($b > $c)) {
            $this->showResult("Incorrect data");

            exit;
        }
    }


}