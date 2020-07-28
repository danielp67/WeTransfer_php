<?php ob_start(); ?>
  		

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
          <input name="filesend[]" type="file" id="filesend" multiple />
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
  while($display_message = $viewFile->fetch()){

?>
<div class="news">
   <h3>
       <?php echo htmlspecialchars($display_message['emailsender']); ?>
       <em>le <?php echo $display_message['date_creation']; ?></em> a envoyé 
       <?php echo $display_message['zip_name']; ?> à <?php echo $display_message['emailreceiver']; ?> avec la clé 
       <?php echo $display_message['pass']; ?>
    </h3>
</div>
<?php

  }
  $viewFile->closeCursor();

 ?>

</main>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
