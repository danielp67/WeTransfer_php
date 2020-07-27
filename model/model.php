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


function postFile($emailsender, $password)
{
    $db = dbConnect();
    $fileTransfer = $db->prepare('INSERT INTO filetransfer (emailsender, pass, date_creation) VALUES(?,?,NOW())');
    $affectedLines = $fileTransfer->execute(array($emailsender,$password));

    return $affectedLines;
}



function viewFile()
{
    $db = dbConnect();
    $posts = $db->query('SELECT id, emailsender, pass, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM filetransfer  ORDER BY date_creation DESC LIMIT 0, 5');
    

    return $posts;
}