<?php
require_once('C:\wamp64\www\TP09_wetransfer_php\model\model.php');



function addFile($emailsender, $password, $emailreceiver, $zipName){

    $addFile = postFile($emailsender, $password, $emailreceiver, $zipName);
    $viewFile = viewFile();
    //$sendMail=sendMail($emailsender, $password, $emailreceiver);

    require('C:\wamp64\www\TP09_wetransfer_php\view\uploadView.php');

}

function homePage(){

    $viewFile = viewFile();

    require('C:\wamp64\www\TP09_wetransfer_php\view\uploadView.php');
}



function downloadFile(){
    $downloadFile = getFile();

    require('C:\wamp64\www\TP09_wetransfer_php\view\downloadView.php');
}