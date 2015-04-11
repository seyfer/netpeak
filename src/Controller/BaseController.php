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
abstract class BaseController implements ControllerInterface
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

    /**
     * @var string
     */
    protected $layout = "layout.phtml";

    /**
     * @param string $layout
     * @return $this
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;

        return $this;
    }

    public function __construct()
    {
        $this->init();
    }

    abstract public function process();

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

        return $this->showSomething($data, $tpl);
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

        return $this->showSomething($data, $tpl);
    }

    /**
     * @param $data
     * @param $tpl
     * @return string
     * @throws \Exception
     */
    protected function showSomething($data, $tpl)
    {
        $content = View::render($tpl, $data);
        $layout  = View::render($this->layout, array_merge($data, ['content' => $content]));

        echo $layout;

        return $layout;
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