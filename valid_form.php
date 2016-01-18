
<!DOCTYPE html>
<html>     
<head>         
<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" />         
<title>Les produits bios du pays</title>                
<LINK href="style.css" rel="stylesheet" type="text/css">            

</head>         
	<body>  
		<div id=container>
			<?php include("entete.html");?>
				<?PHP
					$auteur=array('Nom','prenom','email','Mot de passe','verif');
					$titre=array($_POST["obligatoire"][0],$_POST["obligatoire"][1],$_POST["obligatoire"][2],$_POST["obligatoire"][3],$_POST["obligatoire"][4]);
						
					 
						foreach($_POST["obligatoire"] as $lfg ){
							if(empty($lfg)){
								header("Location: http://localhost/Projet-PHP-Vente-Bio/inscription.php?erreur=40");
								exit;
							}
						}
						if(!filter_var($titre[2],FILTER_VALIDATE_EMAIL)){
							header("Location: http://localhost/Projet-PHP-Vente-Bio/inscription.php?erreur=42");
							exit;						
						}
						if($_POST["obligatoire"][4]!= $_POST["obligatoire"][3]){
							header("Location: http://localhost/Projet-PHP-Vente-Bio/inscription.php?erreur=41");
						exit;
						}			
						$requete="INSERT INTO Client (name,first_name,mail,password) VALUES ('".$titre[0]."','".$titre[1]."','".$titre[2]."','".$titre[3]."')";
						$idcom= oci_connect('SYSTEM','root','localhost/XE');
                                                $stmt = oci_parse($idcom, $requete);
                                                oci_execute($stmt);
                                                oci_commit($idcom);
						echo "<div id=formuaire_valid>";
						echo "<script type='text/javascript'>window.alert('Bienvenue sur notre site ".$titre[0]." ".$titre[1]."');</script>";
						header("Location: http://localhost/Projet-PHP-Vente-Bio/index.php");
						exit;
						echo "</div>";
						
			?>
		</div>  
	</body> 
</html>