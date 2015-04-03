<?php

namespace Kosmoss\Controller;

use Kosmoss\Lib\View;
use Kosmoss\Netpeak\Triangle;
use Kosmoss\Netpeak\TriangleModel;

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
     * @var TriangleModel
     */
    protected $triangleModel;

    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $a = isset($_POST['a']) ? $_POST['a'] : 0;
        $b = isset($_POST['b']) ? $_POST['b'] : 0;
        $c = isset($_POST['c']) ? $_POST['c'] : 0;

        $this->triangleModel = new TriangleModel(new Triangle($a, $b, $c));
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

    protected function checkExistence()
    {
        $triangleExistence = $this->triangleModel->existenceTriangle();

        if (!$triangleExistence) {
            $this->showResult("Incorrect data");

            exit;
        }
    }

    protected function checkCorrectness()
    {
        if (!$this->triangleModel->isCorrect()) {
            $this->showResult("Triangle is not right triangle");

            exit;
        }
    }


}