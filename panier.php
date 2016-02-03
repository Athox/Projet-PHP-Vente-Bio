<?php session_start();

include("connection.php");

function ajouter_produit(){		
	$requete="SELECT * FROM PROJET.Produits WHERE product_id=".$_GET['product_id']."";
	$idcom= oci_connect('SYSTEM','root','localhost/XE');
        $stmt = oci_parse($idcom, $requete);
	$result=oci_execute($stmt);
	if(!$result){
		echo "Lecture impossible";
	}
	else{			
		if(!isset($_SESSION['panier'])){ 
			$_SESSION['panier'] = array(); 
		} 
		$produit=array();
	
		while($ligne=oci_fetch_assoc($stmt)){
			$new_fruit = array( 'id' => $ligne['PRODUCT_ID'],
								'name' => $ligne['NAME'] ,
								'description' => $ligne['DESCRIPTION'] ,
								'qte_max' => $ligne['QUANTITY_STOCK'] ,
								'prix' => $ligne['KILO_PRICE'] ,
								'qte_voulu' => $_GET['qte_voulu']);
		}
		
		for($i=0;$i<=count($_SESSION['panier']);$i++){
			if($_SESSION['panier'][$i]['id'] == $new_fruit['id']){
				$_SESSION['panier'][$i]['qte_voulu'] += $new_fruit['qte_voulu'];
				$is_add = true;
			}
		}
		
		if(!$is_add){
			array_push($_SESSION['panier'],$new_fruit);
		}
	}
	header("Location: http://localhost/Projet-PHP-Vente-Bio/index.php");
}

function afficher_panier(){
	if(isset($_SESSION['panier'])){ 
		foreach($_SESSION['panier'] as $produit){
			echo "<tr>";
			
			echo "<td class=valeur_prod>".$produit['name']."</td>";
			echo "<td class=valeur_prod>".$produit['description']."</td>";
			echo "<td class=valeur_prod>".$produit['qte_max']."</td>";
			  
			
			echo "<td class=valeur_prod>".$produit['prix']."</td>";
			echo "<td class=valeur_prod>".$produit['qte_voulu']."</td>";
			echo "<td><a href='panier.php?clean_id=".$produit['id']."' class=bouton_produit >Supprimer article</a></td>";
			echo "</tr>";
		}	
	}	
}

function cacul_prix_total(){
	$prix_total = 0;
	if(isset($_SESSION['panier'])){
		foreach($_SESSION['panier'] as $produit){
			$prix_total += $produit['prix']*$produit['qte_voulu'];
		}
	}
	return $prix_total;
}

function supprimer_produit(){
	for($i=0;$i<=count($_SESSION['panier']);$i++){
		if($_SESSION['panier'][$i]['id'] == $_GET['clean_id']){
			unset($_SESSION['panier'][$i]);
		}
	}
	header("Location: panier.php");
}
?>
<!DOCTYPE html>
<html>     
<head>         
	<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" />         
	<title>Les produits bios du pays</title>                
	<link href="style.css" rel="stylesheet" type="text/css">   
</head>         
<body> 
<?php
/*-----------------------------------------vider panier----------------------------------------------------------------*/
	if(isset($_GET['clean_all'])){
		$_SESSION['panier']=NULL;
		session_destroy();	
		header("Location: http://localhost/Projet-PHP-Vente-Bio/panier.php");
	}
/*-----------------------------------------supprimer un article--------------------------------------------------------*/
	if(isset($_GET['clean_id'])){
		supprimer_produit();
	}
/*-----------------------------------------ajouter un article--------------------------------------------------------*/
	if(isset($_GET['product_id']) && isset($_GET['qte_voulu'])){
		ajouter_produit();
	}
?>
<?php /*-----------------------------affichage panier-----------------------------*/?>

<div id="container">
<?php include("entete.php");?> 
<div id=box_panier class='box'>
<h2>Panier</h2>

<?php
	echo "<tr>";	
	echo "<table cellspacing='0' cellpadding='5' style='border-bottom:grey 1px solid;'>";
	echo "<th>Produit</th><th>Description</th><th>En stock</th><th>Prix à l'unité</th><th>Quantité</th><th></th>";
	echo "</tr>";	
	afficher_panier();
	echo "</table>";
	echo "<div id=prix_total><span>Prix total : </span><span id=panier_bouton style='color:red'>".cacul_prix_total()."</span>€</div>";
	echo "<div id=bouton_panier>";
	echo "<a href='panier.php?clean_all' class=bouton_produit >Vider le panier</a>";
	echo "<a href='validation_commande.php' class=bouton_produit >Valider les achats</a>";
	echo "</div>";
?>
</div>
</div>
</body>
</html>