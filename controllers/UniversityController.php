<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:11
 */

use Vendor\src\models\UniversityModel;

class UniversityController
{
    public function actionIndex()
    {
        $List = UniversityModel::getItemList();

        require_once (ROOT.'/views/universityIndex.html');

        return true;
    }

    public function actionEdit($id)
    {
        if ($id){

            $fetchItem = UniversityModel::fetchData($id, 'University');

            $editItem = UniversityModel::editItem($id);

            require_once (ROOT.'/views/universityEdit.html');

        }
        return true;
    }

    public function actionAdd()
    {
        $addItem = UniversityModel::addNewItem();

        require_once (ROOT.'/views/universityAdd.html');

        return true;
    }

    public function actionDelete($id)
    {
        if ($id){

            $fetchItem = UniversityModel::fetchData($id, 'University');

            $deleteItem = UniversityModel::deleteItem($id);

            require_once (ROOT.'/views/universityDelete.html');

        }
        return true;
    }

}