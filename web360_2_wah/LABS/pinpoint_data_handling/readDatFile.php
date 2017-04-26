<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/14/17
 * Time: 8:34 AM
 */   


$row = 0;
$datatwo = [];
if (($handle = fopen("EXPORT.DAT", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, "/n")) !== FALSE) {


        $num = count($data);
        //echo explode("þ", $data[1]);

        //echo "<p> $num fields in line $row: <br /></p>";
        $row++;

        for ($c = 0; $c < 4; $c++) {
            $datatwo = explode("þ", $data[$c]);
            //var_dump($datatwo);
            //array_push($data, $datatwo);
            //break;
            //echo $data[$c]."";

        }

    }
    fclose($handle);

    var_dump($datatwo);

    /**$sql = "INSERT INTO unknowntable (DocumentID, StartAttachment, EndAttachment, PageCount, Custodian, FileExtension, EmailType, FilePath, FileSize, MD5Hash, NativeFileLink, From, To, Copied, BCC, DateSent, TimeSent, DateReceived, TimeReceived, Subject, AttachmentCount, IntFilePath, MessageID, Author, DateCreated, TimeCreated, DateLastModified, TimeLastModified, PrintedDate, Title, OCRText)
     * VALUES ($data[$c])";*/
}
?>
