<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 4/15/17
 * Time: 8:51 AM
 */


$servername = "10.187.244.51";
$username = "357322_devtest03";
$password = "pUed3*#19";
$dbname = "357322_devtest03";

/**
 * try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
catch(PDOException $e)
{
echo $e->getMessage();
}*/

$arr =array($DocumentID, $StartAttachment, $EndAttachment, $PageCount, $Custodian, $FileExtension, $EmailType, $FilePath, $FileSize, $MD5Hash, $NativeFileLink,
$From, $To, $Copied, $BCC, $DateSent, $TimeSent, $DateReceived, $TimeReceived, $Subject, $AttachmentCount, $IntFilePath, $MessageID, $Author, $DateCreated,
    $TimeCreated, $DateLastModified, $TimeLastModified, $PrintedDate, $Title, $OCRText);
print_r($arr);
$handle = fopen("EXPORT.DAT", "r");
$datastr = "";
$count = 0;
    while(!feof($handle)) {
        $count = 0;
        //read char in file
        $decstr = fgetc($handle);


        //if its special do if otherwise conc char to string
        if ($decstr === "þ"){
            $decstr = fgetc($handle);
            echo "<p>choice one</p>";
        //check for full marker
            if($decstr === "þ") {
                $count++;
                echo $count."<p>choice two</p>";

                if ($count === 30) {
                    echo "<p>choice 3</p>";
                    $count = 0;
                    /**
                     *
                     * try {
                     * $sql = "INSERT INTO DocumentInformation(DocumentID, StartAttachment, EndAttachment, PageCount, Custodian, FileExtension, EmailType, FilePath,
                        FileSize, MD5Hash, NativeFileLink, 'From', 'To', Copied, BCC, DateSent, TimeSent, DateReceived, TimeReceived, Subject, 
                        AttachmentCount, IntFilePath, MessageID, Author, DateCreated, TimeCreated, DateLastModified, TimeLastModified, PrintedDate, Title, OCRText)
                        VALUE($DocumentID, $StartAttachment, $EndAttachment, $PageCount, $Custodian, $FileExtension, $EmailType, $FilePath, $FileSize, $MD5Hash, $NativeFileLink,
                              $From, $To, $Copied, $BCC, $DateSent, $TimeSent, $DateReceived, $TimeReceived, $Subject, $AttachmentCount, $IntFilePath, $MessageID, $Author, $DateCreated,
                              $TimeCreated, $DateLastModified, $TimeLastModified, $PrintedDate, $Title, $OCRText)";

                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Records deleted successfully";
                    }
                    catch(PDOException $e)
                    {
                    echo $sql . "<br>" . $e->getMessage();
                    }

                    


                     */
                    print_r($arr);
                    $arr[$count] = $datastr;
                } else {
                    $arr[$count] = $datastr;
                    echo $arr[$count]."<p>choice 4 </p>";
                }
            }else{
                $decstr = fgetc($handle);
                $datastr .= $decstr;
                echo "<p>choice 5</p>";
            }

        } else {
            $datastr .= $decstr;
            echo "<br>".$datastr."<br>";
            echo "<p> choice 6</p>";

        }




}

fclose($handle);
?>