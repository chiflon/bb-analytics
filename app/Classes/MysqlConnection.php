<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 18:43:21
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:50:49
 */
namespace BBAnalytics\Classes;


class MysqlConnection
{
    /**
     * Connection
     * @var object
     */
    private $con;


    /**
     * Init PDO object and assign to $con variable
     */
    public function __construct()
    {
        $this->con = new \PDO('mysql:host=' . DB_HOST . ';dbname='. DB_NAME, DB_USER, DB_PASS);
    }


    /**
     * Returns the PDO object connection
     * @return object PDO connection
     */
    public function load()
    {
        return $this->con;
    }


}