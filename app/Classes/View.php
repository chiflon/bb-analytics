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

    public function __construct($dottedPath)
    {
        $this->viewPath = self::dottedPath2viewPath($dottedPath);
    }

    public function render(array $data = array())
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


    public static function dottedPath2viewPath($dottedPath)
    {
        return VIEWSPATH . str_replace('.', DS, $dottedPath) . '.php';
    }
}