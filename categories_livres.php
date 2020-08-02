<?php

 session_start();
  ?>
<link href="css/menu.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet"  href="bootstrap-theme.min.css">
	<link rel="stylesheet"  href="style.css">

<!------ Include the above in your HEAD tag ---------->
<header class="containe-fluide header"> 

		<div class="container">
			<a href="#" class="logo">Mon profil</a>
			<nav class="menu">
				<?php   if ($_SESSION['Previlege']==1) { ?>
			<a href="accueil_administrateur.php">Accueil</a>
                
              <?php  }  else { ?>
               <a href="accueil_client.php">Accueil</a>
            <?php } ?>
				
				<a href="#about">A propos</a>
				<a href="connexion.php">Se connecter</a>
				<a href="inscription.php">S'inscrire</a>

			</nav>
		</div>

	 </header>

	
<!-- Services section -->
<!-- Services section -->
<form method="POST" action=" ">
	<section id="what-we-do">
		<div class="container-fluid">
			<h2 id="menu" class="section-title mb-2 h1">Bienvenue ...</h2>
			
			<div class="row mt-5">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-1">
							<h3 class="card-title">Romanesque</h3>
							<p class="card-text">Consulter les meilleurs romans de l'histoire. </p>
							<a href="livre_categorie.php?id=1" title="Read more" class="read-more" >Romanesque.	<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-2">
							<h3 class="card-title">Poésie</h3>
							<p class="card-text">Consulter les meilleurs livres de poémes.</p>
							<a href="livre_categorie.php?id=2" title="Read more" class="read-more" >Poésie.<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-3">
							<h3 class="card-title">Théâtre</h3>
							<p class="card-text">Consulter les meilleurs pièces théâtrales.</p>
							<a href="livre_categorie.php?id=3" title="Read more" class="read-more" >Théâtre.<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-4">
							<h3 class="card-title">Écrit religieux</h3>
							<p class="card-text">Consulter les écrits religieux.</p>
							<a href="livre_categorie.php?id=4" title="Read more" class="read-more" >écrits religieux.<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-5">
							<h3 class="card-title">Argumentation</h3>
							<p class="card-text">Consulter les meilleurs livres argumantatifs.</p>
							<a href="livre_categorie.php?id=5" title="Read more" class="read-more" >Argumentatif.<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-6">
							<h3 class="card-title">Histoires</h3>
							<p class="card-text">Consulter les meilleurs livres d'histoire.</p>
							<a href="livre_categorie.php?id=6" title="Read more" class="read-more" >Histoire.<i class="fa fa-angle-double-right ml-2"></i></a>
						</div>
					</div>
				</div>

			</div>
		</div>	
	</section>


	<!-- /Services section -->

	