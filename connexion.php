<?php 
//nom de l'hôte
	$host="localhost";
	//nom de l'utilisateur
	$user="root";
	//mot de passe de l'utilisateur
	$mdp="";
	//nom de la base de données
	$db="db_akwaba";
	//lien de connexion
	$link=mysqli_connect($host,$user,$mdp);
	mysqli_select_db($link,$db);
 ?>