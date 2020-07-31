<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WeeZip 2.0</title>
        <link rel="stylesheet" href="assets/css/style.css" />
        <script defer src="assets\js\index.js" ></script>

       <!-- 
           <span>Photo by <a href="https://unsplash.com/@tomas_nz?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Tomas Sobek</a> on <a href="https://unsplash.com/s/photos/zip?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
-->
    </head>
        
    <body>
        
    <header >
           
           <nav>    
                   <ul id="nav_menu">
                       <li><a href="mesplus">Aide</a></li>
                       <li><a href="mecontacter">Nous contacter</a></li>
                       <li><a href="mecontacter">Se connecter</a></li>
                       <li><a href="index.php?action=searchFile">Rechercher un transfert</a></li>
                   </ul>   
           </nav>

           <div id="menu_burger">
               <span></span>
               <span></span>
               <span></span>
           </div>

       </header>

        <?= $content ?>
    </body>
</html>