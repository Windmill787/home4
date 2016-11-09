<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 15:25
 */

class MainModel
{
    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            if (isset($_POST['submit'])) {

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

        $newsList = array();

        $result = $db->query('SELECT * FROM Student');

        $i=0;

        while ($row = $result->fetch()){
            $newsList[$i]['student_id'] = $row['student_id'];
            $newsList[$i]['student_name'] = $row['student_name'];
            $newsList[$i]['student_sirname'] = $row['student_sirname'];
            $newsList[$i]['student_email'] = $row['student_email'];
            $newsList[$i]['student_telnumber'] = $row['student_telnumber'];
            $i++;
        }
        return $newsList;

    }

    public static function addNewItem()
    {
        if(isset($_POST['submit']))
        {

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

                $db = Connector::getConnection();

                $sql = "DELETE FROM Student WHERE student_id = $id";

                $result = $db->query($sql);

                return $result;
            }
        }

    }
}