<?php
    include('connexion.php');
	include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {
			$sql="INSERT INTO professionnels (nom,email,adresse,
			image,description,id_ville,id_categorie)
			 VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."', 
				'".mysqli_real_escape_string($link,$_POST['email'])."',
				'".mysqli_real_escape_string($link,$_POST['adresse'])."',
				'".$_FILES['image']['name']."',
				'".mysqli_real_escape_string($link,$_POST['description'])."',
				'".$_POST['idville']."',
				'".$_POST['idcategorie']."')";
	 //protection des variables
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Enrolement des professionnels</title>
</head>
<body>
	<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend> Enregistrez votre Entreprise</legend>					
						<div class="form-group">
							<label for="">NOM*</label>
							<input type="text" name="nom" class="form-control" id="" placeholder="Entrer le nom de votre entreprise"><br>
							<label for="">EMAIL*</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com" required >
							<label for="">Adresse*</label>
							<input type="text" name="adresse" class="form-control" id="" placeholder="votre adresse" required ><br>
							<label for="">Image*</label>
							<input name="image" type="file" class="form-control" id="" placeholder="image"><br>
							<label for="">selectionnez votre ville</label>
							<select name="idville" class="form-control"> 
							<?php
							$sqlville=" SELECT * FROM villes";
							$repville=mysqli_query($link,$sqlville);
							while ($dataV=mysqli_fetch_array($repville)) {
							?>
							<option value="<?php echo $dataV['id_ville']; ?>">
								<?php echo $dataV['id_ville'].'-'.$dataV['nom_ville']; ?>
							</option>
							<?php 
							}
							?>
						</select><br>
						<label for="">selectionnez votre catégorie</label>
							<select name="idcategorie" class="form-control"> 
							<?php
							$sqlcategorie=" SELECT*FROM categories";
							$repcategorie=mysqli_query($link,$sqlcategorie);
							while ($dataC=mysqli_fetch_array($repcategorie)) {
							?>
							<option value="<?php echo $dataC['id_categorie']; ?>">
								<?php echo $dataC['id_categorie'].'-'.$dataC['libelle']; ?>
							</option>
							<?php 
							}
							?>
						</select><br>
						<label for="">Description</label>
						<textarea type="text" name="description" class="form-control" id="" placeholder="Entrer votre description"> </textarea><br>
						<button type="submit" name="btnValider" class="btn btn-success">Valider</button>
						</div>																	
					</form>
				</div>
			</div>
	</div>



			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>nom</th>
							<th>adresse</th>
							<th>email</th>
							<th>Image</th>
							<th>villes</th>
							<th>categories</th>
							<th>description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
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
									 ";
								//	  die($list);
								$res=mysqli_query($link,$list);
								while ($data=mysqli_fetch_array($res)){							
						 	?>

						<tr>
							<td><?php echo $n; ?></td>
							<td><?php echo $data['nom'];?></td>
							<td><?php echo $data['email'];?></td>
							<td><?php echo $data['adresse'];?></td>
							<td><img src="upload/<?php echo $data['image'];?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['nom_ville'] ;?></td>
							<td><?php echo $data['libelle']; ?></td>
							<td><?php echo $data['description'] ;?></td>
							<td><a href="?id=<?php echo $data['id']; ?>">Modifier</a><a href="?id=<?php echo $data['id']; ?>"> supprimer</a></td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>

			</div>
	</div>

  	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>      

</body>
</html>