<?php
include('connexion.php');
$msg="";
if (isset($_POST['btnSubmit'])){
		$sql= "INSERT INTO commentaires (description, id_articles) VALUES('".$_POST['description']."','".$_GET['id']."')";
		$result=mysqli_query($link, $sql);
		if ($result) {
			$msg='Commentaire ajouté';
		}else{
			$msg=mysqli_error($link);
		}
	}
?>
<!DOCTYPE html>
<html>
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
 		<?php 
			if (isset($_GET['id'])){
			$list=" SELECT 
										nom,
										email,
										adresse,
										image,
										villes.nom_ville,
										categories.libelle,
										professionnels.description
									FROM professionnels INNER JOIN villes ON 
									villes.id_ville=professionnels.id_ville
									INNER JOIN categories
									ON categories.id_categorie=professionnels.id_categorie
				WHERE professionnels.id=".$_GET['id'];
				$res=mysqli_query($link,$list);
				$data=mysqli_fetch_array($res);
		?>
 		<div class="row">
			<img class="image" src="upload/<?php echo $data['image']; ?>">
		</div>
		
		<?php echo $data['nom_ville']; ?></h2>
		<p><?php echo $data['description']; ?></p>
		<span class="">Catégorie:<?php echo $data['libelle']; ?></span>
		<?php 
	}
	 ?>
		<form action="" method="POST" role="form">
			<label><h4>COMMENTAIRES</h4></label>
			<textarea type="text" name="description" class="form-control" id="commentaires" placeholder="Entrez votre commentaire"></textarea>
			<button type="submit" class="btn btn-lg btn-info" id="btnSubmit" name="btnSubmit">Ajouter</button>
		</form><br><br>
		<h3>AUTRES COMMENTAIRES</h3>
		<?php 
		if (isset($_GET['id'])) {
			$n=1;
			$list="SELECT 
		s	id_pofessionnels,
			description
			FROM commentaires WHERE id_professionnels=".$_GET['id'];

			$res=mysqli_query($link,$list);

			while ($data=mysqli_fetch_array($res)){
		 	# code...
		  ?>
		 <h5>
		 	N°<?php echo $n; ?>: <?php echo $data['description']; ?>
		 </h5>
		 <?php 
		 $n++; }
		}
		 ?>
		
	</div>
</body>
</html>
