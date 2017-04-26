<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/16/17
 * Time: 11:27 AM
 */

$servername = "10.187.244.51";
$username = "wialho_devtest03";
$password = "pUed3*#19";
$dbname = "357322_devtest03";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE * FROM DocumentInformation";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Records deleted successfully";
}
catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>