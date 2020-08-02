<?php
session_start();

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if(isset($_SESSION['ID_utilisateur']) AND $_SESSION['Previlege']==1 )
 {   	
 		if (isset($_GET['id']) AND $_GET['id']==1) {
 			 

 			$liste_emprunt=$bdd->query (' SELECT L.Titre_Livre , C.Nom_client,C.Prenom_Client,C.Adresse_Client, V.Code_Postal,U.e_mail
					FROM Livres L, Villes V, Reservations_Lignes ResL, Reservations_Entete ResE, Clients C,
							Utilisateurs U WHERE ResL.ID_Livre=L.ID_Livre AND ResE.ID_Reservation=ResL.ID_Reservation AND C.ID_Client=ResE.ID_Client AND U.ID_Client=C.ID_Client AND C.CP_Client=V.Code_Postal AND ResL.Quantite_Reservee > 0  '); 
				}

 			else{
 			$liste_emprunt=$bdd->query (' SELECT ResL.ID_Livre,C.Nom_client, L.Titre_Livre ,
							Ca.Nom_Categorie , ResE.Date_Reservation, RemE.Date_Remise 
							FROM Livres L, Clients C, Reservations_Lignes ResL, Remise_Entete RemE,
									Reservations_Entete ResE, Categories Ca
							WHERE ResL.ID_Livre=L.ID_Livre 
							AND ResE.ID_Reservation=ResL.ID_Reservation AND RemE.ID_Reservation=ResE.ID_Reservation AND C.ID_Client=ResE.ID_Client AND L.ID_Categorie=Ca.ID_Categorie
								ORDER BY RemE.Date_Remise DESC  '); 
                     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Emprunts des clients</title>
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
	<header> <?php include('entete.php');  ?></header>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<form method="POST" action=" ">
					
					<br/> <br/> <br/>

					<?php  	if (isset($_GET['id']) AND $_GET['id']==1){ ?>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Tite Livre</th>
								<th class="column2">Nom client</th>
								<th class="column3">Prénom Client</th>
								<th class="column4">Adresse client</th>
								<th class="column5">Code postal</th>
								<th class="column6">E_mail</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							
							 while ($list_em=$liste_emprunt->fetch()){	
							 	
							 	
   									?>
								<tr>
									<td class="column1"><?php echo $list_em['Titre_Livre']; ?></td>
									<td class="column2"><?php echo $list_em['Nom_client']; ?></td>
									<td class="column3"><?php echo $list_em['Prenom_Client']; ?></td>
									<td class="column4"><?php  echo $list_em['Adresse_Client']; ?></td>
									<td class="column5"><?php  echo $list_em['Code_Postal']; ?></td>
									<td class="column6"><?php  echo $list_em['e_mail']; ?></td>
									
								</tr>
								<?php } 
							}

								 ?>
								
								
						</tbody>
					</table>





				<?php  	if (isset($_GET['id']) AND $_GET['id']==2){ ?>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Tite Livre</th>
								<th class="column2">Type du Livre</th>
								<th class="column3">Nom Client</th>
								<th class="column4h">Date réservation</th>
								<th class="column5h">Date du Retour</th>
								
							</tr>
						</thead>
						<tbody>
							
							
						<?php	 while ($list_em=$liste_emprunt->fetch()){	?>
								<tr>
									<td class="column1"><?php echo $list_em['Titre_Livre']; ?></td>
									<td class="column2"><?php echo $list_em['Nom_Categorie']; ?></td>
									<td class="column3"><?php echo $list_em['Nom_client']; ?></td>
									<td class="column4h"><?php  echo $list_em['Date_Reservation']; ?></td>
									<td class="column5h"><?php  echo $list_em['Date_Remise']; ?></td>
									
								</tr>
								<?php } 
									}

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