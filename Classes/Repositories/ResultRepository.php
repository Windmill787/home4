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
        $result = $connect->useQuery($query);
        return $result;
    }


}