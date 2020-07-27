<?php ob_start(); ?>
  		

<main>

<h1>Bienvenue sur le transfert de fichiers 2.0 !</h1>

<p class="news">Récupérer votre fichier :</p>

      <form method="post" action="index.php?action=downloadFile" class="news" enctype="multipart/form-data">
    
          <label for="email">Votre email : </label>
          <input type="text" name="emailreceiver" id="emailreceiver" placeholder="exemple@test.com" size="50" maxlength="50">
          <br>    
          <label for="pass">Mot de passe de protection : </label>
          <input type="password" name="pass" id="pass" placeholder="8 caractères" size="50" maxlength="10" >
          <br>
          <label for="filestatus">Récupérer votre fichier :</label>
          <progress id="filestatus" max="100" value="70"> 70% </progress>
          <input type="submit" value="Télécharger" />

      </form>

     

<p class='news'>Etat du transfert</p>

</main>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
