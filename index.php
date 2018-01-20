<?php //lancer la session
session_start();
include('connexion.php');
$msg='';
 ?>
 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
 	<title>Akwaba in Côte d'Ivoire</title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	<div class="container-fluid">
 		<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
 			<div class="navbar-header">
 				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
 					<span class="sr-only">MENU</span>
				    <span class="icon-bar"></span>
		 		    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
				<a href="accueil.php">
				   <img class="navbar-brand" src="img/logo1.png" alt="logo">
				</a>
 			</div>
 			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 				<ul class="nav navbar-nav navbar-right">
 					<li><a href="#" role="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><h4>S'ABONNER</h4></a></li>
 					<li class="active"><a href="visiteur.php"><h4>VISITEURS</h4></a></li>
 					<li><a href="professionnels.php"><h4>PROFESSIONNELS</h4></a></li>
 					<li><a href="phototeque.php"><h4>PHOTOTHEQUE</h4></a></li>
 				</ul>
 			</div>
 		</nav>

 		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">
							<h3>S'ABONNER AU SITE</h3>
						</h4>
						
					</div>
					<div class="modal-body">
						<form role="form" action="" name="form1" method="Post">
							<div class="form-group">
								<label>NOM:</label>
								<input type="nom" class="form-control" name="nom" placeholder="Entrez votre nom" required=""><br>
								<label>PRENOM:</label>
								<input type="prenom" class="form-control" name="prenom" placeholder="Entrez votre prenom" required=""><br>
								<label>EMAIL:</label>
								<input type="email" class="form-control" name="email" placeholder="Entrez votre email" required=""><br>
								<label>MOT DE PASSE:</label>
								<input type="password" class="form-control" name="password" placeholder="choisissez-en" required=""><br>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
 		<div class="wrapper">
			<div class="lead">
				<h1>AKWABA EN CÔTE D'IVOIRE</h1>
				<h2>ENVIE DE VISITER?</h2>
				<h3>SUIVEZ NOUS</h3>
			</div>
		</div><br>
		<div class="row">
			<div class="container-fluid container1">
				<div class="row">
				  <div class="col-md-4 col-xs-12">
				    <div class="thumbnail">
				      <img class="image1" src="img/tourisme2.jpeg" alt="image">
				      <div class="caption">
				        <h4>La carte touristique</h4>
				        <p>Vous avez beaucoup à découvrir dans notre beau pays, <strong>culture</strong>, <strong>nature</strong>, <strong>détente</strong>... </p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-success" role="button">Je veux vistiter</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4 col-xs-12">
				    <div class="thumbnail">
				      <img class="image1" src="img/basilique3.jpeg" alt="image">
				      <div class="caption">
				        <h4>YAMOUSSOUKRO: La basilique</h4>
				        <p>Faites un tour à la <strong>capital politique</strong> de notre pays et visitez cette belle basilique </p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-success" role="button">Je veux vistiter</a></p>
				      </div>
				    </div>
				  </div>
				
			
				  <div class="col-md-4 col-xs-12">
				    <div class="thumbnail">
				      <img class="image1" src="img/cascade.jpeg" alt="image">
				      <div class="caption">
				        <h4>MAN:La cascade</h4>
				        <p>Faites un tour à l'<strong>ouest</strong> de notre pays et visitez la cascade et plus encore... </p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-success" role="button">Je veux vistiter</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4 col-xs-12">
				    <div class="thumbnail">
				      <img class="image1" src="img/man.jpeg" alt="image">
				      <div class="caption">
				        <h4>MAN:Le pont de liane</h4>
				        <p>Après<strong>la cascade</strong>, nous vous conduisons au <strong>pont de liane</strong> une oeuvre DIVINE.</p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-success" role="button">Je veux vistiter</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4 col-xs-12">
				    <div class="thumbnail">
				      <img class="image1" src="img/plagee.jpeg" alt="image">
				      <div class="caption">
				        <h4>ASSANIE:Les belles plages</h4>
				        <p><strong>Assinie Mafia</strong> et ses <strong>plages paradisiaques</strong> faites-y un tour, vous allez adorer.</p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-success" role="button">Je veux vistiter</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4 col-xs-12">
				    <div class="thumbnail">
				      <img class="image1" src="img/artisanat.jpeg" alt="image">
				      <div class="caption">
				        <h4>BASSAM:Nos talentueux <strong>Artisans</strong></h4>
				        <p>En plus de ses <strong>belles plages</strong>, découvrez de <strong>magnifiques oeuvres d'Art</strong>.</p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-success" role="button">Je veux vistiter</a></p>
				      </div>
				    </div>
				  </div>
		</div>
		<div class="footer">
	 		<img src="img/logo1.png" style="height: 100px;">
		  <div class="footer-links">
		    <a href="#"><i class="fa fa-instagram"></i></a>
		    <a href="#"><i class="fa fa-facebook"></i></a>
		    <a href="#"><i class="fa fa-twitter"></i></a>
		  </div>
		</div>
 	</div>
 	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
 </body>
 </html>