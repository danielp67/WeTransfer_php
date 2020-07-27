<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Thetransfer 2.0</title>
        <link href="assets\css\style.css" rel="stylesheet" /> 
    </head>
        
    <body>

<h1>Bienvenue sur le transfert de fichier 2.0 !</h1>


<p class="news">Effectuer un nouveau transfert :</p>

      <form method="post" action="" class="news">
    
          <label for="email">Votre email : </label>
          <input type="email" name="email" id="emailsend" placeholder="exemple@test.com" size="50" maxlength="10">
          <br>    
          <label for="pass">Mot de passe de protection : </label>
          <input type="password" name="pass" id="pass" placeholder="8 caractères" size="50" maxlength="10" >
          <br>
          <label for="email">Email du destinataire : </label>
          <input type="email" name="email" id="emailreceive" placeholder="exemple@test.com" size="50" maxlength="10">
          <br>
          <label for="">Importer votre fichier : </label>
          <input name="file" type="file" id="fileselect" />
          <label for="contenu">Message : </label>
          <input type="text" name="content" id="content" placeholder="ton texte" size="50" maxlength="255" required >
          <br>

          <input type="submit" value="Envoyer" />

      </form>


<p class='news'>Etat du transfert</p>

<progress size="200">

</body>
</html>