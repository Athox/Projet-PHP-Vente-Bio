<?php
	include("connection.php");
	
	$ajout=array($_POST["produit"][0],$_POST["produit"][1],$_POST["produit"][2],$_POST["produit"][3]);
	$fruit=0;
	if(isset($_POST['is_fruit'])){
		$fruit=true;
	}
	
        $idcom= oci_connect('SYSTEM','root','localhost/XE');

        $requete1='select max(ROWNUM) as "res" from PROJET.Produits';
        $stmt1 = oci_parse($idcom, $requete1);
        oci_execute($stmt1);
        $res=  oci_fetch_assoc($stmt1);
        
        
        
        $requete="INSERT INTO PROJET.Produits (product_id,name,description,quantity_stock,kilo_price,fruit) VALUES (".($res['res']+1).",'".$_POST['produit'][0]."','".$_POST['produit'][1]."',".$_POST['produit'][2].",".$_POST['produit'][3].",".$fruit.")";
        $stmt = oci_parse($idcom, $requete);
        oci_execute($stmt);
        oci_commit($idcom);
        
	header("Location: http://localhost/Projet-PHP-Vente-Bio/page_admin.php");
	exit;


?>

