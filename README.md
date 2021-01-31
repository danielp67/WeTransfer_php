# WeeZip as WeTransfer like

WeeZip is a friendly alternative of the famous WeTransfer website to import and send big files.<br>
Project was realised in MVC design pattern (Model-View-Controller), almost in PHP and Javascript.<br>
An Email service was implemented, SwiftMailer from Symfony framework to notify your sender that he has some files for him.<br>
You can easily add one, or many files with the button Add or directly by drag and drop.<br>
A filter was added to delete some already added files.<br>

Pour les français :)
WeeZip est une alternative sympathique au célèbre WeTransfer pour importer et envoyer des gros fichiers.<br>
Le projet a été réalisé en couche MVC (Model-View-Controller), en PHP, et Javascript.<br>
Un service d'envoi d'email, SwiftMailer du framework Symfony a été intégré pour envoyer une notification à votre destinataire.<br>
Vous pouvez facilement importer un ou plusieurs fichiers en cliquant sur le bouton ajouter ou simplement avec un drag and drop.<br>
Un système de filtre vous permet d'éviter d'envoyer les fichiers en doublons.<br>



Herewith the different steps of the app :

## 1. Add Files and fill the form
![Weezip_1](assets/img/step1.png)


## 2. Validate the form, successfully message
![Weezip_2](assets/img/step2.png)

## 3. Your receiver will get a Email with the link
![Weezip_3](assets/img/step3.png)

## 4. Now he can log with his email and password
![Weezip_4](assets/img/step4.png)

## 5. If downloading doesn't work you can do it manually
![Weezip_5](assets/img/step5.png)