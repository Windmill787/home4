<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:00
 */

namespace Vendor\src\models;

use Vendor\src\connector\Connector;

class StudentModel extends MainModel implements ModelInterface
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
                                        student_telnumber = :student_telnumber,
                                        department_id = :department_id
                                        WHERE student_id = $id";

                $stmt = $db->prepare($sql);

                $name = $_POST['student_name'];
                $sirname = $_POST['student_sirname'];
                $email = $_POST['student_email'];
                $telnumber = $_POST['student_telnumber'];
                $dep_id = $_POST['department_id'];

                $stmt->bindValue(':student_name', $name);
                $stmt->bindValue(':student_sirname', $sirname);
                $stmt->bindValue(':student_email', $email);
                $stmt->bindValue(':student_telnumber', $telnumber);
                $stmt->bindValue(':department_id', $dep_id);

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

        if(isset($_POST['submit']))
        {
            header('Location: ../student');

            $sql = "INSERT INTO ".$new->tablename."(student_name, student_sirname,
            student_email, student_telnumber, department_id) VALUES 
                    (
                    :student_name, :student_sirname, :student_email, 
                    :student_telnumber, :department_id
                    )";

            $stmt = $db->prepare($sql);

            $execute = $stmt->execute(array(
                ':student_name' => $_POST['student_name'],
                ':student_sirname' => $_POST['student_sirname'],
                ':student_email' => $_POST['student_email'],
                ':student_telnumber' => $_POST['student_telnumber'],
                ':department_id' => $_POST['department_id']
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