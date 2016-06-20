<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 07:26:24
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:50:29
 */
namespace BBAnalytics\Classes;

class View {


    /**
     * Real path of the view requested
     * @var string
     */
    protected $viewPath;


    /**
     * Asign the dotted path to view path
     * @param string $dottedPath dotted based path (folder.folder.view)
     */
    public function __construct($dottedPath)
    {
        $this->viewPath = self::dottedPath2viewPath($dottedPath);
    }


    /**
     * Send data to view and render
     * @param  array  $data data to send to view
     */
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


    /**
     * Convert dotted path to view path
     * @param  string $dottedPath
     * @return string             view path
     */
    public static function dottedPath2viewPath($dottedPath)
    {
        return VIEWSPATH . str_replace('.', DS, $dottedPath) . '.php';
    }
}