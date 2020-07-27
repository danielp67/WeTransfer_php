<?php
require('C:\wamp64\www\TP09_wetransfer_php\controller\controller.php');

try{


        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'homePage') {
                homePage();
            }
        elseif ($_GET['action'] == 'addFile') {
                
                    if(isset($_POST['emailsender']) AND isset($_POST['pass']) AND isset($_POST['emailreceiver'])){
                        $name= $_FILES['filesend']['name'];

                        $tmp_name= $_FILES['filesend']['tmp_name'];
                        
                        $date= time();
                        $newName =$date.'_'.$name;
                        
                        $path= "C:/wamp64/www/TP09_wetransfer_php/upload/";
                       
                            if (empty($name))
                            {
                            echo "Please choose a file";
                            
                            }
                            else
                            {
                            if (move_uploaded_file($tmp_name, $path . $newName)) {
                                $zip =new ZipArchive;
                                $zipName = $date.'.zip';
                                if($zip->open($zipName, ZipArchive::CREATE)=== TRUE){
                                    
                                    $zip->addFile($path.$newName, $newName);
                                    $zip->close();
                                    rename('C:/wamp64/www/TP09_wetransfer_php/'.$zipName ,'C:/wamp64/www/TP09_wetransfer_php/upload/'.$zipName);
                                    unlink($path.$newName);
                                    echo   $zipName;
                                    echo 'Uploaded!';
                                    addFile($_POST['emailsender'], $_POST['pass'], $_POST['emailreceiver'], $zipName);
                                    } else {
                                    echo 'échec';
                                    }
                                }
                         
                            }
                            
                            }
                            
                        
                    
                    else{ // Autre exception
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
        elseif ($_GET['action'] == 'downloadFile') {
            downloadFile();

        }
        }
        else {
            homePage();
        }
    }
    catch(Exception $e) { // S'il y a eu une erreur, alors...
        echo 'Erreur : ' . $e->getMessage();
    }
    








/*

    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["filesend"]["name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

*/