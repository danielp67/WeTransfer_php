<?php ob_start(); ?>
  		

<main>



    <div class="viewzone">

    <?php
  if(!isset($status)){
    ?>
    <div class="title">
        <h1>WeeZip 2.0 !</h1>
        <h2>Bienvenue sur le transfert de fichiers 2.0 !</h2>
        <?=var_dump(bin2hex(random_bytes(5)));?>
    </div>



    <div class="formupload">
      <form method="post" action="index.php?action=downloadFile&amp;zip_name=<?php echo $getFile['zip_name']; ?>" class="form" enctype="multipart/form-data">
      <legend>Récupérer votre fichier :</legend>
      <div class="form__group field">  
            <input type="email" class="form__field" placeholder="Email" name="emailreceiver" id="emailreceiver" value="exemple@test.com"   maxlength="30">
            <label for="email" class="form__label">Votre email</label>
        </div>   
        <div class="form__group field">  
            <input type="password" name="pass" id="pass" placeholder="6 caractères" class="form__field" maxlength="10" >
            <label for="pass" class="form__label">Mot de passe</label>
        </div>
          <label for="filestatus">Récupérer votre fichier :</label>
          <progress id="filestatus" max="100" value="90"> 90% </progress>
          <input type="submit" value="Télécharger" id="btndownload" />

      </form>

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
        <div class="title">
            <h1>Merci d'avoir utilisé WeeZip 2.0 !</h1>
            <p class='news'>Votre fichier a été détruit avec succès !</p>
            <a href="index.php">Refaire un nouvel envoi ?</a>
        </div>
    <?php
    
      
    }

elseif(isset($status) AND !isset($delete)){
  
?>
        <div class="title">
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
