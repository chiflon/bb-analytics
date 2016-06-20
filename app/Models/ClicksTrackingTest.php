<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 19:00:13
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:51:29
 */

namespace BBAnalytics\Models;

use BBAnalytics\Classes\Model;
use BBAnalytics\Interfaces\ModelInterface;
use BBAnalytics\Classes\MysqlConnection;
use UAParser\Parser;


class ClicksTrackingTest extends Model implements ModelInterface
{
    public $id;
    public $id_country;
    public $id_campaign;
    public $ip_address;
    public $http_useragent;
    public $created_at;

    protected $table = 'clicks_tracking_test';


    public function __construct()
    {
        parent::__construct(new MysqlConnection);
    }


    /**
     * Create a new resource in BD
     * @param  array  $data
     * @return boolean
     */
    public function create(array $data = array())
    {
        $insertSql = $this->con->prepare('
            INSERT INTO ' . $this->table . '
                (id_country, id_campaign, ip_address, http_useragent, created_at)
            VALUES
                (:id_country, :id_campaign, :ip_address, :http_useragent, :created_at)
            ');
        $insertSql->bindParam(':id_country', $data['id_country'], \PDO::PARAM_INT);
        $insertSql->bindParam(':id_campaign', $data['id_campaign'], \PDO::PARAM_INT);
        $insertSql->bindParam(':ip_address', $data['ip_address']);
        $insertSql->bindParam(':http_useragent', $data['http_useragent']);
        $insertSql->bindParam(':created_at', $data['created_at']);

        return $insertSql->execute();
    }


    /**
     * Read a specific resource
     * @param  int $id ID of resource
     * @return array
     */
    public function read($id)
    {
        $readSql = $this->con->prepare('
            SELECT * FROM ' . $this->table . ' WHERE id = :id
        ');
        $readSql->bindParam(':id', $id);
        $readSql->execute();

        return $readSql->fetch();
    }


    /**
     * Retreive a list of resources
     * @param  int $limit
     * @return array
     */
    public function readAll($limit = null)
    {
        $sql = 'SELECT * FROM ' . $this->table;

        if (!is_null($limit)) $sql .= ' LIMIT :limit';

        $readAllSql = $this->con->prepare($sql);

        if (!is_null($limit))
            $readAllSql->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);

        $readAllSql->execute();

        return $readAllSql->fetchAll();
    }


    /**
     * Update a resource in BD
     * @param  array  $data
     * @return boolean
     */
    public function update(array $data = array())
    {
        if (!isset($data['id']))
        {
            throw new \LogicException("Cannot update model without ID", 1);
        }

        $updateSql = $this->con->prepare('
            UPDATE ' . $this->table . ' SET
                id_country = :id_country,
                id_campaign = :id_campaign,
                ip_address = :ip_address,
                http_useragent = :http_useragent,
                created_at = :created_at
            WHERE id = :id
            ');

        $updateSql->bindParam(':id_country', $data['id_country'], \PDO::PARAM_INT);
        $updateSql->bindParam(':id_campaign', $data['id_campaign'], \PDO::PARAM_INT);
        $updateSql->bindParam(':ip_address', $data['ip_address']);
        $updateSql->bindParam(':http_useragent', $data['http_useragent']);
        $updateSql->bindParam(':created_at', $data['created_at']);

        return $updateSql->execute();
    }


    /**
     * Delete a resource in DB
     * @param  int $id
     * @return boolean
     */
    public function delete($id = null){
        if (!is_null($id))
        {
            throw new \LogicException("Cannot delete model without ID", 1);
        }

        $deleteSql = $this->con->prepare('
            DELETE FROM ' . $this->table . ' WHERE id = :id
        ');
        $deleteSql->bindParam(':id', $id);

        return $deleteSql->execute();
    }


    /**
     * Obtain a TOP of User Agents from click tracking list
     * @param  array  $filters
     * @return array
     */
    public function getTopUserAgent($filters = array())
    {
        $sqlValues = [];

        if (!array_key_exists('top', $filters) || !$filters['top'])
            $filters['top'] = 20;

        $sql = 'SELECT *, COUNT(`http_useragent`) as count_http_useragent FROM ' . $this->table . ' WHERE 1 ';

        if (array_key_exists('created_at', $filters) && $filters['created_at'] != '')
            $sql .= ' AND created_at = :created_at ';

        if (array_key_exists('id_campaign', $filters) && $filters['id_campaign'] != '')
            $sql .= ' AND id_campaign = :id_campaign ';

        $sql .= ' GROUP BY `http_useragent` ORDER BY `count_http_useragent` DESC LIMIT :top';

        $topUserAgentSql = $this->con->prepare($sql);

        if (array_key_exists('created_at', $filters) && $filters['created_at'] != '')
            $topUserAgentSql->bindValue(':created_at', $filters['created_at']);

        if (array_key_exists('id_campaign', $filters) && $filters['id_campaign'] != '')
            $topUserAgentSql->bindValue(':id_campaign', (int)$filters['id_campaign'], \PDO::PARAM_INT);

        $topUserAgentSql->bindValue(':top', (int)$filters['top'], \PDO::PARAM_INT);

        $topUserAgentSql->execute();

        return self::parseUserAgentArray($topUserAgentSql->fetchAll());
    }


    /**
     * Get the array and add more info about the user agent
     * @param  array  $userAgents
     * @return array
     */
    public static function parseUserAgentArray(array $userAgents = array())
    {
        foreach ($userAgents as $key => $userAgent)
        {
            $parsedUserAgent = Parser::create()->parse($userAgent['http_useragent']);
            $userAgents[$key]['user_agent']['os'] = $parsedUserAgent->os->family . (($parsedUserAgent->os->major) ? ' ' . $parsedUserAgent->os->major . '.' . $parsedUserAgent->os->minor . '.' . $parsedUserAgent->os->patch : '');
            $userAgents[$key]['user_agent']['ua'] = $parsedUserAgent->ua->family . (($parsedUserAgent->ua->major) ? ' ' . $parsedUserAgent->ua->major . '.' . $parsedUserAgent->ua->minor . '.' . $parsedUserAgent->ua->patch : '');
            $userAgents[$key]['user_agent']['device'] = $parsedUserAgent->device->family . ' ' . $parsedUserAgent->device->brand . (($parsedUserAgent->device->model) ? ' (' . $parsedUserAgent->device->model . ')' : '');
        }

        return $userAgents;
    }


}