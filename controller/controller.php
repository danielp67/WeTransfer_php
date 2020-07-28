<?php
require_once('C:\wamp64\www\TP09_wetransfer_php\model\model.php');



function addFile($emailsender, $password, $emailreceiver, $zipname){

    $addFile = postFile($emailsender, $password, $emailreceiver, $zipname);
    $viewFile = viewFile();
    $sendMailToReceiver=sendMailToReceiver($emailsender, $password, $emailreceiver, $zipname);
    //$sendMailToSender=sendMailToSender($emailsender, $password, $emailreceiver, $zipname);
    require('C:\wamp64\www\TP09_wetransfer_php\view\uploadView.php');

}

function homePage(){

    $viewFile = viewFile();

    require('C:\wamp64\www\TP09_wetransfer_php\view\uploadView.php');
}



function getFile($zipname){
    $getFile = fileSend($zipname);

    require('C:\wamp64\www\TP09_wetransfer_php\view\downloadView.php');
    return  $getFile;
}


function checkFile($zipname){
    $getFile = fileSend($zipname);

    return  $getFile;
}


function downloadFile($zipname){
    $path= "/TP09_wetransfer_php/upload/";
    $downloadFile = $path.$zipname;
   // header("Content-Disposition: attachment; filename=\"" . basename($downloadFile) . "\"");
    require('C:\wamp64\www\TP09_wetransfer_php\view\finaleView.php');
   
    header('Location: '.$downloadFile);
   
    return true;
}


function finaleView($zipname){
    $path= "/TP09_wetransfer_php/upload/";
    $downloadFile = $path.$zipname;
  //  header("Content-Disposition: attachment; filename=\"" . basename($downloadFile) . "\"");
  //  require('C:\wamp64\www\TP09_wetransfer_php\view\finaleView.php');
  //  header("Content-Disposition: attachment; filename=\"" . basename($downloadFile) . "\"");
}