<?php
namespace Kosmoss\Netpeak;

use Kosmoss\Lib\View;

abstract class BaseTriangle
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
     * @return bool
     */
    abstract function existenceTriangle($a, $b, $c);
}