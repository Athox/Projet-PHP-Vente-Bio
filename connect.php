<?php session_start();?> 
<!DOCTYPE html>
<html>     
<head>         
	<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" /> 
	<link href="style.css" rel="stylesheet" type="text/css"> 
	<script src="js/jquery.js" type="text/javascript"></script><!-- Insertion de la bibliotheque jQuery -->       
	<title>Les produits bios du pays</title>                
</head>         
<body onload="animateMsg();">                                  
<div id=container>
	 <?php include("entete.php");?>
	<div class="box" style='width:500px;text-align:left;'>
		<h2>Connexion</h2>
                    <?php 
                    if(isset($_GET['erreur']) && $_GET['erreur'] == 45){
                            echo "<div class=erreur_connect>Champ vide</div>";
                    }
                    if(isset($_GET['erreur']) && $_GET['erreur'] == 43){
                            echo "<div class=erreur_connect>Veuillez vous inscrire</div>";
                    }
                    if(isset($_GET['erreur']) && $_GET['erreur'] == 44){
                            echo "<div class=erreur_connect>Mot de passe incorrect</div>";
                    }
                    ?>
		<div class='cache'></div>
		<form action="valid_connec.php" method="post">
			<div class='line' style='margin-top:50px;'>
				<div class='label'>nom</div>
				<input type="texte" name="identifiant" value="<?PHP if(isset($_SESSION["identifiant"]))echo $_SESSION["identifiant"]?>"><br>
			</div>
			<div class='line'>
				<div class='label'>mot de passe</div>
				<input type="password"name="password"value="<?PHP if(isset($_SESSION["password"]))echo $_SESSION["password"]?>"><br />
			</div>
			<div class='line' style='text-align:center;margin:50px 0;'>
				<input class='bouton_produit' type="submit" value="Valider" style="width:100px;"/>
				<input class='bouton_produit' type="reset" value='Annuler' style="width:100px;"/>
			</div>
		</form>
	</div>
</div>
<script>
function animateMsg(){
	if($('.erreur_connect').lenght != 0){
		$('.erreur_connect').animate({"right":"-4px"},"slow");
		var x = setTimeout(function(){$('.erreur_connect').animate({"right":"-235px"},"slow");clearTimeout(x);}, 3000);
	}
}
</script>                          
</body> 
</html>
