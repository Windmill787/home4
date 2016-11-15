<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.11.16
 * Time: 18:57
 */
class DepartmentModel extends \Vendor\src\parameters\ModelParameters
{
    public static function editItem($id)
    {
        $id = intval($id);

        if($id){

            $edit = DepartmentModel::setTable('Department');

            if (isset($_POST['submit'])) {

                header('Location: ../../department');

                $db = Connector::getConnection();

                $sql = "UPDATE Department SET department_name = :department_name, 
                                        university_id = :university_id
                                        WHERE department_id = $id";

                $stmt = $db->prepare($sql);

                $name = $_POST['department_name'];
                $id = $_POST['university_id'];

                $stmt->bindValue(':department_name', $name);
                $stmt->bindValue(':university_id', $id);

                return $stmt->execute();

            }
        }

    }

    public static function fetchData($id)
    {
        $id = intval($id);

        if($id) {

            $db = Connector::getConnection();

            $fetch = DepartmentModel::setTable('Department');

            $sql = $db->query("SELECT * FROM $fetch->tablename WHERE ".lcfirst($fetch->tablename)."_id=$id");

            $fetch->dataArray = $sql->fetch(\PDO::FETCH_NUM);

            return $fetch;

        }

    }

    public static function getItemList()
    {
        $db = Connector::getConnection();

        $obj1 = DepartmentModel::setTable('Department');

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

        $new = DepartmentModel::setTable('Department');

        $new->columns = DepartmentModel::getColumns($new->tablename);

        if(isset($_POST['submit']))
        {
            header('Location: ../department');

            $sql = "INSERT INTO ".$new->tablename."(".$new->columns.") VALUES 
                    (NULL, :1, :2)";

            $stmt = $db->prepare($sql);

            $execute = $stmt->execute(array(
                ':1' => $_POST[1],
                ':2' => $_POST[2]
            ));
            return $execute;
        }
    }

    public static function deleteItem($id)
    {
        $id = intval($id);

        $delete = DepartmentModel::setTable('Department');

        if($id){
            if(isset($_POST['submit'])) {
                header('Location: ../../department');

                $db = Connector::getConnection();

                $sql = "DELETE FROM $delete->tablename WHERE ".$delete->tablename.'_id='.$id;

                $result = $db->query($sql);

                return $result;
            }
        }

    }

    public static function setTable($tablename){

        $tableobject = new DepartmentModel();

        $tableobject->tablename = $tablename;

        return $tableobject;

    }

    public static function getColumns($tablename){

        $db = Connector::getConnection();

        $columns = $db->query("SHOW COLUMNS FROM $tablename");

        $columns = $columns->fetchAll(\PDO::FETCH_NUM);

        $obj = new DepartmentModel();

        foreach ($columns as $item)
        {
            $obj->columns .= $item[0].', ';

        }
        $obj->columns = substr($obj->columns, 0, -2);

        return $obj->columns;
    }

}