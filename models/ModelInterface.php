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
     * @param int $id
     *
     * @return object
     */
    public static function editItem($id);

    /**
     * @return object
     */
    public static function getItemList();

    /**
     * @return mixed
     */
    public static function addNewItem();

    /**
     * @param int $id
     *
     * @return mixed
     */
    public static function deleteItem($id);

}