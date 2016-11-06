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
/*$db = mysqli_connect('mysql_host', 'mysql_user', 'mysql_password', 'mydatabase')
or die('Error: ' . mysql_error());
$sql = 'SELECT * FROM students';
$result = mysqli_query($db, $sql);
// or
$stmt = mysqli_prepare($db, $sql);


$query = "INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)";
$stmt = mysqli_prepare($db, $query);
$val1 = 'Stuttgart';
$val2 = 'DEU';
$val3 = 'Baden-Wuerttemberg';


mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);

$res = mysqli_stmt_execute($stmt);
while ($row = mysqli_fetch_row($result)) {
printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
}
mysqli_free_result($result);
mysqli_close($db);*/

    public function getAll($table)
    {
        $query = 'SELECT * FROM '.$table.' order by university_id';
        $connect = new Connector();
        $result = $connect->useQuery($query);
        return $this->echoAll($result);
    }

    public function echoAll($result)
    {
        while ($row = mysqli_fetch_row($result)) {
            printf("%s %s %s %s\n",
                $row[0], $row[1], $row[2],  $row[3]);
            echo "<br>";
        }
    }
}