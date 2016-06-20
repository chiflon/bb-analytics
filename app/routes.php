<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:28:12
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:52:35
 */

namespace BBAnalytics;

/**
 * App routes
 * Define an URI request and add a function closure or Controller path like 'Controller@method'
 */

use BBAnalytics\Classes\Router;
use BBAnalytics\Classes\View;

$router = new Router;

//Home
$router->add('/', function() { header('location:/top-useragent');});

//Top User Agent
$router->add('/top-useragent(.+)?', ['controller' => 'TopUserAgentsController@index']);

//404
$router->add('/404', function() {
    header("HTTP/1.0 404 Not Found");
    return (new View('errors.404'))->render(['pageTitle' => '404 Not Found']);
});

//If doesn't match, redirect to 404
$router->otherwise(function() {
    header('location:/404');
});