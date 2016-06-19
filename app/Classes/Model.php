<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 07:08:40
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 12:32:14
 */
namespace BBAnalytics\Classes;

class Model {

    protected $con;

    protected $table;

    public function __construct(MysqlConnection $connection)
    {
        $this->con = $connection->load();
    }
}