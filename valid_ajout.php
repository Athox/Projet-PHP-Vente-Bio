<?php
	include("connection.php");
	
	$ajout=array($_POST["produit"][0],$_POST["produit"][1],$_POST["produit"][2],$_POST["produit"][3]);
	$fruit=0;
	if(isset($_POST['is_fruit'])){
		$fruit=true;
	}
	
	$idcom=connex("p1306716","Myparam");
	
	$requete="INSERT INTO produits(name,description,quantity_stock,kilo_price,fruit) VALUES ('".$_POST['produit'][0]."','".$_POST['produit'][1]."',".$_POST['produit'][2].",".$_POST['produit'][3].",".$fruit.");";
	
	mysql_query($requete,$idcom);
	mysql_close();
	header("Location: http://localhost/Projet-PHP-Vente-Bio/page_admin.php");
	exit;


?>

