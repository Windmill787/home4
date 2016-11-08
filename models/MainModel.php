<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 15:25
 */

class MainModel
{
    public static function getNewsItemById($id)
    {
        $id = intval($id);

        if($id){

           $db = Connector::getConnection();

            $result = $db->query('SELECT  
                    student_name, 
                    student_sirname, 
                    student_email, 
                    student_telnumber 
            FROM Student WHERE student_id='.$id);

            $result ->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    public static function getNewsList()
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
        $db = Connector::getConnection();

        $sql = $db->query("INSERT INTO Student 
                    (student_name, student_sirname, student_email, student_telnumber)
                              VALUES 
                    ('student_name', 'student_sirname', 'student_email', 'student_telnumber')");

        echo '<br>'.$sql->rowCount().'<br>';
        echo $db->lastInsertId().'<br>';

        print_r($sql);
        return $sql;

        /*$name = 'Олег';
        $sirname = 'Валерьянович';
        $email = 'Valeroleg@gmail.com';
        $telnumber = '80677546389';

        $stmt->bindValue(':student_name', $name);
        $stmt->bindValue(':student_sirname', $sirname);
        $stmt->bindValue(':student_email', $email);
        $stmt->bindValue(':student_telnumber', $telnumber);
        echo '<br>'.$stmt->rowCount().'<br>';
        echo $db->lastInsertId().'<br>';
        print_r($stmt);
        return $stmt->execute();*/
    }

}