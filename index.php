<?php session_start();?> 
<!DOCTYPE html>
<html>     
<head>         
	<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" /> 
	<link href="style.css" rel="stylesheet" type="text/css">        
	<title>Les produits bios du pays</title>   
	<h1> BDKBSKBDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA </h1>
	
	<script src="js/jquery.js" type="text/javascript"></script><!-- Insertion de la bibliotheque jQuery -->
	<script type="text/javascript" src="js/localscroll/jquery.localscroll.js"></script>
	<script type="text/javascript" src="js/localscroll/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="js/lancement.js"></script><!-- permet le lancement de la fonction de scroll -->
</head>      
<body>                                  
<div id="container">
	<div id=fruits style='position:absolute;top:270px;'></div>
	<div id=legumes style='position:absolute;top:730px;'></div>
		
    <?php include("entete.php");?>
	<?php include("produit.php");?>
		
	
</div>                              
</body> 
</html>
