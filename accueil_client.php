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





<link href="css/menu.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet"  href="bootstrap-theme.min.css">
	<link rel="stylesheet"  href="style.css">

<!------ Include the above in your HEAD tag ---------->
<header class="containe-fluide header"> 

		<div class="container">
			<a href="#" class="logo">Mon profil</a>
			<nav class="menu">
				<a href="#">Accueil</a>
				<a href="#about">A propos</a>
				<a href="deconnexion.php">Se deconnecter</a>
				<a href="inscription.php">S'inscrire</a>

			</nav>
		</div>

	 </header>

	<section class="containe-fluide banner">  

		<div class="ban">
			<img src="ban.jpg.jpg" alt="Banière du site">
		</div>
		<!--contenu de ma banière-->
		<div class="inner-banner">
			<h1>Bienvenue <?php echo $_SESSION['Nom_client']; ?></h1>
			<a class="btn btn-custom" href="#menu">Acceder au menu</a>
		</div>

	</section>
<!-- Services section -->
	<section id="what-we-do">
		<div class="container-fluid">
			<h2 id="menu" class="section-title mb-2 h1">Bienvenue ...</h2>
			
			<div class="row mt-5">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-1">
							<h3 class="card-title">Faire une réservation</h3>
							<p class="card-text">Réserver un livre de votre choix en un simple clique. </p>
							<a href="taab.php" title="Read more" class="read-more" >Réserver<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-2">
							<h3 class="card-title">Rendre un Livre</h3>
							<p class="card-text">Rendre un livre que vous avez emprunté.</p>
							<a href="emprunts.php" title="Read more" class="read-more" >Rendre<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-3">
							<h3 class="card-title">Catégories de livres</h3>
							<p class="card-text">Cliquez ici pour voir toutes les catégories de livres.</p>
							<a href="categories_livres.php" title="Read more" class="read-more" >Catégories<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-4">
							<h3 class="card-title">Historique de mes réservations</h3>
							<p class="card-text">Cliquer en bas pour afficher toutes vous activités.</p>
							<a href="historique_client.php" title="Read more" class="read-more" >Consulter<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-5">
							<h3 class="card-title">Livres non rendu</h3>
							<p class="card-text">Cliquez en bas pour consulter la liste de vous livres non rendu.</p>
							<a href="historique_client.php?id=5" title="Read more" class="read-more" >Consulter<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				

			</div>
		</div>	
	</section>
	<!-- /Services section -->
	<?php

	}

	else
		header("Location: connexion.php");


  ?>