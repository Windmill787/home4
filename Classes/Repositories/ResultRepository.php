<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 23:52
 */

namespace Vendor\Dir\Repositories;

class ResultRepository
{
    public function getAll()
    {
        $query = 'SELECT * FROM University';

        $data = mysqli_query(Connector::connectDatabase(),$query);

        $result = mysqli_fetch_array($data);

        /*$results[] = [
            'id' => $results['university_id'],
            'name' => $results['university_name'],
            'city' => $results['university_city'],
            'site' => $results['university_site']
        ];*/
        return $result;
    }
}