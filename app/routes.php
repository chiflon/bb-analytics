<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:28:12
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 09:43:53
 */

namespace BBAnalytics;

/**
 * App routes
 * Define an URI request and add a function closure or Controller path like 'Controller@method'
 */

use BBAnalytics\Classes\Router;
use BBAnalytics\Classes\View;
use BBAnalytics\Classes\Installer;

$router = new Router;

//Home
$router->add('/', function() {
    if(Installer::isInstalled())
        header('location:/top-useragent');
    else
        header('location:/install');
});

//Top User Agent
$router->add('/top-useragent(.+)?', ['controller' => 'TopUserAgentsController@index']);


//Top User Agent
$router->add('/install(.+)?', ['controller' => 'InstallerController@install']);

//404
$router->add('/404', function() {
    header("HTTP/1.0 404 Not Found");
    return (new View('errors.404'))->render(['pageTitle' => '404 Not Found']);
});

//If doesn't match, redirect to 404
$router->otherwise(function() {
    header('location:/404');
});