<?php $title='Mon blog' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thetransfer 2.0</title>
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
        
    <body>
        <header >
           
            <nav>    
                    <ul id="nav_menu">
                        <li><a href="mesplus">NOS ++</a></li>
                        <li><a href="mecontacter">NOUS CONTACTER</a></li>
                    
                    </ul>   
            </nav>

            <div id="menu_burger">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </header>

<main>

<h1>Bienvenue sur le transfert de fichiers 2.0 !</h1>

<p class="news">Effectuer un nouveau transfert :</p>

      <form method="post" action="index.php?action=addFile" class="news" enctype="multipart/form-data">
    
          <label for="email">Votre email : </label>
          <input type="text" name="emailsender" id="emailsender" placeholder="exemple@test.com" size="50" maxlength="50">
          <br>    
          <label for="pass">Mot de passe de protection : </label>
          <input type="password" name="pass" id="pass" placeholder="8 caractères" size="50" maxlength="10" >
          <br>
          <label for="email">Email du destinataire : </label>
          <input type="email" name="emailreceiver" id="emailreceiver" value="exemple@test.com" size="50" maxlength="50">
          <br>
          <label for="filesend">Importer votre fichier : </label>
          <input name="filesend" type="file" id="filesend" />
          <br>
          <label for="contenu">Message : </label>
          <input type="text" name="content" id="content" placeholder="ton texte" size="50" maxlength="255">
          <br>
        
          <label for="filestatus">File status:</label>
          <progress id="filestatus" max="100" value="70"> 70% </progress>
          <input type="submit" value="Envoyer" />

      </form>

     

<p class='news'>Etat du transfert</p>




<?php
  while($affiche_message = $viewFile->fetch()){

?>
<div class="news">
   <h3>
       <?php echo htmlspecialchars($affiche_message['emailsender']); ?>
       <em>le <?php echo $affiche_message['date_creation']; ?></em> a envoyé 
       <?php echo $affiche_message['pass']; ?> à <?php echo $affiche_message['emailreceiver']; ?>
   </h3>
</div>
<?php

  }
  $viewFile->closeCursor();

 ?>


</main>

</body>
</html>