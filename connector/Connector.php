<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 17:37
 */

namespace Vendor\src\connector;

class Connector
{
    /**
     * Database connection with given parameters and encoding selection
     */
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/ConnectorParams.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        $db = new \PDO($dsn, $params['user'], $params['password']);

        $db->exec("set names utf8");

        return $db;
    }

}