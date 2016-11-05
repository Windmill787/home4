<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 22:00
 */

namespace Vendor\Dir\Repositories;

class Connector
{
    static public function connectDatabase()
    {
        $link = mysqli_connect("localhost", "vieweruser", "12345", "home4");
        return $link;
    }
}