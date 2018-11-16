<?php
if($_GET['type']=='prod'){
    $target_dir = "../assets/img/products/";
}elseif ($_GET['type']=='img') {
    $target_dir = "../assets/img/billeder/";
}elseif ($_GET['type']=='skimmelsvamp') {
    $target_dir = "../assets/img/skimmelsvamp/";
}elseif ($_GET['type']=='slide') {
    $target_dir = "../assets/img/slider/";
}

$temp = explode(".", $_FILES["fileToUpload"]["name"]);

$newfilename = round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $newfilename/*$target_dir . basename($_FILES["fileToUpload"]["name"])*/;
//print_r($newfilename);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" ) {
    //echo $imageFileType."<br><br>";
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //echo $aJson;
        if($_GET['type']=='prod'){
            $sJson = file_get_contents('json_files/produkter.json');
            $produkter = json_decode($sJson, true);

            $newProd = array('title' => $_POST['title'], 'type' => $_POST['type'], 'desc' => $_POST['desc'], 'img' => $newfilename, 'price' => $_POST['price']);

            array_push($produkter, $newProd);

            $aJson = json_encode($produkter);

            $open = fopen("json_files/produkter.json","w+"); 
            $text = $aJson; 
            fwrite($open, $text); 
            fclose($open);
            header("Refresh:0;url=../index.php?from=koebOgSalg");
            

        }elseif ($_GET['type']=='img') {
            $sJson = file_get_contents('json_files/billeder.json');
            $billeder = json_decode($sJson, true);

            $newImg = array('title' => $_POST['title'], 'type' => $_POST['type'], 'desc' => $_POST['desc'], 'img' => $newfilename);

            array_push($billeder, $newImg);

            $aJson = json_encode($billeder);

            $open = fopen("json_files/billeder.json","w+"); 
            $text = $aJson; 
            fwrite($open, $text); 
            fclose($open);
            header("Refresh:0;url=../index.php?from=billeder");
        

        }elseif ($_GET['type']=='skimmelsvamp') {
            $sJson = file_get_contents('json_files/skimmelsvamp.json');
            $billeder = json_decode($sJson, true);

            $newImg = array('title' => $_POST['title'], 'type' => $_POST['type'], 'desc' => $_POST['desc'], 'img' => $newfilename);

            array_push($billeder, $newImg);

            $aJson = json_encode($billeder);

            $open = fopen("json_files/skimmelsvamp.json","w+"); 
            $text = $aJson; 
            fwrite($open, $text); 
            fclose($open);
            header("Refresh:0;url=../index.php?from=skimmelsvamp");
        

        }elseif ($_GET['type']=='slide') {
            $sJson = file_get_contents('json_files/slides.json');
            $billeder = json_decode($sJson, true);

            $newImg = array('name' => 's'.(count($billeder)+1), 'title' => $_POST['title'], 'type' => $_POST['type'], 'desc' => $_POST['desc'], 'img' => $newfilename);

            array_push($billeder, $newImg);

            $aJson = json_encode($billeder);

            $open = fopen("json_files/slides.json","w+"); 
            $text = $aJson; 
            fwrite($open, $text); 
            fclose($open);
            header("Refresh:0;url=slide_editor.php");
        }
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}


?>