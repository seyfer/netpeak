<?php

namespace Kosmoss\Controller;

use Kosmoss\Lib\View;
use Kosmoss\Netpeak\Triangle;

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 02.04.15
 * Time: 16:46
 */
abstract class BaseController
{
    /**
     * @var string
     */
    protected $defaultFormTpl = '';

    /**
     * @var string
     */
    protected $defaultTpl = '';

    /**
     * @var string
     */
    protected $titleResult = '';

    /**
     * @var string
     */
    protected $titleForm = '';

    /**
     * @var Triangle
     */
    protected $triangleModel;

    public function __construct()
    {
        $this->triangleModel = new Triangle();
    }

    /**
     * @param        $result
     * @param string $tpl
     * @return string
     */
    public function showResult($result, $tpl = '')
    {
        $data = [
            'title'  => $this->titleResult,
            'result' => $result,
        ];

        if (!$tpl) {
            $tpl = $this->defaultTpl;
        }

        $HTML = View::render($tpl, $data);

        echo $HTML;

        return $HTML;
    }

    /**
     * @param        $post
     * @param string $tpl
     * @return string
     * @throws \Exception
     */
    public function showForm($post, $tpl = '')
    {
        $data = [
            'title' => $this->titleForm,
            'post'  => $post,
        ];

        if (!$tpl) {
            $tpl = $this->defaultFormTpl;
        }

        $HTML = View::render($tpl, $data);

        echo $HTML;

        return $HTML;
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     */
    protected function checkExistence($a, $b, $c)
    {
        $triangleExistence = $this->triangleModel->existenceTriangle($a, $b, $c);

        if (!$triangleExistence) {
            $this->showResult("Incorrect data");

            exit;
        }
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     */
    protected function checkCorrectness($a, $b, $c)
    {
        if (sqrt(pow($a, 2) + pow($b, 2)) != $c) {
            $this->showResult("Triangle is not right triangle");

            exit;
        }
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @return bool
     */
    protected function checkAllPositive($a, $b, $c)
    {
        return $a > 0 && $b > 0 && $c > 0;
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @return bool
     */
    protected function checkAllZero($a, $b, $c)
    {
        return $a == 0 && $b == 0 && $c == 0;
    }
}