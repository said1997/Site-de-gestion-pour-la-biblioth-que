<?php
session_start();


    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

if(isset($_SESSION['ID_utilisateur']))
 {   

?>





<html>
<head>
	<meta charset="utf-8">
	<title>
		Profil de ...
	</title>
</head>
<body>

	<div align="center">
		<h3>Profil de <?php echo $_SESSION['Nom_client']; ?></h3>
		<br/> <br/> 

				 <a href="deconnexion.php">Se deconnecter</a>

	</div>

</body>
</html>

<?php

	}

	else
		header("Location: connexion.php");


  ?>