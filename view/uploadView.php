<?php ob_start(); ?>
  		

<main>
<script>
function drag_drop(event) {
    event.preventDefault();
    alert(event.dataTransfer.files[0]);
    alert(event.dataTransfer.files[0].name);
    alert(event.dataTransfer.files[0].size+" bytes");
   	   
}
</script>
    <div id="dropzone" ondrop="drag_drop(event)" ondragover="return false" >
    
    <div class="title">
        <h1>WeeZip 2.0 !</h1>
        <h2>Bienvenue sur le transfert de fichiers 2.0 !</h2>
        <?=var_dump(bin2hex(random_bytes(5)));?>
    </div>

<?php
if(!isset($viewFile)){
  ?>

      <form method="post" action="index.php?action=addFile" class="formupload" enctype="multipart/form-data">
        <legend>Effectuer un nouveau transfert :</legend>
          <label for="email">Votre email : </label>
          <input type="text" name="emailsender" id="emailsender" value="daniel@test.com" size="30" maxlength="30">
          <br>    
          <label for="pass">Mot de passe de protection : </label>
          <input type="password" name="pass" id="pass" placeholder="6 caractères" size="30" maxlength="10" >
          <br>
          <label for="email">Email du destinataire : </label>
          <input type="email" name="emailreceiver" id="emailreceiver" value="exemple@test.com" size="30" maxlength="30">
          <br>
          <label for="filesend">Importer votre fichier : </label>
          <input name="filesend[]" type="file" id="filesend" multiple />
          <span id="fileput"></span>
          <br>
          <label for="content">Message : </label>
          <input type="text" name="content" id="content" placeholder="ton texte" size="30" maxlength="255">
          <br>
          <label for="emailtransfer"><input type="radio" name="transfertype" value="yes" id="emailtransfer" checked/>Envoyer un transfert par email</label>
          <br>
          <label for="linktransfer"><input type="radio" name="transfertype" value="no" id="linktransfer" />Obtenir un lien de transfert</label>
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
<div class="resume">
<p>Votre fichier a été envoyé avec succès !</p>
   <p>Détail : <br>
       Votre email :<?php echo htmlspecialchars($viewFile['emailsender']); ?><br>
       Date :<?php echo $viewFile['date_creation']; ?><br>
       Nom de fichier : <?php echo $viewFile['zip_name']; ?> <br>
       Nombre de fichiers : <?php echo $viewFile['file_number']; ?> <br>
       Destinataire : <?php echo $viewFile['emailreceiver']; ?>  <br><br>
        <a href="index.php">Refaire un nouvel envoi ?</a>
  </p>
</div>
<?php

  
}
 ?>
</div>
</main>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
