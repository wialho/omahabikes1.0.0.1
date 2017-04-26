<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/16/17
 * Time: 11:12 AM
 */

echo '<table style="border: solid 1px black;">
    <tr>
        <th>Document ID</th>
        <th>Start Attachment</th>
        <th>End Attachment</th>
        <th>Page Count</th>
        <th>Custodian</th>
        <th>File Extension</th>
        <th>Email Type</th>
        <th>File Path</th>
        <th>File Size</th>
        <th>MD5 Hash</th>
        <th>Native File Link</th>
        <th>From</th>
        <th>To</th>
        <th>Copied</th>
        <th>BCC</th>
        <th>Date Sent</th>
        <th>Time Sent</th>
        <th>Date Received</th>
        <th>Time Received</th>
        <th>Subject</th>
        <th>Attachment Count</th>
        <th>Int File Path</th>
        <th>Message ID</th>
        <th>Author</th>
        <th>Author</th>
        <th>Date Created</th>
        <th>Time Created</th>
        <th>Date Last Modified</th>
        <th>Time Last Modified</th>
        <th>Printed Date</th>
        <th>Title</th>
        <th>OCR Text</th>
    </tr>';

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
$servername = "10.187.244.51";
$username = "wialho_devtest03";
$password = "pUed3*#19";
$dbname = "357322_devtest03";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM DocumentInformation");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

