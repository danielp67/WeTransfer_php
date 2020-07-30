<?php
require_once('C:\wamp64\www\TP09_wetransfer_php\model\model.php');
require_once('C:\wamp64\www\TP09_wetransfer_php\model\MailManager.php');


function addFile($emailsender, $password, $emailreceiver, $zipName, $zipSize, $countfiles){
    $pass_hash=password_hash($password, PASSWORD_DEFAULT);
    $addFile = postFile($emailsender, $pass_hash, $emailreceiver, $zipName, $zipSize, $countfiles, $_POST['content']);
    $viewFile = fileSend($zipName);
    //$sendMailToReceiver=sendMailToReceiver($emailsender, $password, $emailreceiver, $zipName);
    //$sendMailToSender=sendMailToSender($emailsender, $password, $emailreceiver, $zipName);
    require('C:\wamp64\www\TP09_wetransfer_php\view\uploadView.php');

}

function homePage(){

    require('C:\wamp64\www\TP09_wetransfer_php\view\uploadView.php');
}



function getFile($zipName){
    $getFile = fileSend($zipName);

    require('C:\wamp64\www\TP09_wetransfer_php\view\downloadView.php');
    return  $getFile;
}


function checkFile($zipName){
    $getFile = fileSend($zipName);
    
    return  $getFile;
}


function downloadFile($zipName){
    $path= "/TP09_wetransfer_php/upload/";
    $downloadFile = $path.$zipName;
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Location: '.$downloadFile);
    //header('Content-Disposition: attachment; filename="'.basename($zipName).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($zipName));
    //readfile($zipName);
    //header('Location: '.$downloadFile);
}


function finaleView($checkFile,$zipName){
    $path= "/TP09_wetransfer_php/upload/";
    $downloadFile = $path.$zipName;
    $status=true;
  //sendMailToRemove($checkFile['emailsender'], $checkFile['emailreceiver'],$zipName);
   require('C:\wamp64\www\TP09_wetransfer_php\view\downloadView.php');
}



function deleteFile($zipName){
    $deleteFile=fileDelete($zipName);
    $status=true;
    $delete=true;
    require('C:\wamp64\www\TP09_wetransfer_php\view\downloadView.php');
}