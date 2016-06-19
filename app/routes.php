<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:28:12
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 19:28:50
 */

namespace BBAnalytics;

use BBAnalytics\Classes\Router;

$router = new Router;

$router->add('/', function() { header('location:/top-useragent');});
$router->add('/top-useragent(.+)?', ['controller' => 'TopUserAgentsController@index']);