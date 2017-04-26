<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/14/17
 * Time: 8:34 AM
 */
mb_internal_encoding("utf-8");

$servername = "10.187.244.51";
$username = "wialho_devtest03";
$password = "pUed3*#19";
$dbname = "357322_devtest03";

$row = 0;
$datatwo = [];
$filecontents = "";
if (($handle = fopen("EXPORT.DAT", "r")) !== FALSE) {
    $filecontents = file_get_contents("EXPORT.DAT");
    $datatwo = preg_split("/[\n]+/", $filecontents);
    fclose($handle);
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

for($c = 1; $c < count($datatwo); $c++) {
    $datathree = (explode("þ", $datatwo[$c]));
    $even = range(0, count($datathree), 2);
    foreach ($even as $i) {
        unset($datathree[$i]);
    }
    $datathree = array_values($datathree);

   try {
        $sql = "INSERT INTO DocumentInformation(DocumentID, StartAttachment, EndAttachment, PageCount, Custodian, FileExtension, EmailType, FilePath,
                        FileSize, MD5Hash, NativeFileLink, FromPerson, ToPerson, Copied, BCC, DateSent, TimeSent, DateReceived, TimeReceived, Subject, 
                        AttachmentCount, IntFilePath, MessageID, Author, DateCreated, TimeCreated, DateLastModified, TimeLastModified, PrintedDate, Title, OCRText)
                        VALUE($datathree[0], $datathree[1], $datathree[2], $datathree[3], $datathree[4],$datathree[6],$datathree[7],$datathree[8],
                        $datathree[9],$datathree[10],$datathree[11],$datathree[12],$datathree[13],$datathree[14],$datathree[15],$datathree[16],$datathree[17],
                        $datathree[18],$datathree[19],$datathree[20],$datathree[21],$datathree[22],$datathree[23],$datathree[24],$datathree[25],$datathree[26],$datathree[27],
                        $datathree[28],$datathree[29],$datathree[30])";


        $conn->exec($sql);
        echo "Records added successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
//([þ])(?:(?=(\\?))\2.)*?\1
}
?>
