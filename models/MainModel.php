<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 15:25
 */

class MainModel
{

    public $tablename = '';

    public $dataArray = array();

    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            if (isset($_POST['submit'])) {

                header('Location: ../../main');

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

    public static function fetchData($id)
    {
        $id = intval($id);

        if($id) {

            $db = Connector::getConnection();

            $sql = $db->query("SELECT student_name, student_sirname, student_email, 
                                      student_telnumber FROM Student WHERE student_id=$id");

            $fetchItem = $sql->fetch();

            return $fetchItem;

        }

    }

    public static function getItemList()
    {

        $db = Connector::getConnection();

        $obj1 = MainModel::setTable('Student');

        $result = $db->query("SELECT * FROM $obj1->tablename");

        $i=0;

        $obj1->tablename = lcfirst($obj1->tablename);

        while ($row = $result->fetch()){
            $obj1->dataArray[$i][$obj1->tablename."_id"] = $row[$obj1->tablename."_id"];
            $obj1->dataArray[$i][$obj1->tablename.'_name'] = $row[$obj1->tablename.'_name'];
            $obj1->dataArray[$i][$obj1->tablename.'_sirname'] = $row[$obj1->tablename.'_sirname'];
            $obj1->dataArray[$i][$obj1->tablename.'_email'] = $row[$obj1->tablename.'_email'];
            $obj1->dataArray[$i][$obj1->tablename.'_telnumber'] = $row[$obj1->tablename.'_telnumber'];
            $i++;
        }
        return $obj1;

    }

    public static function addNewItem()
    {
        if(isset($_POST['submit']))
        {
            header('Location: ../main');

            $db = Connector::getConnection();

            $sql = "INSERT INTO Student 
                    (student_name, student_sirname, student_email, student_telnumber)
                              VALUES 
                    (:student_name, :student_sirname, :student_email, :student_telnumber)";

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

    public static function deleteItem($id)
    {
        $id = intval($id);

        if($id){
            if(isset($_POST['submit'])) {
                header('Location: ../../main');

                $db = Connector::getConnection();

                $sql = "DELETE FROM Student WHERE student_id = $id";

                $result = $db->query($sql);

                return $result;
            }
        }

    }

    public static function setTable($tablename){

        $tableobject = new MainModel();

        $tableobject->tablename = $tablename;

        return $tableobject;

    }
}