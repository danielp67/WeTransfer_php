<?php
require_once('C:\wamp64\www\TP09_wetransfer_php\model\model.php');



function addFile($emailsender, $password){

    $addFile= postFile($emailsender, $password);
    $viewFile=viewFile();

    require('C:\wamp64\www\TP09_wetransfer_php\view\view.php');

}

function homePage(){

    $viewFile=viewFile();

    require('C:\wamp64\www\TP09_wetransfer_php\view\view.php');
}
