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
        $List = MainModel::getItemList();

        require_once (ROOT.'/views/index.html');


        return true;
    }

    public function actionEdit($id)
    {
        if ($id){

            $fetchItem = MainModel::fetchData($id);

            $editItem = MainModel::editItem($id);

            require_once (ROOT.'/views/edit.html');

        }
        return true;
    }

    public function actionAdd()
    {
        $addItem = MainModel::addNewItem();

        require_once (ROOT.'/views/add.html');

        return true;
    }

    public function actionDelete($id)
    {
        if ($id){

            $fetchItem = MainModel::fetchData($id);
            $deleteItem = MainModel::deleteItem($id);
            require_once (ROOT.'/views/delete.html');

        }
        return true;
    }

}