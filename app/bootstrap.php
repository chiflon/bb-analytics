<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 18:29:40
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 08:37:15
 */

if( APP_DEBUG === true )
{
    ini_set('display_errors', true);
}


define('DS', DIRECTORY_SEPARATOR);


define('APPPATH', __DIR__ . DS);
define('PUBLICPATH', APPPATH . '..' . DS . 'public' . DS);

define('CLASSESPATH', APPPATH . 'Classes' . DS);
define('CONTROLLERSPATH', APPPATH . 'Controllers' . DS);
define('MODELSPATH', APPPATH . 'Models' . DS);
define('VIEWSPATH', APPPATH . 'Views' . DS);