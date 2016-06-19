<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:26:43
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 07:25:10
 */
namespace BBAnalytics\Classes;

class Router
{

    private $routes = array();

    private $controller;

    private $method;

    public function add($pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$pattern] = $callback;
    }

    public function execute($uri) {
        foreach ($this->routes as $pattern => $callback)
        {
            if (preg_match($pattern, $uri, $params) === 1)
            {
                array_shift($params);

                if (is_array($callback) && array_key_exists('controller', $callback))
                {
                    $controllerRequest = explode('@', $callback['controller']);
                    $this->controller = "\\BBAnalytics\\Controllers\\" . $controllerRequest[0];
                    $this->method = $controllerRequest[1];
                    $callback = [new $this->controller, $this->method];
                }

                return call_user_func_array($callback, array_values($params));

            }
        }
    }

}