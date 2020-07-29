<?php ob_start(); ?>
  		

<main>
<h1>WeeZip 2.0 !</h1>

<?php
  if(!isset($status)){
  
?>
<h2>Bienvenue sur le transfert de fichiers !</h2>


      <form method="post" action="index.php?action=downloadFile&amp;zip_name=<?php echo $getFile['zip_name']; ?>" class="form" enctype="multipart/form-data">
      <legend>Récupérer votre fichier :</legend>
          <label for="email">Votre email : </label>
          <input type="text" name="emailreceiver" id="emailreceiver" value="exemple@test.com" size="50" maxlength="50">
          <br>    
          <label for="pass">Mot de passe de protection : </label>
          <input type="password" name="pass" id="pass" placeholder="8 caractères" size="50" maxlength="10" >
          <br>
          <label for="filestatus">Récupérer votre fichier :</label>
          <progress id="filestatus" max="100" value="70"> 70% </progress>
          <input type="submit" value="Télécharger" />

      </form>

     


<div class="resume">
   <p>
       Votre email :<?php echo htmlspecialchars($getFile['emailsender']); ?><br>
       Date :<?php echo $getFile['date_creation']; ?><br>
       Nom de fichier : <?php echo $getFile['zip_name']; ?> <br>
       Nombre de fichiers : <?php echo $getFile['file_number']; ?> <br>
       Destinataire : <?php echo $getFile['emailreceiver']; ?>  <br>
       Poids du fichier :<?php echo ($getFile['zip_size']/1000); ?> Ko
       Message : <?php echo $getFile['content']; ?> <br><br>
</p>
</div>


<?php
}

if(isset($status) AND isset($delete)){
  
    ?>
    <div class="news">
    <h1>Merci d'avoir utilisé WeeZip 2.0 !</h1>
    <p class='news'>Votre fichier a été détruit avec succès !</p>
    <a href="index.php">Refaire un nouvel envoi ?</a>
    </div>
    <?php
    
      
    }

elseif(isset($status) AND !isset($delete)){
  
?>
<div class="news">
<h1>Merci d'avoir utilisé WeeZip 2.0 !</h1>
<p class='news'>Votre fichier a été téléchargé avec succès !</p>

   
        <a href="<?php echo $downloadFile ?>">Cliquer ici si le téléchargement n'a pas démarrer</a>
  
</div>
<?php

  
}

 ?>

</main>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
