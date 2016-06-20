<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-20 07:06:16
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:38:29
 */
 namespace BBAnalytics\Interfaces;

 interface ModelInterface
 {
    /**
     * Create a new resource in BD
     * @param  array  $data
     * @return boolean
     */
    public function create(array $data);

    /**
     * Read a specific resource
     * @param  int $id ID of resource
     * @return array
     */
    public function read($id);

    /**
     * Retreive a list of resources
     * @param  int $limit
     * @return array
     */
    public function readAll($limit);

    /**
     * Update a resource in BD
     * @param  array  $data
     * @return boolean
     */
    public function update(array $data);

    /**
     * Delete a resource in DB
     * @param  int $id
     * @return boolean
     */
    public function delete($id);
 }