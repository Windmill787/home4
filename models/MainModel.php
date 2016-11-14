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

            $edit = MainModel::setTable('Student');

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

    public static function fetchData($id)
    {
        $id = intval($id);

        if($id) {

            $db = Connector::getConnection();

            $fetch = MainModel::setTable('Student');

            $sql = $db->query("SELECT * FROM $fetch->tablename WHERE ".lcfirst($fetch->tablename)."_id=$id");

            $fetch->dataArray = $sql->fetch(PDO::FETCH_NUM);

            return $fetch;

        }

    }

    public static function getItemList()
    {
        if (isset($_POST['submit'])) {
            $db = Connector::getConnection();

            $obj1 = MainModel::setTable($_POST['tablename']);

            $result = $db->query("SELECT * FROM $obj1->tablename");

            $i = 0;

            $obj1->tablename = lcfirst($obj1->tablename);

            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $obj1->dataArray[$i] = $row;
                $i++;
            }
            return $obj1;
        }
    }

    public static function addNewItem()
    {
        $db = Connector::getConnection();

        $new = MainModel::setTable('student');

        $columns = $db->query("SHOW COLUMNS FROM Student");

        $column = $columns->fetchAll(PDO::FETCH_NUM);

        $str = '';

        foreach ($column as $item)
        {
            $str .= $item[0].', ';

        }
        $str = substr($str, 0, -2);

        echo $str.'<br>';

        if(isset($_POST['submit']))
        {
            //header('Location: ../student');

            $sql = "INSERT INTO ".ucfirst($new->tablename)."(".$str.") VALUES 
                    (NULL, ?, ?, ?, ?, ?)";

            $stmt = $db->prepare($sql);

            return $stmt->execute(array($_POST[1], $_POST[2], $_POST[3], $_POST[4], $_POST[5]));
        }


    }

    public static function deleteItem($id)
    {
        $id = intval($id);

        $delete = MainModel::setTable('Student');

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

    public static function setTable($tablename){

        $tableobject = new MainModel();

        $tableobject->tablename = $tablename;

        return $tableobject;

    }
}