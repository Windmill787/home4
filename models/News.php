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

            $result = $db->query('SELECT * FROM University WHERE university_id='.$id);

            $result ->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    public static function getNewsList()
    {
        $db = Connector::getConnection();

        $newsList = array();

        $result = $db->query('SELECT * FROM University');

        $i=0;

        while ($row = $result->fetch()){
            $newsList[$i]['university_id'] = $row['university_id'];
            $newsList[$i]['university_name'] = $row['university_name'];
            $newsList[$i]['university_city'] = $row['university_city'];
            $newsList[$i]['university_site'] = $row['university_site'];
            $i++;
        }
        return $newsList;

    }

}