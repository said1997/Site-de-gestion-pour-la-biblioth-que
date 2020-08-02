<?php
session_start();

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if(isset($_SESSION['ID_utilisateur']) AND $_SESSION['ID_utilisateur']==38 )
 {   
 			$non_retoune=$bdd->query (' SELECT C.Nom_client, ResE.ID_Reservation, L.Titre_Livre , ResE.Date_Reservation, Ca.Nom_Categorie, ResE.Cloturee FROM Clients C, Livres L, Reservations_Lignes ResL, Reservations_Entete ResE, Categories Ca WHERE ResL.ID_Livre=L.ID_Livre AND ResE.ID_Reservation=ResL.ID_Reservation AND ResE.ID_Client=C.ID_Client AND L.ID_Categorie=Ca.ID_Categorie AND ResE.Cloturee=0  '); 
                     
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
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
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<form method="POST" action=" ">
					<input class="btn btn-warning" type="submit" name="fin_reservation" value="Fin Réservation" />
					<br/> <br/> <br/>
					
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Tite Livre</th>
								<th class="column2">Type du Livre</th>
								<th class="column3">Nom Client</th>
								<th class="column4">Date réservation</th>
								<th class="column5">ID Reservation</th>
								<th class="column6">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							 while ($list_em=$non_retoune->fetch()){	
							 	
							 	
   									?>
								<tr>
									<td class="column1"><?php echo $list_em['Titre_Livre']; ?></td>
									<td class="column2"><?php echo $list_em['Nom_Categorie']; ?></td>
									<td class="column3"><?php echo $list_em['Nom_client']; ?></td>
									<td class="column4"><?php  echo $list_em['Date_Reservation']; ?></td>
									<td class="column4"><?php  echo $list_em['ID_Reservation']; ?></td>
									<td class="column6">$999.00</td>
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