<?php

require __DIR__.'/vendor/autoload.php';

use App\Controller\HomeController;

try{
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'home') {

                $controller = new HomeController();
                $controller->homePage();
            }
        elseif ($_GET['action'] == 'addFile') {
                    if(!empty($_POST['emailsender']) && !empty($_POST['pass']) && !empty($_POST['emailreceiver'])){

                        $controller = new HomeController();
                        $controller->addFile($_FILES, $_POST);
                    }
                    else{ // Autre exception
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
        }

        elseif ($_GET['action'] == 'getFile') {
            if(isset($_GET['zip_name'])){
                $controller = new HomeController();

                $controller->getFile($_GET['zip_name']);
                }
            else{
                throw new Exception("Zip Id missing");
            }
        }

        elseif ($_GET['action'] == 'downloadFile') {
            if(!empty($_POST['pass']) AND !empty($_POST['emailreceiver'])){
                $controller = new HomeController();

                $checkFile=$controller->checkFile($_GET['zip_name']);
                $pass=htmlspecialchars($_POST['pass']);
                $emailreceiver=htmlspecialchars($_POST['emailreceiver']);
                $pass_co_hash=password_verify($pass,$checkFile['pass']);
                
                if( $pass_co_hash AND  $checkFile['emailreceiver'] == $emailreceiver){
                    $controller = new HomeController();
                  //  $controller->downloadFile($_GET['zip_name']);
                    $controller->finaleView($_GET['zip_name']);
                 }

               else{
                   throw new Exception("email or password incorrect");
                               
               }
            }

            else{
                throw new Exception("Some Id missing");
                            
            }
        }
    }
        else {
            $controller = new HomeController();
            $controller->homePage();
            $listDeleteFile=$controller->deleteOldFile();
        }
                
    }
    catch(Exception $e) { // S'il y a eu une erreur, alors...
        echo 'Erreur : ' . $e->getMessage();
    }
