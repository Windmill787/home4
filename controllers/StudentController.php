<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:00
 */

use Vendor\src\models\StudentModel;

class StudentController
{
    public function actionIndex()
    {
        $List = StudentModel::getItemList();

        require_once (ROOT.'/views/index.html');

        return true;
    }

    public function actionEdit($id)
    {
        if ($id){

            $fetchItem = StudentModel::fetchData($id, 'Student');

            $editItem = StudentModel::editItem($id);

            require_once (ROOT.'/views/edit.html');

        }
        return true;
    }

    public function actionAdd()
    {
        $addItem = StudentModel::addNewItem();

        require_once (ROOT.'/views/add.html');

        return true;
    }

    public function actionDelete($id)
    {
        if ($id){

            $fetchItem = StudentModel::fetchData($id, 'Student');

            $deleteItem = StudentModel::deleteItem($id);

            require_once (ROOT.'/views/delete.html');

        }
        return true;
    }

}