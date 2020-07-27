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
                        <li><a href="mesplus">MES ++</a></li>
                        <li><a href="mecontacter">ME CONTACTER</a></li>
                    
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
          <br>
          <label for="contenu">Message : </label>
          <input type="text" name="content" id="content" placeholder="ton texte" size="50" maxlength="255" required >
          <br>

          <input type="submit" value="Envoyer" />

      </form>


<p class='news'>Etat du transfert</p>

<progress size="200">

</main>

</body>
</html>