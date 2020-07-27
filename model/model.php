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


function postFile($emailsender, $password, $emailreceiver)
{
    $db = dbConnect();
    $fileTransfer = $db->prepare('INSERT INTO filetransfer (emailsender, pass, emailreceiver, date_creation) VALUES(?,?,?, NOW())');
    $affectedLines = $fileTransfer->execute(array($emailsender, $password, $emailreceiver));

    return $affectedLines;
}



function viewFile()
{
    $db = dbConnect();
    $posts = $db->query('SELECT id, emailsender, pass, emailreceiver, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM filetransfer  ORDER BY date_creation DESC LIMIT 0, 5');
    

    return $posts;
}




function sendMail($emailsender, $password, $emailreceiver)
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
      ->setSubject($emailsender .'vous a envoyé un fichier sur Thetransfer')
    
      //Put the From address 
     ->setFrom([$emailsender => 'Sender'])
    
      // Include several To addresses
     ->setTo([$emailreceiver => 'Receiver'])
      
     ->setBody('<p>Un nouveau fichier vous attend !</p>Vous venez de recevoir un fichier de la part de : '.$emailsender .'<br>Voici le lien : <a href="">dfgfdgfddhhsghdfshs</a><br>Et le mot de passe :'.$password, 'text/html');
     
    
        $result = $mailer->send($message);
        var_dump($result);



}