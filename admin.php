<?php 
include ('connexion.php');
include ('menu.php');
 
 $msg="";
	if (isset($_POST['btnvalider'])){

		$sql="INSERT INTO categories (libelle_cate,description_cate) 
		    VALUES ('".$_POST['libelle_cate']."',
		    '".$_POST['description_cate']."')";
		$result=mysqli_query($link,$sql);
		if ($result){
		  $msg='insertion reussite';
		}else{
			$msg=mysqli_error($link);
		}
	}

	if (isset($_GET['id'])){
		$update="SELECT * FROM categories WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM categories WHERE id=".$_GET['sup'];
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
			<legend>enregistrement de la categorie de site </legend>
	           <span> <?php echo $msg; ?></span>
			<div class="form-group">
               <label for=""> libelle</label> <input type="text" name="libelle_cate" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['libelle_cate']; ?>"  placeholder="">
           </div>
           <div class="form-group">
               <label for=""> description</label > <textarea type="text" name="description_cate" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['description_cate']; ?>"  placeholder=""> </textarea> 
           </div>

		 <input type="submit" class="btn btn-block btn-lg btn-success" id="btnvalider" value="valider" name="btnvalider">
		</form>

	<div class="row">
		
			<table class="table">

				<thead>
					<tr>
						<th> numero</th>
					
						<th> libellé categories</th>
						<th> descripition de la categorie</th>
						<th> action</th>
					</tr>
				</thead>
				
				<tbody>
                      <?php 
							$n=1;
							$list=" SELECT * FROM categories";
							$res= mysqli_query($link,$list);
	                       while ($data = mysqli_fetch_array($res)){
				       ?>
					<tr>
							<td><?php echo $n;?></td>
							<td><?php echo $data['libelle_cate']; ?></td>
							<td><?php echo $data['description_cate']; ?></td>
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