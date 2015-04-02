<?php

namespace Kosmoss\Controller;

use Kosmoss\Netpeak\ThreeSide;

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 02.04.15
 * Time: 13:22
 */
class ThreeSideController extends BaseController
{
    public function __construct()
    {
        $this->triangleModel = new ThreeSide();
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

        if (($a == 0 && $b == 0) || ($a == 0 && $c == 0) ||
            ($b == 0 && $c == 0) ||
            (($c > 0) && (($a >= $c) || ($b >= $c)))
        ) {
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
                $this->triangleModel->showResult("a = " . strval($a) . ", b = " . strval($b) . ", c = " . strval($c));
            }
        } else {
            if ($a == 0) {
                $result = round(sqrt(pow($c, 2) - pow($b, 2)), 5);
                $result = "a = " . strval($result);
            } elseif ($b == 0) {
                $result = round(sqrt(pow($c, 2) - pow($a, 2)), 5);
                $result = "b = " . strval($result);
            } else {
                $result = round(sqrt(pow($a, 2) + pow($b, 2)), 5);
                $result = "c = " . strval($result);
            }

            $this->triangleModel->showResult($result);
        }
    }
}