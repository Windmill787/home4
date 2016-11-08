<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 2:01
 */

include ROOT.'/models/MainModel.php';

class MainController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = MainModel::getNewsList();

        require_once (ROOT.'/views/index.html');


        return true;
    }

    public function actionEdit($id)
    {
        if ($id){
            $newsItem = MainModel::getNewsItemById($id);

            require_once (ROOT.'/views/view.html');

        }
        return true;
    }

    public function actionAdd()
    {
        $addItem = MainModel::addNewItem();

        require_once (ROOT.'/views/add.html');

        return true;
    }

    /*public function actionDelete($id)
    {
        if ($id){
            $deleteItem = News::deleteItem($id);
            require_once (ROOT.'/views/index.html');

        }
        return true;
    }*/

}