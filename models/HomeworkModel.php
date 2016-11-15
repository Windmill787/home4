<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 19:26
 */

namespace Vendor\src\models;

use Vendor\src\connector\Connector;

class HomeworkModel extends MainModel
{
    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            $edit = self::setTable('Homework');

            if (isset($_POST['submit'])) {

                header('Location: ../../homework');

                $db = Connector::getConnection();

                $sql = "UPDATE Homework SET homework_name = :homework_name, 
                                        homework_done = :homework_done,
                                        discipline_id = :discipline_id,
                                        WHERE homework_id = $id";

                $stmt = $db->prepare($sql);

                $name = $_POST['homework_name'];
                $done = $_POST['homework_done'];
                $id = $_POST['discipline_id'];

                $stmt->bindValue(':homework_name', $name);
                $stmt->bindValue(':homework_done', $done);
                $stmt->bindValue(':discipline_id', $id);

                return $stmt->execute();

            }
        }

    }

    public static function getItemList()
    {
        $db = Connector::getConnection();

        $obj1 = self::setTable('Homework');

        $result = $db->query("SELECT * FROM $obj1->tablename");

        $i = 0;

        $obj1->tablename = lcfirst($obj1->tablename);

        while ($row = $result->fetch(\PDO::FETCH_NUM)) {
            $obj1->dataArray[$i] = $row;
            $i++;
        }
        return $obj1;

    }

    public static function addNewItem()
    {
        $db = Connector::getConnection();

        $new = self::setTable('Homework');

        $new->columns = self::getColumns($new->tablename);

        if(isset($_POST['submit']))
        {
            header('Location: ../homework');

            $sql = "INSERT INTO ".$new->tablename."(".$new->columns.") VALUES 
                    (NULL, :1, :2, :3)";

            $stmt = $db->prepare($sql);

            $execute = $stmt->execute(array(
                ':1' => $_POST[1],
                ':2' => $_POST[2],
                ':3' => $_POST[3],
            ));
            return $execute;
        }
    }

    public static function deleteItem($id)
    {
        $id = intval($id);

        $delete = self::setTable('Homework');

        if($id){
            if(isset($_POST['submit'])) {
                header('Location: ../../homework');

                $db = Connector::getConnection();

                $sql = "DELETE FROM $delete->tablename WHERE ".$delete->tablename.'_id='.$id;

                $result = $db->query($sql);

                return $result;
            }
        }

    }

}