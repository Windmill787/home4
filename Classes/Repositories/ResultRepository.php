<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 23:52
 */

namespace Vendor\Dir\Repositories;

class ResultRepository
{
    public function getAll($table)
    {
        $query = 'SELECT * FROM '.$table;
        $connect = new Connector();
        $column = $connect->useQuery($query);
        $un_id   = $column['university_id'];
        $un_name = $column['university_name'];
        $un_city = $column['university_city'];
        $un_site = $column['university_site'];
        $results = $un_id.$un_name.$un_city.$un_site;
        return $results;
    }

    public function getColumn($table)
    {
        $query = 'SELECT * FROM '.$table;
        $connect = new Connector();
        $column = $connect->useQuery($query);
        $results = [
            'un_id'   => $column['university_id'],
            'un_name' => $column['university_name'],
            'un_city' => $column['university_city'],
            'un_site' => $column['university_site']
        ];

        return $results;
    }
}