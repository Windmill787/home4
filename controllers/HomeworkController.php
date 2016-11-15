<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 19:26
 */

use Vendor\src\models\HomeworkModel;

class HomeworkController
{
    public function actionIndex()
    {
        $List = HomeworkModel::getItemList();

        require_once (ROOT.'/views/homeworkIndex.html');

        return true;
    }

    public function actionEdit($id)
    {
        if ($id){

            $fetchItem = HomeworkModel::fetchData($id, 'Homework');

            $editItem = HomeworkModel::editItem($id);

            require_once (ROOT.'/views/homeworkEdit.html');

        }
        return true;
    }

    public function actionAdd()
    {
        $addItem = HomeworkModel::addNewItem();

        require_once (ROOT.'/views/homeworkAdd.html');

        return true;
    }

    public function actionDelete($id)
    {
        if ($id){

            $fetchItem = HomeworkModel::fetchData($id, 'Homework');

            $deleteItem = HomeworkModel::deleteItem($id);

            require_once (ROOT.'/views/homeworkDelete.html');

        }
        return true;
    }

}