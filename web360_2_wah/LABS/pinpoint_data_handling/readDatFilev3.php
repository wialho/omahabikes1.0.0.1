
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/15/17
 * Time: 3:00 PM
 */

<?php

$servername = "https://mysql.ord1-1.websitesettings.com/?server=mariadb-140.wc1";
$username = "357322_devtest03";
$password = "pUed3*#19";
$dbname = "357322_devtest03";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $fileName = "EXPORT.DAT";
    $query = <<<eof
     LOAD DATA INFILE '$fileName'
     INTO TABLE DocumentInformation
     FIELDS TERMINATED BY 'þþ' OPTIONALLY ENCLOSED BY 'þ'
     LINES TERMINATED BY '\n'
    
eof;

    $db->query($query);
}catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>