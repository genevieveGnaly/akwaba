<?php include('connexion.php');
	include('menu.php');
$msg="";
if (isset($_POST['btnValider'])){
	$sql="INSERT INTO categories (libelle,description) VALUES 
	('".mysqli_real_escape_string($link,$_POST['libelle'])."',
	'".mysqli_real_escape_string($link,$_POST['description'])."')";
		$result=mysqli_query($link,$sql);
		if ($result){
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
} ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 form2">
				<form role="form" action="" name="form1" method="Post">
					<legend class="titre">FORMULAIRE DE CATEGORIE</legend>
					<span> <?php echo $msg; ?></span>
					<div class="form-group">
						<label>LIBELLE:</label>
						<input type="text" name="libelle" class="form-control" placeholder="Entrez le libellé"><br>
						<label>DESCRIPTION:</label>
						<br><textarea type="text" name="description" class="form-control" id="description" placeholder="Entrez la description"></textarea><br>
						<button type="submit" class="btn btn-success" id="btnValider" name="btnValider">Enregistrer</button>
					</div>
				</form>
				<div class="row">
					<table class="table">
							<tr>
								<td>Numéro</td>
								<td>Libelle</td>
								<td>Description</td>
								<td>Action</td>
							</tr>
						<tbody>
							<?php 
							$n=1;
							$list=" SELECT*FROM categories";
							$res=mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)) {
							 ?>
							<tr>
								<td> <?php echo $n; ?></td>
								<td> <?php echo $data['libelle'] ?></td>
								<td><?php echo $data['description'] ?></td>
								<td></td>
							</tr>
							<?php $n++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>