<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 2:01
 */

namespace Vendor\Dir\Controllers;


class NewsController
{
    public function actionIndex()
    {
        echo 'News action';
        return true;

    }

    public function actionView($params)
    {
        echo $params[0];
        echo $params[1];
        echo $params[2];
        return true;

    }
}