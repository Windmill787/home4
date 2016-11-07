<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 1:26
 */

namespace Vendor\Dir\config;

return array(
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news' => 'news/index',
    'products' => 'product/list',
);