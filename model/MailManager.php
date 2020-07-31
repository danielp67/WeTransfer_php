<?php


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
      
     ->setBody('<p>Un nouveau fichier vous attend !</p>Vous venez de recevoir un fichier de la part de : '.$emailsender .'<br>Voici le lien : <a href="http://localhost/TP09_wetransfer_php/index.php?action=getFile&zip_name='.$zipname.'">Cliquez ici !</a><br>Et le mot de passe :'.$password.'</p>', 'text/html');
     
    
        $result = $mailer->send($message);
        var_dump($result);


}



function sendMailToSender($emailsender, $password, $emailreceiver, $zipname)
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
      ->setSubject('Bravo ! Votre fichier a été envoyé sur Weezip2.0')
    
      //Put the From address 
     ->setFrom(['weezip@new.com' => 'Sender'])
    
      // Include several To addresses
     ->setTo([$emailreceiver => 'Receiver'])
      
     ->setBody('<p>Votre fichier est bien téléchargé sur WeeZip 2.0. Il sera accessible par votre destinataire pendant 7 jours.<br>Voici le lien : <a href="http://localhost/TP09_wetransfer_php/index.php?action=getFile&zip_name='.$zipname.'">Cliquez ici !</a><br>Et le mot de passe :'.$password.'<br>Pour supprimer le fichier : <a href="http://localhost/TP09_wetransfer_php/index.php?action=deleteFile&zip_name='.$zipname.'">Cliquez ici !</a><br></p>', 'text/html');
     
    
        $result = $mailer->send($message);
        var_dump($result);


}


