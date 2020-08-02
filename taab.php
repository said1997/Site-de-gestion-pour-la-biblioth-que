<?php
session_start();

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if(isset($_SESSION['ID_utilisateur']))
 {   

    $Tab_Livre=$bdd->prepare( ' SELECT L.Titre_Livre, A.Nom_auteur, C.Nom_Categorie, L.Quantite_Stock, L.ID_Livre FROM Livres L, Auteurs A, Categories C WHERE L.Titre_Livre NOT IN (SELECT L.Titre_Livre
FROM Livres L,
Reservations_Lignes ResL,
Reservations_Entete ResE,
Clients C
WHERE ResL.ID_Livre=L.ID_Livre AND ResE.ID_Reservation=ResL.ID_Reservation AND ?=ResE.ID_Client) AND L.ID_Auteur=A.ID_Auteur AND L.ID_Categorie=C.ID_Categorie ORDER BY L.Titre_Livre 
  ');

    $Tab_Livre->execute(array($_SESSION['ID_Client']));


   
    	if(isset($_POST['btn'])){

    		$res_entet=$bdd->prepare ('INSERT INTO Reservations_Entete (ID_Reservation, ID_Client, Date_Reservation, MAJ_Stock, Cloturee) VALUES (NULL,?,DATE(NOW()), 1, 0)');
    		$res_entet->execute(array($_SESSION['ID_Client']));
    		$id_res=$bdd->prepare ('SELECT ID_Reservation FROM Reservations_Entete WHERE ID_Client=? ORDER BY ID_Reservation DESC');
    		$id_res->execute(array($_SESSION['ID_Client']));
    		$id_R=$id_res->fetch();
    		$res_entet=$bdd->prepare (' INSERT INTO Reservations_Lignes (ID_Reservation, ID_Livre, Quantite_Reservee, ID_Ligne) VALUES (?, ?, 1, NULL); ');
    		$res_entet->execute(array($id_R['ID_Reservation'],$_POST['btn']));

    		$res_entet=$bdd->prepare (' UPDATE Livres SET Quantite_Stock = Quantite_Stock - 1 WHERE (SELECT L.Titre_Livre  FROM Livres L, Reservations_Entete ResE, Reservations_Lignes ResL WHERE L.ID_Livre=ResL.ID_Livre AND ResL.ID_Reservation=ResE.ID_Reservation) ');
    		$res_entet->execute(array($_POST['btn']));




    		header('Location: taab.php');
    	}
    	
    	
    

                     
?>






<!DOCTYPE html>
<html lang="en">
<head>

	<title>Réservation</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="cache/main.css">

<!--===============================================================================================-->
</head>
<body>

	<?php   if ($_SESSION['Previlege']==1) { ?>
			<header> <?php include('entete.php');  ?></header>
                
              <?php  }  else { ?>
               <header> <?php include('entete.html');  ?></header>
            <?php } ?>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<form method="POST" action=" ">
				
					<br/> <br/> <br/>
					
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Titre du livre</th>
								<th class="column2">Auteur</th>
								<th class="column3">Type du livre</th>
								<th class="column4h">Disponibilité</th>
								<th class="column5h">Réservation</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							
							 while ($livre=$Tab_Livre->fetch()){	
							 	$_i=$livre['ID_Livre'];
							 	
   									?>
								<tr>
									<td class="column1"><?php echo $livre['Titre_Livre']; ?></td>
									<td class="column2"><?php echo $livre['Nom_auteur']; ?></td>
									<td class="column3"><?php echo $livre['Nom_Categorie']; ?></td>
									<td class="column4h"><?php  if ($livre['Quantite_Stock'] > 0) echo "Oui";
									else echo "Non"; ?></td>
									
    								<td>
 									<div id="table"> <div class="row"> <div class="cell"> <?php if($livre['Quantite_Stock'] > 0) echo "<button class=\"btn btn-warning\" name=\"btn\" value = $_i>Réserver</button>"; else echo "non disponible"; ?> </div> </div></div> </td>
								
								</tr>
								<?php } 






								 ?>


								
								
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>

<?php

	}

	else
		header("Location: connexion.php");


  ?>