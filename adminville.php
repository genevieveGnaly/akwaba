<?php 
include ('connexion.php');
include ('menu.php');
 
 $msg="";
	if (isset($_POST['btnvalider'])){

		$sql="INSERT INTO villes (nom_ville) 
		    VALUES ('".$_POST['nomville']."')";
		$result=mysqli_query($link,$sql);
		if ($result){
		  $msg='insertion reussite';
		}else{
			$msg=mysqli_error($link);
		}
	}

	if (isset($_GET['id'])){
		$update="SELECT * FROM villes WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM villes WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container" style="margin-top: 10px;">
     <div class="col-sm-6 col-sm-offset-3 form2">
 
		<form role=form action="" name="form1" method="Post">
			<legend>enregistrement de la ville </legend>
	           <span> <?php echo $msg; ?></span>
			<div class="form-group">
               <label for="">nom de la ville</label> <input type="text" name="nomville" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['nomville']; ?>"  placeholder=" entrer le nom de la ville de votre sit touristique">
           </div>

		 <input type="submit" class="btn btn-block btn-lg btn-success" id="btnvalider" value="valider" name="btnvalider">
		</form>

	<div class="row">
		
			<table class="table">

				<thead>
					<tr>
						<th> numero</th>
					   <th>nom de la ville</th>
						<th> action</th>
					</tr>
				</thead>
				
				<tbody>
                      <?php 
							$n=1;
							$list=" SELECT * FROM villes";
							$res= mysqli_query($link,$list);
	                       while ($data = mysqli_fetch_array($res)){
				       ?>
					<tr>
							<td><?php echo $n;?></td>
							<td><?php echo $data['nom_ville']; ?></td>
							<td><a href="?id=<?php echo $data['id']; ?>">modifier</a> <a href="?id=<?php echo $data['id']; ?>"> suprimer</a></td>
							
					</tr>
		                 <?php 
						$n++;
					    }
					    ?>
					</tbody>
				</table>
	
</div>

</div>	

</body>
</html>