<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:11
 */
class UniversityModel extends \Vendor\src\parameters\ModelParameters
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

    public static function fetchData($id)
    {
        $id = intval($id);

        if($id) {

            $db = Connector::getConnection();

            $fetch = UniversityModel::setTable('University');

            $sql = $db->query("SELECT * FROM $fetch->tablename WHERE ".lcfirst($fetch->tablename)."_id=$id");

            $fetch->dataArray = $sql->fetch(\PDO::FETCH_NUM);

            return $fetch;

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

        $new->columns = UniversityModel::getColumns($new->tablename);

        if(isset($_POST['submit']))
        {
            header('Location: ../university');

            $sql = "INSERT INTO ".$new->tablename."(".$new->columns.") VALUES 
                    (NULL, :1, :2, :3)";

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

    public static function setTable($tablename){

        $tableobject = new UniversityModel();

        $tableobject->tablename = $tablename;

        return $tableobject;

    }

    public static function getColumns($tablename){

        $db = Connector::getConnection();

        $columns = $db->query("SHOW COLUMNS FROM $tablename");

        $columns = $columns->fetchAll(\PDO::FETCH_NUM);

        $obj = new UniversityModel();

        foreach ($columns as $item)
        {
            $obj->columns .= $item[0].', ';

        }
        $obj->columns = substr($obj->columns, 0, -2);

        return $obj->columns;
    }

}