<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 15:25
 */

class News
{
    public static function getNewsItemById($id)
    {
        $id = intval($id);

        if($id){

           $db = Connector::getConnection();

            $result = $db->query('SELECT student_id, 
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

}