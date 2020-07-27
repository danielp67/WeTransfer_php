<?php
require('C:\wamp64\www\TP09_wetransfer_php\controller\controller.php');

try{


        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'homePage') {
                homePage();
            }
        elseif ($_GET['action'] == 'addFile') {
                
                    if(isset($_POST['emailsender']) AND isset($_POST['pass'])){
                        addFile($_POST['emailsender'], $_POST['pass']);
                    }
                    else{ // Autre exception
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }

        }
        else {
            homePage();
        }
    }
    catch(Exception $e) { // S'il y a eu une erreur, alors...
        echo 'Erreur : ' . $e->getMessage();
    }
    