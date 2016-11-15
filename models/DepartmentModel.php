<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:57
 */

namespace Vendor\src\models;

use Vendor\src\connector\Connector;

class DepartmentModel extends MainModel implements ModelInterface
{

    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            $edit = self::setTable('Department');

            if (isset($_POST['submit'])) {

                header('Location: ../../department');

                $db = Connector::getConnection();

                $sql = "UPDATE Department SET department_name = :department_name, 
                                        university_id = :university_id
                                        WHERE department_id = $id";

                $stmt = $db->prepare($sql);

                $name = $_POST['department_name'];
                $id = $_POST['university_id'];

                $stmt->bindValue(':department_name', $name);
                $stmt->bindValue(':university_id', $id);

                return $stmt->execute();

            }
        }

    }


    public static function getItemList()
    {
        $db = Connector::getConnection();

        $obj1 = self::setTable('Department');

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

        $new = self::setTable('Department');

        if(isset($_POST['submit']))
        {
            header('Location: ../department');

            $sql = "INSERT INTO ".$new->tablename."(department_name, university_id) VALUES 
                    (:department_name, :university_id)";

            $stmt = $db->prepare($sql);

            $execute = $stmt->execute(array(
                ':department_name' => $_POST['department_name'],
                ':university_id' => $_POST['university_id']
            ));
            return $execute;
        }
    }

    public static function deleteItem($id)
    {
        $id = intval($id);

        $delete = self::setTable('Department');

        if($id){
            if(isset($_POST['submit'])) {
                header('Location: ../../department');

                $db = Connector::getConnection();

                $sql = "DELETE FROM $delete->tablename WHERE ".$delete->tablename.'_id='.$id;

                $result = $db->query($sql);

                return $result;
            }
        }

    }



}