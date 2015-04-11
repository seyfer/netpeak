<?php
/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 11.04.15
 * Time: 15:58
 */

namespace Kosmoss\Controller;


class IndexController extends BaseController
{
    protected $title      = "Test task for Netpeak";
    protected $defaultTpl = 'index.phtml';

    public function process()
    {
        $data = [
            'title' => $this->title,
        ];

        $this->showSomething($data, $this->defaultTpl);
    }
}