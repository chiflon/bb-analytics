<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 07:26:24
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 08:39:13
 */
namespace BBAnalytics\Classes;

class View {

    protected $viewPath;

    public function __construct($viewPath)
    {
        $this->viewPath = self::viewPath2folderPath($viewPath);
    }

    public function render($data)
    {
        $templateFile = VIEWSPATH . 'templates' . DS . VIEW_TEMPLATE . '.php';

        if( file_exists($this->viewPath) )
        {
            if( file_exists($templateFile) )
            {
                extract($data);
                require($templateFile);
            }
            else
            {
                //error
            }
        }
        else
        {
            //error
        }


    }

    public static function viewPath2folderPath($viewPath)
    {
        return VIEWSPATH . str_replace('.', '/', $viewPath) . '.php';
    }
}