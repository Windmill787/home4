<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 20:50
 */

namespace Vendor\src\models;

use Vendor\src\connector\Connector;

class MainModel
{
    public $tablename;

    public $dataArray = array();

    public static function setTable($tablename){

        $tableobject = new self();

        $tableobject->tablename = $tablename;

        return $tableobject;

    }

    public static function fetchData($id, $table)
    {
        $id = intval($id);

        if($id) {

            $db = Connector::getConnection();

            $fetch = self::setTable($table);

            $sql = $db->query("SELECT * FROM $fetch->tablename WHERE ".lcfirst($fetch->tablename)."_id=$id");

            $fetch->dataArray = $sql->fetch(\PDO::FETCH_NUM);

            return $fetch;

        }

    }

}