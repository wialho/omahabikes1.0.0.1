<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/18/17
 * Time: 5:29 PM
 */

$datatwo;
$row = 0;
if (($handle = fopen("EXPORT.DAT", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, "/n")) !== FALSE) {


        $datatwo .= $data;
        //$num = count($data);
        //$datatwo = preg_split("/[þ]/", $data[1]);
        //echo $data[1];
        //var_dump($datatwo);
        //echo "<p> $num fields in line $row: <br /></p>";
        //$row++;
        /**for ($c = 0; $c < 4; $c++) {
            $datatwo = preg_split("/[þ]/", $data[c]);
            echo print_r($datatwo[$c]); }*/



    }
    var_dump($datatwo);
    fclose($handle);
    /**$sql = "INSERT INTO unknowntable (DocumentID, StartAttachment, EndAttachment, PageCount, Custodian, FileExtension, EmailType, FilePath, FileSize, MD5Hash, NativeFileLink, From, To, Copied, BCC, DateSent, TimeSent, DateReceived, TimeReceived, Subject, AttachmentCount, IntFilePath, MessageID, Author, DateCreated, TimeCreated, DateLastModified, TimeLastModified, PrintedDate, Title, OCRText)
     * VALUES ($data[$c])";*/
}
?>
