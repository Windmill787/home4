<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 2:01
 */

include ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        require_once (ROOT.'/views/index.html');


        return true;
    }

    public function actionView($id)
    {
        if ($id){
            $newsItem = News::getNewsItemById($id);
            require_once (ROOT.'/views/view.html');

        }
        return true;
    }
}