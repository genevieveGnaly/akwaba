<?php 
include('connexion.php');
$msg='';
if (isset($_POST['btnValider'])){
	$sql="INSERT INTO visiteurs (nom,prenom,email,password) 
	VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."',
			'".mysqli_real_escape_string($link,$_POST['prenom'])."',
			'".mysqli_real_escape_string($link,$_POST['email'])."',
			'".mysqli_real_escape_string($link,md5($_POST['password']))."')";
		$result=mysqli_query($link,$sql);
		if ($result){
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
} ?>
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
 					<li><a href="professionnels.php"><h4>PROFESSIONNELS</h4></a></li>
 					<li><a href="phototeque.php"><h4>PHOTOTHEQUE</h4></a></li>
 				</ul>
 			</div>
 		</nav>
 		<!-- code pour afficher la fenetre d'abonnement -->
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
								<button type="submit" class="btn btn-block btn-warning" id="btnValider" name="btnValider">Enregistrer</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- fin -->
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
				      <div class="caption">
				        <h4><?php echo $data['nom'] ?>
				        	<?php echo $data['adresse'] ?>
				        </h4>
				        <p><?php echo $data['description'] ?></p>
				        <p><a href="article.php?id=<?php echo $data['id']; ?>" class="btn btn-info" role="button">Lire cet article</a></p>
				      </div>
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
 	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
 </body>
 </html>