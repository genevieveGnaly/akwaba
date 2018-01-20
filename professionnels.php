
<?php
      include('connexion.php');
      date_default_timezone_get('UTC');
      include('menu.php');
	   $msg="";
	if (isset($_POST['btnValider'])){
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {
			$sql= "INSERT INTO professionnels (nom,email,adresse,
			image,id_ville,id_cate,description)
			 VALUES ('".($_POST['nom'])."',
			 		'".($_POST['email'])."',
			 		'".($_POST['adresse'])."',
			 		'".($_FILES['image']['name'])."',
			 		'".($_POST['nomville'])."',
			 		'".($_POST['libellecate'])."',
			 		'".($_POST['description'])."')" ; //protection des variable
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}else{
		echo "string";
	}

	}
 ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container">

			<div class="row">

				<div class="col-md-3"></div>
				<div class="col-md-3">

					<form action="" method="POST" role="form " enctype="multipart/form-data">
						<legend> enregistrez vos sites</legend>
					<?php echo $msg; ?>
						<div class="form-group">
							<label for="">NOM</label>
							<input type="text" name="nom" class="form-control" id="" placeholder="Entrer le nom">
						</div>
						<div class="form-group">
							<label for="">EMAIL*</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com" required >
						</div>
						<div class="form-group">
							<label for="">Adresse</label>
							<input type="text" name="adresse" class="form-control" id="" placeholder="votre adresse" required >
						</div>
						<div class="form-group">
							<label for="">Image</label>
							<input name="image" type="file" class="form-control" id="" placeholder="image">
						</div>
						<!-- selection de la ville-->
						<div class="form-group">
							<label for="">selection de la ville de votre site</label>
							<select name="nomville" class="form-control" placeholder="Selectionner la ville">
					<?php
					
					$sqlville="SELECT * FROM villes";
					$repville=mysqli_query($link,$sqlville);
					while ($dataville=mysqli_fetch_array($repville)) {
					?>
					<option value="<?php echo $dataville['id_ville'];?>">
					<?php echo $dataville['id_ville'].'-'.$dataville['nom_ville'];?>
					</option>
					<?php
					}
					?>
					</select>
							<!-- selection de la categorie -->
						</div>
						<div class="form-group">
							<label for="">Categories</label>
							<select name="libellecate" class="form-control" placeholder="Selectionner la catedorie">
					<?php
					$sqlcategorie="SELECT * FROM categories";
					$repcategorie=mysqli_query($link,$sqlcategorie);
					while ($datacat=mysqli_fetch_array($repcategorie)) {
						?>
					<option value="<?php echo $datacat['id_cate'];?>">
					<?php echo $datacat['id_cate'].'-'.$datacat['libelle_cate'];?>
					</option>
					<?php
					}
					?>
					</select>

					<div class="form-group">
					<label for="">la descrition de votre site touristique</label>
					<textarea type="text" name="description" class="form-control" id="" placeholder="decrivez votre site touristique"> </textarea>
						</div>
					<button type="submit" name="btnValider" class="btn btn-success">Valider</button>
						
				</form>

				</div>
			

			</div>

			</div>

				<div class="col-md-2"></div>

			</div><br>


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

					</thead	>		
						<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										nom,
										email,
										adresse,
										image,
										villes.nom_ville,
										categories.libelle_cate,
										description
									FROM professionnels
								 INNER JOIN villes ON villes.id_ville=professionnels.id_ville
									INNER JOIN categories
									ON categories.id_cate=professionnels.id_cate
									 ";
									//die($list);
							$res= mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)){
								
								
						 ?>

						<tr>
							<td><?php echo $n;?></td>
							<td><?php echo $data['nom'];?></td>
							<td><?php echo $data['email'];?></td>
							<td><?php echo $data['adresse'];?></td>
							<td><img src="upload/<?php echo $data['image'];?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['nom_ville'];?></td>
							<td><?php echo $data['libelle_cate'];?></td>
							<td><?php echo $data['description'];?></td>
							<td><a href="?id=<?php echo $data['id']; ?>">Modifier</a> <a href="?id=<?php echo $data['id']; ?>"> supprimer</a></td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>

			</div>



		</div>
	</div>

        

</body>
</html>