<?php
session_start();


    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if (isset($_POST['identifiant'])) {
      $identifiant=htmlspecialchars($_POST['identifiant']);
      $mot_de_passe=sha1($_POST['mot_de_passe']);

      if ( !empty($_POST['identifiant'] ) AND !empty($_POST['mot_de_passe'] )){

        if(strlen($identifiant) > 255 AND strlen($mot_de_passe) > 255)
          $erreur="Les champs doivent contenir moins de 255 caractères!";
        elseif (!filter_var($identifiant,FILTER_VALIDATE_EMAIL))
              $erreur="Entrez une boite e_mail correcte.";

          else{

            $e_mailCount=$bdd->prepare('SELECT * FROM Utilisateurs WHERE e_mail=?');
                $e_mailCount->execute(array($identifiant));
                $e_mailExist=$e_mailCount->rowCount();

            $PassCount=$bdd->prepare('SELECT * FROM Utilisateurs WHERE e_mail=? AND mot_pass=? ');
                $PassCount->execute(array($identifiant,$mot_de_passe));
                $PassExist=$PassCount->rowCount();

            if (!$e_mailExist == 1)
              $erreur="e_mail incorrecte";
            elseif (!$PassExist == 1) {
              $erreur="mot de passe incorrecte";
            }
            else{ 
              
              $userInfo=$e_mailCount->fetch();
              $_SESSION['ID_utilisateur']=$userInfo['ID_utilisateur'];
              $_SESSION['e_mail']=$userInfo['e_mail'];
              $_SESSION['Previlege']=$userInfo['Previlege'];

              $user=$bdd->prepare('SELECT * FROM Clients WHERE ID_Client=? ');
                $user->execute(array($userInfo['ID_Client']));
                $user=$user->fetch();
                $_SESSION['Nom_client']=$user['Nom_client'];
                $_SESSION['Prenom_Client']=$user['Prenom_Client'];
                $_SESSION['ID_Client']=$user['ID_Client'];
                if ($userInfo['Previlege']==1)
                header("Location: accueil_administrateur.php?id=".$_SESSION['ID_Client']);
                else
                header("Location: accueil_client.php?id=".$_SESSION['ID_Client']);


            }


          }
      }

      else
        $erreur="Renseignez tout les Champs !";

    }


?>



<!Doctype html>
<html>
<head>
     <meta charset="UTF-8">
     <link href="css/inscription.css" rel="stylesheet" id="bootstrap-css">
     <title>Page de connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <header> <div class="header">
  <a href="#default" class="logo"> Bibliothèque </a>
  <div class="header-right">
    <a class="active" href="mon_profil.php">Accueil</a>
    <a href="categories_livres.php">Catégories Livres</a>
    
    <a href="inscription.php">S'inscrire</a>
   
  </div>
</div>
 </header> 
	
 <div class="container2">
 <!---heading---->
 <form method="POST" action=" ">
     <header class="heading">Connexion au site de la bibliothèque</header><hr></hr>
    <!---Form starting----> 
    <div class="row ">
     

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">E_mail :</label></div>
                  <div class="col-xs-8">
                         <input type="text" name="identifiant" id="password" placeholder="Entrez votre mail" class="form-control" value="<?php if (isset( $identifiant)) echo $identifiant;  ?>">
                 </div>
          </div>
          </div>

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Entrez un mot de passe :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mot_de_passe" id="password" placeholder="Entrez un mot de passe" class="form-control">
                 </div>
          </div>
          </div>
             
           <div >
                        <input class="btn btn-warning" type="submit" name="forminscription" value="Se connecter" />
                 
           </div>
         
     </div>  
     <a href="inscription.php">Je m'inscris !</a>
</form>


     <?php 

                    if (isset($erreur)) {
                        echo '<div class="btn btn-warning2" > ' .$erreur .    '</div>'    ;
                    }

                 ?>
                 
         
</div>

</body>     
</html>
     
     
