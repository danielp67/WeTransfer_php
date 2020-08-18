<?php 

function getTemplate($text){

return $template = '









<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WeeZip 2.0</title>
        
        

       <!-- 
           <span>Photo by <a href="https://unsplash.com/@tomas_nz?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Tomas Sobek</a> on <a href="https://unsplash.com/s/photos/zip?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
-->
    </head>
        <style>
            html, body{
    margin: 0px; 
    font-family: "Verdana"; 
}


*, *::before,*::after{
    box-sizing: border-box;
    margin-block-start: 0px;
    margin-block-end: 0px;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}


@import url(\'https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap\');



.btnupload a{
    text-decoration: none;
    color: white;
}


main{
    height: 100%;
    width :100%;
    font-family: \'Noto Sans JP\', sans-serif;
}


.viewzone{
    height: 100%;
    width :100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
  background: url(\'localhost/TP09_wetransfer_php/assets/img/dropzone.png\') no-repeat center center;  
  background-color : lightgray;
  height: 100vh;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}


.title{
    height: 30%;
    min-width: 50px;
    font-size: 1.1rem;
}

.formupload, .resume{
        margin : auto;
        padding : 10px;
        background-color: white;
        border-radius: 10px;
        -moz-box-shadow: 0px 0px 10px 5px #656565;
        -webkit-box-shadow: 0px 0px 10px 5px #656565;
        -o-box-shadow: 0px 0px 10px 5px #656565;
        box-shadow: 0px 0px 10px 5px #656565;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px; 
        height :330px;
        width: 320px;
        text-align: center;
       position: relative;
       font-size: 1.1rem;
   }
   
   
.btnupload{
    width: 80% ;
    height: 70px;
    margin : auto;
    background-color: #4285F4;
    border-radius: 50px ;
    -webkit-border-radius: 50px ;
    -moz-border-radius: 50px ;
    -ms-border-radius: 50px ;
    -o-border-radius: 50px ;
    border-color: #4285F4;
    margin-top: 10px;
    font-size: 30px;
    font-weight: 700;
    color :white;
    -moz-box-shadow: 0px 0px 10px 5px rgb(180, 180, 180);
    -webkit-box-shadow: 0px 0px 10px 5px rgb(180, 180, 180);
    -o-box-shadow: 0px 0px 10px 5px rgb(180, 180, 180);
    box-shadow: 0px 0px 10px 5px rgb(180, 180, 180);
}
        </style>
    <body>
        <main>
        <div class="viewzone">
        <br>
        <h1>Weezip 2.0</h1>
        <div class="resume">

     '.$text.'
        </div>
        </div>

        
        </main>
        
    </body>
</html>




';


}