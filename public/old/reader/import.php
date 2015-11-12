<!DOCTYPE html>
<html>
<body>

<form action="import.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>




<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 6/24/2015
 * Time: 12:32 PM
 */
 // If you need to parse XLS files, include php-excel-reader

if($_POST){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["submit"])) {
        echo 'uploaded successfully';
    }






    require('php-excel-reader/excel_reader2.php');
    require('rb.php');
    R::setup( 'mysql:host=localhost;dbname=que','root', 'PmpwyE9tII');
    require('SpreadsheetReader.php');

    $Reader = new SpreadsheetReader($target_file);

    $i = -1;
    foreach ($Reader as $row)
    {
            if($row[1] == '' || $row[1] == null || $row[1] == 'שם לקוח'){

            }else {
                $exist = R::getRow('SELECT * FROM guests WHERE phone = 0'.$row[2]);
                if($exist['id'] > 0){
                    $book = R::load( 'guests', $exist['id'] );
                   
                    $book->name = $row[1];
                    $book->city = $row[7];
                    $id = R::store($book);
                }else{


                    $givenDate = explode('/', $row[6]);

                    $dayToCome = $givenDate[2] . '-' . $givenDate[1] . '-' . $givenDate[0];

                    $item = R::dispense('guests');

                    $item->manager = $row[0];
                    $item->name = $row[1];
                    $item->phone = '0' . $row[2];
                    $item->status = 'לא הגיע';
                    $item->is_inside = 0;
                    $item->city = $row[7];
                    $item->dayToCome = $dayToCome;

                    $item->externalID = $row[5];
                    $id = R::store($item);
                }
            }

    }
}