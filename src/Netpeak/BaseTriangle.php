<?php
namespace Kosmoss\Netpeak;

//require_once "../Lib/View.php";

use Kosmoss\Lib\View;

abstract class BaseTriangle
{
    /**
     * @var string
     */
    protected $defaultTpl = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @param        $result
     * @param string $tpl
     * @return string
     */
    public function showResult($result, $tpl = '')
    {
        $data = [
            'title'  => $this->title,
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
     * @param $a
     * @param $b
     * @param $c
     * @return mixed
     */
    abstract function existenceTriangle($a, $b, $c);
}