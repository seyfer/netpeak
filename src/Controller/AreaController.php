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

        if ($a == 0 && $b == 0 && $c == 0) {
            $this->triangleModel->showForm($_POST);

            return;
        }

        if (($a == 0) || ($b == 0) || ($c == 0) || ($a > $c) || ($b > $c)) {
            $this->triangleModel->showResult("Incorrect data");

            return;
        }

        if ($a > 0 && $b > 0 && $c > 0) {
            $triangleExistence = $this->triangleModel->existenceTriangle($a, $b, $c);

            if (!$triangleExistence) {
                $this->triangleModel->showResult("Incorrect data");

                return;
            }

            if (sqrt(pow($a, 2) + pow($b, 2)) != $c) {
                $this->triangleModel->showResult("Triangle is not right triangle");
            } else {
                if (($a > $c) || ($b > $c)) {
                    $this->triangleModel->showResult("Incorrect data");
                } else {
                    $p      = (($a + $b + $c) / 2);
                    $s      = round(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)), 5);
                    $result = "S = " . strval($s);

                    $this->triangleModel->showResult($result);
                }

            }

        }
    }
}