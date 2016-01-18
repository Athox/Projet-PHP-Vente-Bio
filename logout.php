<?php session_start();?> 
<!DOCTYPE html>
<html> 
<head>         
<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" />         
<title>Les produits bios du pays</title>                
<LINK href="style.css" rel="stylesheet" type="text/css">            

</head>         
<body>  
	<?php
		$_SESSION["login"]=NULL;
		session_destroy();
		header("Location: http://localhost/Projet-PHP-Vente-Bio/index.php");
		exit;
	
	?>  
</body> 
</html>