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



function fileDelete($zipname){
    $db = dbConnect();
    $filesend = $db->prepare('DELETE FROM filetransfer  WHERE zip_name = ?');
        $filesend->execute(array($zipname));
        $send = $filesend->fetch();

        return $send;
}


