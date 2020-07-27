<?php
require_once('C:\wamp64\www\TP09_wetransfer_php\model\model.php');



function addFile($emailsender, $password, $emailreceiver){

    $addFile = postFile($emailsender, $password, $emailreceiver);
    $viewFile = viewFile();
    //$sendMail=sendMail($emailsender, $password, $emailreceiver);

    require('C:\wamp64\www\TP09_wetransfer_php\view\view.php');

}

function homePage(){

    $viewFile = viewFile();

    require('C:\wamp64\www\TP09_wetransfer_php\view\view.php');
}
