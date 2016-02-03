<?php session_start();?> 

<!DOCTYPE html>
<html>     
<head>         
	<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" />         
	<title>Les produits bios du pays</title>                
	<link href="style.css" rel="stylesheet" type="text/css">   
	<script src="js/jquery.js" type="text/javascript"></script><!-- Insertion de la bibliotheque jQuery -->
</head>       
<body onload="animateMsg();"> 
<div id=container>
	<?php include("entete.php");?>
	<div class="box" style='width:500px;text-align:left;'>
		<h2>Inscription</h2>
		<?php
                
                 
			if(isset($_GET['erreur']) && $_GET['erreur'] == 40){
				echo "<div class='erreur_connect'>Emplacment vide</div>";
			}
			if(isset($_GET['erreur']) && $_GET['erreur'] == 42){
				echo "<div class='erreur_connect'>Adresse mail non valide</div>";
			}
			if(isset($_GET['erreur']) && $_GET['erreur'] == 41){
				echo "<div class='erreur_connect'>Mot de passe incorrect</div>";
			}
		?>
		<div class='cache'></div>
		<form action="valid_form.php" method="post">
			<div class='line' style='margin-top:50px;'>
				<div class='label'>nom</div>
				<input type="texte" name="obligatoire[]" value="<?PHP if(isset($_SESSION["obligatoire"][0]))echo $_SESSION["obligatoire"][0]?>"/>
			</div>
			<div class='line'>
				<div class='label'>prénom</div>
				<input type="texte" name="obligatoire[]" value="<?PHP if(isset($_SESSION["obligatoire"][1]))echo $_SESSION["obligatoire"][1]?>"/>
			</div>
			<div class='line'>
				<div class='label'>adresse email</div>
				<input type="texte" name="obligatoire[]" value="<?PHP if(isset($_SESSION["obligatoire"][2]))echo $_SESSION["obligatoire"][2]?>"/>
			</div>
			<div class='line'>
				<div class='label'>mot de passe</div>
				<input type="password" name="obligatoire[]" value="<?PHP if(isset($_SESSION["obligatoire"][3]))echo $_SESSION["obligatoire"][3]?>"/>
			</div>
			<div class='line'>
				<div class='label'>confirmation</div>
			<input type="password" name="obligatoire[]" value="<?PHP if(isset($_SESSION["obligatoire"][4]))echo $_SESSION["obligatoire"][4]?>"/>
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