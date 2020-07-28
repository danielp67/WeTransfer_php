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


function postFile($emailsender, $password, $emailreceiver, $zipName)
{
    $db = dbConnect();
    $fileTransfer = $db->prepare('INSERT INTO filetransfer (emailsender, pass, emailreceiver, zip_name,date_creation) VALUES(?,?,?,?, NOW())');
    $affectedLines = $fileTransfer->execute(array($emailsender, $password, $emailreceiver, $zipName));

    return $affectedLines;
}



function viewFile()
{
    $db = dbConnect();
    $posts = $db->query('SELECT id, emailsender, pass, emailreceiver, zip_name, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM filetransfer  ORDER BY date_creation DESC LIMIT 0, 5');
    

    return $posts;
}




function sendMailToReceiver($emailsender, $password, $emailreceiver, $zipname)
{

    require_once('C:\wamp64\www\TP09_wetransfer_php\vendor\autoload.php');

   
    if($_SERVER['SERVER_NAME'] == 'localhost'){
    
        $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
        ->setUsername('f380f52a9e7224')
        ->setPassword('c5be3bd228c3f6');
    
    
    } else {
    
     $transport = new Swift_SmtpTransport;
    
    }
    
    
    $mailer = new Swift_Mailer($transport);
    
    
    // Create the message
    $message = (new Swift_Message())
      // Add subject
      ->setSubject($emailsender .' vous a envoyé un fichier sur Weezip2.0')
    
      //Put the From address 
     ->setFrom(['weezip@new.com' => 'Sender'])
    
      // Include several To addresses
     ->setTo([$emailreceiver => 'Receiver'])
      
     ->setBody('<p>Un nouveau fichier vous attend !</p>Vous venez de recevoir un fichier de la part de : '.$emailsender .'<br>Voici le lien : <a href="http://localhost/TP09_wetransfer_php/index.php?action=getFile&zip_name='.$zipname.'">Cliquez ici !</a><br>Et le mot de passe :'.$password, 'text/html');
     
    
        $result = $mailer->send($message);
        var_dump($result);



}

function sendMailToSender($emailsender, $password, $emailreceiver)
{

    require_once('C:\wamp64\www\TP09_wetransfer_php\vendor\autoload.php');

   
    if($_SERVER['SERVER_NAME'] == 'localhost'){
    
        $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
        ->setUsername('f380f52a9e7224')
        ->setPassword('c5be3bd228c3f6');
    
    
    } else {
    
     $transport = new Swift_SmtpTransport;
    
    }
    
    
    $mailer = new Swift_Mailer($transport);
    
    
    // Create the message
    $message = (new Swift_Message())
      // Add subject
      ->setSubject($emailsender .' vous a envoyé un fichier sur Weezip2.0')
    
      //Put the From address 
     ->setFrom(['weezip@new.com' => 'Sender'])
    
      // Include several To addresses
     ->setTo([$emailreceiver => 'Receiver'])
      
     ->setBody('<p>Votre fichier est bien téléchargé sur TheTransfer. Il sera accessible par votre destinataire pendant 7 jours.</p><br>Voici le lien : <a href="http://localhost/TP09_wetransfer_php/index.php?action=getFile">Cliquez ici !</a><br>Et le mot de passe :'.$password, 'text/html');
     
    
        $result = $mailer->send($message);
        var_dump($result);



}

function fileSend($zipname){
    $db = dbConnect();
    $filesend = $db->prepare('SELECT id, emailsender, pass, emailreceiver, zip_name, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM filetransfer  WHERE zip_name = ?');
        $filesend->execute(array($zipname));
        $send = $filesend->fetch();

        return $send;
}


