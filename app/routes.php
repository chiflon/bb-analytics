<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:28:12
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 19:28:50
 */

namespace BBAnalytics;

use BBAnalytics\Classes\Router;
use BBAnalytics\Classes\View;

$router = new Router;

$router->add('/', function() { header('location:/top-useragent');});
$router->add('/top-useragent(.+)?', ['controller' => 'TopUserAgentsController@index']);
$router->add('/404', function() {
    header("HTTP/1.0 404 Not Found");
    return (new View('errors.404'))->render(['pageTitle' => '404 Not Found']);
});
$router->otherwise(function() {
    header('location:/404');
});