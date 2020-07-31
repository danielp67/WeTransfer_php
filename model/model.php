<?php

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


function postFile($emailsender, $password, $emailreceiver, $zipName, $zipSize, $countfiles, $content)
{
    $db = dbConnect();
    $fileTransfer = $db->prepare('INSERT INTO filetransfer (emailsender, pass, emailreceiver, zip_name, zip_size, file_number, content, date_creation) VALUES(?,?,?,?,?,?,?, NOW())');
    $affectedLines = $fileTransfer->execute(array($emailsender, $password, $emailreceiver, $zipName, $zipSize, $countfiles, $content));

    return $affectedLines;
}



function fileSend($zipname){
    $db = dbConnect();
    $filesend = $db->prepare('SELECT id, emailsender, pass, emailreceiver, zip_name, zip_size, file_number, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM filetransfer  WHERE zip_name = ?');
        $filesend->execute(array($zipname));
        $send = $filesend->fetch();

        return $send;
}


function fileStatus($zipname){
    $db = dbConnect();
    $fileStatus = $db->prepare('UPDATE  filetransfer SET file_status = 1 WHERE zip_name = ?');
    $fileStatus->execute(array($zipname ));

        return $fileStatus;
}


function fileDeleteByDate(){
    $db = dbConnect();
    $zip = 1;
    $filedelete = $db->query('SELECT zip_name FROM filetransfer WHERE date_creation < CURDATE()-7 ');
    
    $listFileDelete =[];
    $i=0;
    while($affiche_message = $filedelete->fetch()){
    $listFileDelete[$i] = $affiche_message['zip_name'];
    $i++;
    }

    return $listFileDelete;
}


function filesDelete(){
    $db = dbConnect();

    $filesend = $db->query('DELETE FROM filetransfer  WHERE  date_creation < CURDATE()-7');

        return $filesend;
}
