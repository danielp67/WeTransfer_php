<?php ob_start(); ?>
  		

<main>
<h1>WeeZip 2.0 !</h1>
<h2>Bienvenue sur le transfert de fichiers 2.0 !</h2>
<br>
<br>
<?php
  if(!isset($viewFile)){
  ?>
<p class="news">Effectuer un nouveau transfert :</p>

      <form method="post" action="index.php?action=addFile" class="news" enctype="multipart/form-data">
    
          <label for="email">Votre email : </label>
          <input type="text" name="emailsender" id="emailsender" value="daniel@test.com" size="50" maxlength="50">
          <br>    
          <label for="pass">Mot de passe de protection : </label>
          <input type="password" name="pass" id="pass" placeholder="6 caractères" size="50" maxlength="10" >
          <br>
          <label for="email">Email du destinataire : </label>
          <input type="email" name="emailreceiver" id="emailreceiver" value="exemple@test.com" size="50" maxlength="50">
          <br>
          <label for="filesend">Importer votre fichier : </label>
          <input name="filesend[]" type="file" id="filesend" multiple />
          <br>
          <label for="content">Message : </label>
          <input type="text" name="content" id="content" placeholder="ton texte" size="50" maxlength="255">
          <br>
        
          <label for="filestatus">File status:</label>
          <progress id="filestatus" max="100" value="70"> 70% </progress>
          <input type="submit" value="Transférer" />

      </form>
      <?php

  
}
 ?>
     






<?php
  if(isset($viewFile)){
  
?>
<div class="news">
<p class='news'>Votre fichier a été envoyé avec succès !</p>
   <p>Détail : <br>
       Votre email :<?php echo htmlspecialchars($viewFile['emailsender']); ?><br>
       Date :<?php echo $viewFile['date_creation']; ?><br>
       Nom de fichier : <?php echo $viewFile['zip_name']; ?> <br>
       Nombre de fichiers : <?php echo $viewFile['zip_name']; ?> <br>
       Destinataire : <?php echo $viewFile['emailreceiver']; ?>  <br>
       Mot de passe : <?php echo $viewFile['pass']; ?> <br><br>
        <a href="index.php">Refaire un nouvel envoi ?</a>
  </p>
</div>
<?php

  
}
 ?>

</main>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
