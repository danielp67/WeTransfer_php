<?php


function sendMailToReceiver($emailsender, $password, $emailreceiver, $zipname)
{

    require_once('C:\wamp64\www\TP09_wetransfer_php\vendor\autoload.php');
    require('C:\wamp64\www\TP09_wetransfer_php\model\mailtemplate.php');
   
    if($_SERVER['SERVER_NAME'] == 'localhost'){
    
        $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
        ->setUsername('f380f52a9e7224')
        ->setPassword('c5be3bd228c3f6');
    
    
    } else {
    
     $transport = new Swift_SmtpTransport;
    
    }
    
    
    $mailer = new Swift_Mailer($transport);
    

    $text= '<div><br>Un nouveau fichier test vous attend !</p>Vous venez de recevoir un fichier de la part de : <br>'.$emailsender .'<br><br>Mot de passe :'.$password.'<br><br><div class="btnupload"><a href="http://localhost/TP09_wetransfer_php/index.php?action=getFile&zip_name='.$zipname.'">Cliquez ici !</a></div></div>';


    $body = getTemplate($text);
    
  
   
    
    // Create the message
    $message = (new Swift_Message())
      // Add subject
      ->setSubject($emailsender .' vous a envoyé un fichier sur Weezip2.0')
    
      //Put the From address 
     ->setFrom(['weezip@new.com' => 'Sender'])
    
      // Include several To addresses
     ->setTo([$emailreceiver => 'Receiver'])
      
     ->setBody($body,'text/html');
     
    
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
    

    $text= '<div><br>Votre fichier est bien téléchargé sur WeeZip 2.0. Il sera accessible par votre destinataire pendant 7 jours.<br><br>Mot de passe :'.$password.'<br><br><div class="btnupload"><a href="http://localhost/TP09_wetransfer_php/index.php?action=getFile&zip_name='.$zipname.'">Cliquez ici !</a></div><br>Pour supprimer le fichier : <a href="http://localhost/TP09_wetransfer_php/index.php?action=deleteFile&zip_name='.$zipname.'">Cliquez ici !</a><br></p></div>';
   

    $body = getTemplate($text);
    
    
    // Create the message
    $message = (new Swift_Message())
      // Add subject
      ->setSubject('Bravo ! Votre fichier a été envoyé sur Weezip2.0')
    
      //Put the From address 
     ->setFrom(['weezip@new.com' => 'Sender'])
    
      // Include several To addresses
     ->setTo([$emailreceiver => 'Receiver'])
      
     ->setBody($body, 'text/html');
     
    
        $result = $mailer->send($message);
        var_dump($result);


}


