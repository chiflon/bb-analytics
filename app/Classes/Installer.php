<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-20 09:24:40
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 10:08:55
 */
namespace BBAnalytics\Classes;

use BBAnalytics\Classes\MysqlConnection;

class Installer {

    private $con;

    public function __construct()
    {
        $this->con = (new MysqlConnection)->load();
    }

    public static function isInstalled()
    {
        return (new MysqlConnection)->load()->query("SHOW TABLES LIKE 'clicks_tracking_test'")->fetch() !== false;
    }

    public function install()
    {
        return $this->con->query('
            CREATE TABLE IF NOT EXISTS `clicks_tracking_test` (
              `id` int(1) NOT NULL AUTO_INCREMENT,
              `id_country` int(2) DEFAULT NULL,
              `id_campaign` int(4) DEFAULT NULL,
              `http_useragent` varchar(600) DEFAULT NULL,
              `ip_address` varchar(20) DEFAULT NULL,
              `created_at` varchar(10) DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `id_country` (`id_country`),
              KEY `id_campaign` (`id_campaign`),
              KEY `created_at` (`created_at`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4640000 ;'
        );
    }
}