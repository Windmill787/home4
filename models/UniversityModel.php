<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:11
 */

namespace Vendor\src\models;

use Vendor\src\connector\Connector;

class UniversityModel extends MainModel implements ModelInterface
{
    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            $edit = UniversityModel::setTable('University');

            if (isset($_POST['submit'])) {

                header('Location: ../../university');

                $db = Connector::getConnection();

                $sql = "UPDATE University SET university_name = :university_name, 
                                        university_city = :university_city, 
                                        university_site = :university_site
                                        WHERE university_id = $id";

                $stmt = $db->prepare($sql);

                $name = $_POST['university_name'];
                $city = $_POST['university_city'];
                $site = $_POST['university_site'];

                $stmt->bindValue(':university_name', $name);
                $stmt->bindValue(':university_city', $city);
                $stmt->bindValue(':university_site', $site);

                return $stmt->execute();

            }
        }

    }

    public static function getItemList()
    {
        $db = Connector::getConnection();

        $obj1 = UniversityModel::setTable('University');

        $result = $db->query("SELECT * FROM $obj1->tablename");

        $i = 0;

        $obj1->tablename = lcfirst($obj1->tablename);

        while ($row = $result->fetch(\PDO::FETCH_NUM)) {
            $obj1->dataArray[$i] = $row;
            $i++;
        }
        return $obj1;

    }

    public static function addNewItem()
    {
        $db = Connector::getConnection();

        $new = UniversityModel::setTable('University');

        if(isset($_POST['submit']))
        {
            header('Location: ../university');

            $sql = "INSERT INTO ".$new->tablename."(university_name, university_city,
            university_site) VALUES (:1, :2, :3)";

            $stmt = $db->prepare($sql);

            $execute = $stmt->execute(array(
                ':1' => $_POST[1],
                ':2' => $_POST[2],
                ':3' => $_POST[3],
            ));
            return $execute;
        }
    }

    public static function deleteItem($id)
    {
        $id = intval($id);

        $delete = UniversityModel::setTable('University');

        if($id){
            if(isset($_POST['submit'])) {
                header('Location: ../../university');

                $db = Connector::getConnection();

                $sql = "DELETE FROM $delete->tablename WHERE ".$delete->tablename.'_id='.$id;

                $result = $db->query($sql);

                return $result;
            }
        }

    }
}