<?php

session_start();
    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if (isset($_POST['forminscription'])){

              $Nom_client=htmlspecialchars($_POST['Nom']);
              $Prenom_Client=htmlspecialchars($_POST['prenom']);
              $Adresse_Client=htmlspecialchars($_POST['adresse']);
              $CP_Client=htmlspecialchars($_POST['C_P']);
              $identifiant=htmlspecialchars($_POST['identifiant']);
              $identifiant2=htmlspecialchars($_POST['identifiant2']);
              $mot_de_passe=sha1($_POST['mot_de_passe']);
              $mot_de_passe2=sha1($_POST['mot_de_passe2']);


        if (!empty($_POST['Nom'] ) AND !empty($_POST['prenom'] ) AND !empty($_POST['adresse'] ) AND !empty($_POST['C_P'] ) AND !empty($_POST['identifiant'] ) AND !empty($_POST['identifiant2'] ) AND !empty($_POST['mot_de_passe'] ) AND !empty($_POST['mot_de_passe2'] )){
            
              if(strlen($Nom_client) > 255 AND strlen($Prenom_Client) > 255 AND strlen($Adresse_Client) > 255 AND
              strlen($CP_Client) > 255 AND strlen($identifiant) > 255 AND strlen($identifiant2) > 255 AND
                strlen($mot_de_passe) > 255 AND strlen($mot_de_passe2) > 255)
                $erreur="Faut pas depasser les 255 caratères.";
                elseif ($identifiant2 != $identifiant)
                    $erreur="Identifiants non identiques.";
                elseif (!filter_var($identifiant,FILTER_VALIDATE_EMAIL))
                    $erreur="Entrez une boite e_mail correcte.";
                elseif($CP_Client > 99999)
                  $erreur="code postale trop grand.";
                elseif ($mot_de_passe2 != $mot_de_passe)
                    $erreur="mot de passe non identique.";
                
                else{

                        $e_mailCount=$bdd->prepare('SELECT * FROM Utilisateurs WHERE e_mail=?');
                        $e_mailCount->execute(array($identifiant));
                        $e_mailExist=$e_mailCount->rowCount();

                    $NomCount=$bdd->prepare('SELECT * FROM Clients WHERE Nom_client=? AND Prenom_Client=? ');
                        $NomCount->execute(array($Nom_client,$Prenom_Client));
                        $NomExist=$NomCount->rowCount();

                    if ($e_mailExist != 0)
                        $erreur="mail existe déjà !";
                
                    elseif ($NomExist != 0)
                        $erreur="Vous êtes déjà enregistré!";
                    else{

                         $insertMembre=$bdd->prepare( ' INSERT INTO Clients (ID_Client , Nom_client , Prenom_Client , Adresse_Client , CP_Client) VALUES ( null,?,?,?,?) ');
                     $insertMembre->execute(array($Nom_client,$Prenom_Client,$Adresse_Client,$CP_Client));

                      
                     $SelectId=$bdd->prepare( ' SELECT ID_Client FROM Clients WHERE Nom_client LIKE ?  AND Prenom_Client LIKE ?');
                     $SelectId->execute(array($Nom_client,$Prenom_Client));
                        $ligne=$SelectId->fetch();
                        if (isset($_SESSION['Previlege']) AND $_SESSION['Previlege']==1 )
                          $Previlege=1;
                        else
                          $Previlege=0;
                     $insertUtilisateur=$bdd->prepare(' INSERT INTO Utilisateurs (ID_utilisateur, e_mail, mot_pass, Date_inscription, ID_Client,Previlege) VALUES (NULL,?,?,DATE(NOW()),?,?)');
                     $insertUtilisateur->execute(array($identifiant,$mot_de_passe,(int)$ligne['ID_Client'],$Previlege));
                    $erreur="Votre compte à bien était crée. <a class=\"btn btn-warning\" href=\"connexion.php\">Je me connecte !</a>"; //faire gaffe pour le code postal
                    }
                }
        }

        else
            $erreur="Tout les champs doivent être remplis";
    }

?>




<link href="css/inscription.css" rel="stylesheet" id="bootstrap-css"

<!Doctype html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

 <?php   if (isset($_SESSION['Previlege']) AND $_SESSION['Previlege']==1) { ?>
      <header> <div class="header">
  <a href="#default" class="logo"> Bibliothèque </a>
  <div class="header-right">
    <a class="active" href="accueil_administrateur.php">Accueil</a>
    <a href="categories_livres.php">Catégories Livres</a>
    <a href="deconnexion.php">Se déconnecter</a>
   
  </div>
</div>
 </header>
                
              <?php  }  else { ?>
               <header> <div class="header">
  <a href="#default" class="logo"> Bibliothèque </a>
  <div class="header-right">
    <a class="active" href="mon_profil.php">Accueil</a>
    <a href="categories_livres.php">Catégories Livres</a>
    <a href="deconnexion.php">Se déconnecter</a>
   
  </div>
</div>
 </header>
            <?php } ?>
            
 <div class="container">
 <!---heading---->
 <form method="POST" action=" ">
     <header class="heading"> Formulaire d'inscription</header><hr></hr>
    <!---Form starting----> 
    <div class="row ">
     <!--- For Name---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="firstname">Nom :</label> </div>
                 <div class="col-xs-8">
                     <input type="text" name="Nom" id="Nom" placeholder="Entrez votre nom" class="form-control " value="<?php if (isset( $Nom_client)) echo $Nom_client;  ?>" />
             </div>
              </div>
         </div>
         
         
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Prénom :</label></div>
                <div class ="col-xs-8">  
                     <input type="text" name="prenom" id="lname" placeholder="Entez Votre Prénom" class="form-control last" value="<?php if (isset( $Prenom_Client)) echo $Prenom_Client;  ?>" />
                </div>
             </div>
         </div>
     <!-----For email---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="mail" >Adresse :</label></div>
                 <div class="col-xs-8"  >    
                      <input type="text" name="adresse"  id="email"placeholder="Entrez votre adresse" class="form-control" value="<?php if (isset( $Adresse_Client)) echo $Adresse_Client;  ?>" >
                 </div>
             </div>
         </div>
     <!-----For Password and confirm password---->
          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Code Postale :</label></div>
                  <div class="col-xs-8">
                         <input type="text" id="password" name="C_P" placeholder="Entrez votre code Postale" class="form-control" value="<?php if (isset( $CP_Client)) echo $CP_Client;  ?>" >
                 </div>
          </div>
          </div>

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
                          <label class="pass">E_mail confirmation :</label></div>
                  <div class="col-xs-8">
                         <input type="text" name="identifiant2" id="password" placeholder="Confirmez votre mail" class="form-control" value="<?php if (isset( $identifiant2)) echo $identifiant2;  ?>">
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

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Confirmez votre mot de passe :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mot_de_passe2" id="password" placeholder="Confirmez mot de passe" class="form-control">
                 </div>
          </div>
          </div>
          
         <div class="col-sm-12">
             <div class ="row">
                 <div class="col-xs-4 ">
                   <label class="gender">Sexe:</label>
                 </div>
             
                 <div class="col-xs-4 male">     
                     <input type="radio" name="gender"  id="gender" value="boy">Homme</input>
                 </div>
                 
                 <div class="col-xs-4 female">
                     <input type="radio"  name="gender" id="gender" value="girl" >Femme</input>
                 </div>
            
             </div>
             <div class="col-sm-12">

                 <div class="btn btn-warning">
                        <input class="btn btn-warning" type="submit" name="forminscription" value="S'inscrire" />
                 </div>
           </div>
         </div>
     </div>  
</form>
     <?php 

                    if (isset($erreur)) {
                        echo '<div class="btn btn-warning2" > ' .$erreur .    '</div>'    ;
                    }

                 ?>
                 
         
</div>

</body>     
</html>
     
     