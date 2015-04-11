<?php

namespace Kosmoss\Lib;

/**
 * Class View
 */
abstract class View implements ViewInterface
{
    private static $viewFolder = 'view';

    /**
     * @param string $viewFolder
     */
    public static function setViewFolder($viewFolder)
    {
        self::$viewFolder = $viewFolder;
    }

    /**
     * @param       $tpl
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public static function render($tpl, $data = [])
    {
        ob_start();

        $viewFile = self::$viewFolder . DIRECTORY_SEPARATOR . $tpl;

        if (!file_exists($viewFile)) {
            ob_end_clean();
            throw new \Exception(__METHOD__ . " tpl " . $viewFile . " not found");
        }

        include_once $viewFile;

        $output = ob_get_clean();
        ob_end_clean();

        return $output;
    }
}