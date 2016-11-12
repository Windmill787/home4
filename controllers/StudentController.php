<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 2:01
 */

include ROOT.'/models/StudentModel.php';

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

            $fetchItem = StudentModel::fetchData($id);

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

            $fetchItem = StudentModel::fetchData($id);

            $deleteItem = StudentModel::deleteItem($id);

            require_once (ROOT.'/views/delete.html');

        }
        return true;
    }

}