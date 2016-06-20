<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 07:08:40
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:13:57
 */
namespace BBAnalytics\Classes;

class Model {

    /**
     * Connection
     * @var MysqlConnection object
     */
    protected $con;

    /**
     * Name of the model's table
     * @var string
     */
    protected $table;

    /**
     * Asign the MysqlConnection object to $con variable
     * @param MysqlConnection $connection
     */
    public function __construct(MysqlConnection $connection)
    {
        $this->con = $connection->load();
    }
}