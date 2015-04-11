<?php
/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 11.04.15
 * Time: 16:10
 */

namespace Kosmoss\Lib;


interface ViewInterface
{
    public static function setViewFolder($viewFolder);

    public static function render($tpl, $data = []);
}