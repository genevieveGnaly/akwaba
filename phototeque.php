<?php 
include('connexion.php');

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
 		<nav class="navbar navbar-default" role="navigation">
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
 					<li><a href="accueil.php"><h4>VISITEURS</h4></a></li>
 					<li><a href="professionnels.php"><h4>PROFESSIONNELS</h4></a></li>
 					<li><a href="phototeque.php"><h4>PHOTOTHEQUE</h4></a></li>
 				</ul>
 			</div>
 		</nav>
 		<?php 
			$n=1;
			$list=" SELECT *
				FROM professionnels" ;#table de base de données
				
				$res=mysqli_query($link,$list);
				while ($data = mysqli_fetch_array($res)){
			?>
			<div class="container-fluid container1">
				<div class="row">
				  <div class="col-md-4">
				    <div class="thumbnail">
				      <img class="image1" src="upload/<?php echo $data['image']; ?>" alt="image">
				      
				    </div>
				  </div>
				  <?php $n++; 
					} ?>
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
 
 </body>
 </html>