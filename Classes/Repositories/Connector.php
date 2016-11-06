<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 22:00
 */

namespace Vendor\Dir\Repositories;

class Connector extends ConnectorParams
{
    public function connectDatabase()
    {
        $link = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
        return $link;
    }

    public function useQuery($query)
    {
        $data = mysqli_query($this->connectDatabase(), $query);
        $result = mysqli_fetch_array($data);
        return $result;
    }
}