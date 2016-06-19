<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 18:43:21
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 15:56:11
 */
namespace BBAnalytics\Classes;

/**
 *
 */
class MysqlConnection
{

    private $con;


    public function __construct()
    {
        $this->con = new \PDO('mysql:host=' . DB_HOST . ';dbname='. DB_NAME, DB_USER, DB_PASS);
    }

    public function load()
    {
        return $this->con;
    }


}