<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:51
 */

use Vendor\src\models\DepartmentModel;

class DepartmentController
{
    public function actionIndex()
    {
        $List = DepartmentModel::getItemList();

        require_once (ROOT.'/views/departmentIndex.html');

        return true;
    }

    public function actionEdit($id)
    {
        if ($id){

            $fetchItem = DepartmentModel::fetchData($id, 'Department');

            $editItem = DepartmentModel::editItem($id);

            require_once (ROOT.'/views/departmentEdit.html');

        }
        return true;
    }

    public function actionAdd()
    {
        $addItem = DepartmentModel::addNewItem();

        require_once (ROOT.'/views/departmentAdd.html');

        return true;
    }

    public function actionDelete($id)
    {
        if ($id){

            $fetchItem = DepartmentModel::fetchData($id, 'Department');

            $deleteItem = DepartmentModel::deleteItem($id);

            require_once (ROOT.'/views/departmentDelete.html');

        }
        return true;
    }

}