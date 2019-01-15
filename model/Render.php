<?php
/**
 * Class Render from render views
 */

namespace model;

class Render
{
    /**
     * @param string $view
     * @param array $dataArray, default null
     */
    public static function view($view, $dataArray=null)
    {
        $data = $dataArray;
        die(require_once('./view/'.$view.'.php'));
    }
}