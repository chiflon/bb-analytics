<?php

/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 17:51:24
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:49:18
 */

//Config file
require_once '../app/config.php';

//Bootstrap file
require_once '../app/bootstrap.php';

//Autoload
require_once '../vendor/autoload.php';

//Routes
require_once '../app/routes.php';

//Execute URI requested
$router->execute($_SERVER['REQUEST_URI']);