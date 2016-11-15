<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 22:49
 */

namespace Vendor\src\models;


interface ModelInterface
{
    /**
     * @param var $id
     *
     * @return object
     */
    public static function editItem($id);

    public static function getItemList();

    public static function addNewItem();

    public static function deleteItem($id);

}