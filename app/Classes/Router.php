<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:26:43
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:50:38
 */
namespace BBAnalytics\Classes;

class Router
{

    /**
     * List of routes
     * @var array
     */
    private $routes = array();


    /**
     * Add route's pattern to list
     * @param string $pattern
     * @param callback $callback
     */
    public function add($pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$pattern] = $callback;
    }


    /**
     * Run callback when the request isn't in list
     * @param  callback $callback
     */
    public function otherwise($callback) {
        $this->routes['/^(.*)$/'] = $callback;
    }


    /**
     * Receives the URI request, tries to match and execute the callback
     * @param  string $uri Requested URI
     * @return callback      Callback
     */
    public function execute($uri) {

        foreach ($this->routes as $pattern => $callback)
        {
            if (preg_match($pattern, $uri, $params) === 1)
            {
                array_shift($params);

                //If it's array and 'controller' is defined, executes the controller's path
                if (is_array($callback) && array_key_exists('controller', $callback))
                {
                    $controllerRequest = explode('@', $callback['controller']);
                    $controller = "\\BBAnalytics\\Controllers\\" . $controllerRequest[0];
                    $method = $controllerRequest[1];
                    $callback = [new $controller, $method];
                }

                return call_user_func_array($callback, array_values($params));
            }
        }
    }

}