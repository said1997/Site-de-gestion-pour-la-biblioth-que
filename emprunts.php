<?php
session_start();

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=Mon_Projet;charset=utf8', 'root', 'diass');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if(isset($_SESSION['ID_utilisateur']))
 {   
 			$res_utilisateur=$bdd->prepare (' SELECT ResE.ID_Reservation, L.Titre_Livre , ResE.Date_Reservation, Ca.Nom_Categorie, ResE.Cloturee FROM Livres L, Reservations_Lignes ResL, Reservations_Entete ResE, Categories Ca WHERE ResL.ID_Livre=L.ID_Livre AND ResE.ID_Reservation=ResL.ID_Reservation AND L.ID_Categorie=Ca.ID_Categorie AND ResE.ID_Client= ? AND ResE.Cloturee=0 ');
    		$res_utilisateur->execute(array($_SESSION['ID_Client']));
   
    	if(isset($_POST['btn'])){

    		$cloture=$bdd->prepare (' UPDATE Reservations_Entete SET Cloturee = 1 WHERE Reservations_Entete.ID_Reservation = ? ');
    		$cloture->execute(array($_POST['btn']));

    		$res_entet=$bdd->prepare (' UPDATE Livres L, Reservations_Lignes ResL SET L.Quantite_Stock = L.Quantite_Stock + 1 WHERE L.ID_Livre=ResL.ID_Livre AND ResL.ID_Reservation=? ');
    		$res_entet->execute(array($_POST['btn']));

    		$remise=$bdd->prepare (' INSERT INTO Remise_Entete (ID_Remise, ID_Reservation, Date_Remise, MAJ_Stock) VALUES (NULL, ?, DATE(NOW()), 1) ');
    		$remise->execute(array($_POST['btn']));

    		$remise_L=$bdd->prepare (' SELECT RemE.ID_Remise, ResL.ID_Ligne FROM Reservations_Lignes ResL, Remise_Entete RemE WHERE RemE.ID_Reservation = ? AND ResL.ID_Reservation= ? ');
    		$remise_L->execute(array($_POST['btn'],$_POST['btn']));
    		echo $_POST['btn'];
    		$Remettre=$remise_L->fetch();

    		$remise=$bdd->prepare (' INSERT INTO Remises_Lignes (ID_Remise, ID_Ligne, ID_Resevation_Ligne, Quantite, Etat) VALUES (?, NULL, ?, 1, 2) ');
    		$remise->execute(array($Remettre['ID_Remise'],$Remettre['ID_Ligne']));
    		

    		header('Location: emprunts.php');
    }
    
                     
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>emprunts</title>
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
								<th class="column2">Type du livre</th>
								<th class="column3">Date réservation</th>
								<th class="column4h">Rendu</th>
								<th class="column5h">Rendre</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							
							 while ($res_uti=$res_utilisateur->fetch()){	
							 	$_i=$res_uti['ID_Reservation'];
							 	
   									?>
								<tr>
									<td class="column1"><?php echo $res_uti['Titre_Livre']; ?></td>
									<td class="column2"><?php echo $res_uti['Nom_Categorie']; ?></td>
									<td class="column3"><?php echo $res_uti['Date_Reservation']; ?></td>
									<td class="column4h"><?php  if ($res_uti['Cloturee'] != 0) echo "Oui";
									else echo "Non"; ?></td>
									
    								<td>
 									<div id="table" class="column5h"> <div class="row"> <div class="cell"> <?php if($res_uti['Cloturee'] == 0) echo "<button class=\"btn btn-warning\" name=\"btn\" value = $_i>Rendre</button>"; else echo "Rendu"; ?> </div> </div></div> </td>
								
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