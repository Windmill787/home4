<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:00
 */

namespace Vendor\src\models;

use Vendor\src\connector\Connector;

class StudentModel extends MainModel
{
    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            $edit = self::setTable('Student');

            if (isset($_POST['submit'])) {

                header('Location: ../../student');

                $db = Connector::getConnection();

                $sql = "UPDATE Student SET student_name = :student_name, 
                                        student_sirname = :student_sirname, 
                                        student_email = :student_email, 
                                        student_telnumber = :student_telnumber 
                                        WHERE student_id = $id";

                $stmt = $db->prepare($sql);

                $name = $_POST['student_name'];
                $sirname = $_POST['student_sirname'];
                $email = $_POST['student_email'];
                $telnumber = $_POST['student_telnumber'];

                if ($email == NULL){
                    $email = '-';
                }
                if ($telnumber == NULL){
                    $telnumber = '-';
                }

                $stmt->bindValue(':student_name', $name);
                $stmt->bindValue(':student_sirname', $sirname);
                $stmt->bindValue(':student_email', $email);
                $stmt->bindValue(':student_telnumber', $telnumber);

                return $stmt->execute();

            }
        }

    }

    public static function getItemList()
    {
        $db = Connector::getConnection();

        $obj1 = self::setTable('Student');

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

        $new = self::setTable('Student');

        $new->columns = self::getColumns($new->tablename);

        if(isset($_POST['submit']))
        {
            header('Location: ../student');

            $sql = "INSERT INTO ".$new->tablename."(".$new->columns.") VALUES 
                    (NULL, :1, :2, :3, :4, :5)";

            $stmt = $db->prepare($sql);

            $execute = $stmt->execute(array(
                ':1' => $_POST[1],
                ':2' => $_POST[2],
                ':3' => $_POST[3],
                ':4' => $_POST[4],
                ':5' => $_POST[5]
            ));
            return $execute;
        }
    }

    public static function deleteItem($id)
    {
        $id = intval($id);

        $delete = self::setTable('Student');

        if($id){
            if(isset($_POST['submit'])) {
                header('Location: ../../student');

                $db = Connector::getConnection();

                $sql = "DELETE FROM $delete->tablename WHERE ".$delete->tablename.'_id='.$id;

                $result = $db->query($sql);

                return $result;
            }
        }

    }

}