<?php ob_start(); ?>
  		

<main>
    <div id="dropzone" class="viewzone" ondragover="return false" >
    
    <div class="title">
        <h1>WeeZip 2.0 !</h1>
        <h2>Bienvenue sur le transfert de fichiers 2.0 !</h2>
        <h3 class="message"></h3>
        <?=var_dump(bin2hex(random_bytes(5)));?>
    </div>

<?php
if(!isset($viewFile)){
  ?>
    
      <form method="POST" action="" class="formupload" id="style-4" enctype="multipart/form-data">
        <div class="scrollbar" id="style-4">
            <legend>Importer des fichiers :</legend>
            <div id="fileinput"></div>
            <br>
            <label for="filesend"><span id="filenumber"></span></label>
            <input type="file" name=""  files="no" id="filesend" class="inputfile" multiple />
            <br>
            <div class="form__group field">
            <input type="email" class="form__field" placeholder="Email" name="emailsender" id='emailsender' value="daniel@test.fr" required />
            <label for="email" class="form__label">Votre email</label>
            </div>

            <div class="form__group field">  
            <input type="password" name="pass" id="pass" placeholder="6 caractères" class="form__field" maxlength="10" >
            <label for="pass" class="form__label">Mot de passe</label>
            </div>

            <div class="form__group field">  
            <input type="email" class="form__field" placeholder="Email" name="emailreceiver" id="emailreceiver" value="exemple@test.com"   maxlength="30">
            <label for="email" class="form__label">Email destinataire</label>
            </div>
            
            <div class="form__group field">  
            
            <input type="text" name="content" id="content" placeholder="ton texte" class="form__field"  maxlength="255">
            <label for="content" class="form__label">Message</label>    
            </div>
            <label for="emailtransfer"><input type="radio" name="transfertype" value="yes" id="emailtransfer"  class="radio" checked/>Envoyer un transfert par email</label>
            <br>
            <label for="linktransfer"><input type="radio" name="transfertype" value="no" id="linktransfer" class="radio" />Obtenir un lien de transfert</label>
            <br>
        </div>
        <div class="btn">
            <hr>
            <label for="filestatus">Taille fichiers :</label>
            <br>
            <progress id="progress" value="0" max="2000000"   ></progress>
            <input type="submit" value="Transférer" id="btnupload" />
        </div>
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
