<?php 
//session_start();
// $host ="localhost " cest le serveur
$host="localhost";
// de l'utilsateur
$user="root";
//mot de passe
$mdp="";
// Nom de la base d donnéé
$db="db_akwaba";
//lien de connexion
$link=mysqli_connect($host,$user,$mdp);
mysqli_select_db($link,$db);
// $link est la liaison 

 ?>