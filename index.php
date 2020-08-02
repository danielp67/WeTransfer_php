<?php
require('C:\wamp64\www\TP09_wetransfer_php\controller\controller.php');

try{


        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'homePage') {
                homePage();
               
            }
        elseif ($_GET['action'] == 'addFile') {
                    if(!empty($_POST['emailsender']) && !empty($_POST['pass']) && !empty($_POST['emailreceiver'])){
                        
                        $emailsender=htmlspecialchars($_POST['emailsender']);
                        $password=htmlspecialchars($_POST['pass']);
                        $emailreceiver=htmlspecialchars($_POST['emailreceiver']);
                        
                        $countfiles =0;
                        $countfiles = count($_FILES['filesend']['name']);
                        $sizefiles =0;
                        $date= time();
                        $name = bin2hex(random_bytes(5));
                        $path= "C:/wamp64/www/TP09_wetransfer_php/upload/";
                        

                        for($i=0;$i<$countfiles;$i++){
                            $sizefiles += $_FILES['filesend']['size'][$i];
                        }

                            if($sizefiles>0 && $sizefiles<2000000)
                            {
                                $zip =new ZipArchive;
                                $zipName = $name.'.zip';
                                if($zip->open($zipName, ZipArchive::CREATE)=== TRUE){

                                   
                                    for($i=0;$i<$countfiles;$i++){
                                    
                                    $filename[$i]= $_FILES['filesend']['name'][$i];
                                    $tmp_name= $_FILES['filesend']['tmp_name'][$i];
                                    $sizefiles += $_FILES['filesend']['size'][$i];
                                    
                                    // Upload file
                                    move_uploaded_file($tmp_name, $path . $filename[$i]);
                                    $zip->addFile($path.$filename[$i], $filename[$i]);
                                    
                          
                                }                     
                                   
                                    $zip->close();

                                    for($i=0;$i<$countfiles;$i++){
                                    unlink($path.$filename[$i]);
                                    }

                                    rename('C:/wamp64/www/TP09_wetransfer_php/'.$zipName ,'C:/wamp64/www/TP09_wetransfer_php/upload/'.$zipName);
                                    $zipSize = filesize('C:/wamp64/www/TP09_wetransfer_php/upload/'.$zipName);

                                    addFile($emailsender, $password, $emailreceiver, $name, $zipSize, $countfiles);

                                    } 
                                    else {

                                        throw new Exception( "Error on adding files");
                            
                                    }
                            }
                            else
                            {
                                throw new Exception( "Please choose a file");
                            
                            }
                         
                    }
                    
                    else{ // Autre exception
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
        }


        elseif ($_GET['action'] == 'getFile') {
            if(isset($_GET['zip_name'])){
                 getFile($_GET['zip_name']);
                }
            else{
                throw new Exception("Zip Id missing");
                            
            }
        
        }

        elseif ($_GET['action'] == 'downloadFile') {
            if(!empty($_POST['pass']) AND !empty($_POST['emailreceiver'])){
                
                $checkFile=checkFile($_GET['zip_name']);
                $pass=htmlspecialchars($_POST['pass']);
                $emailreceiver=htmlspecialchars($_POST['emailreceiver']);
                $pass_co_hash=password_verify($pass,$checkFile['pass']);
                
                if( $pass_co_hash AND  $checkFile['emailreceiver'] == $emailreceiver){
                    
                    finaleView($checkFile,$_GET['zip_name']);
                    //downloadFile($_GET['zip_name']);
                   
                 }

               else{
                   throw new Exception("email or password incorrect");
                               
               }
               
            }


            else{
                throw new Exception("Some Id missing");
                            
            }
        }

        elseif ($_GET['action'] == 'searchFile') {
            $searchFile=searchFile();
                // $listDeleteFile=deleteOldFile();
            
              //  $deleteFile=deleteFile($_GET['zip_name']);
               // unlink('C:/wamp64/www/TP09_wetransfer_php/upload/'.$_GET['zip_name']);

        }


    }
        else {
            homePage();
            $listDeleteFile=deleteOldFile();
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