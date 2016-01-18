<?php session_start();?> 
<!DOCTYPE html>
<html> 
<head>         
<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" />         
<title>Les produits bios du pays</title>                
<LINK href="style.css" rel="stylesheet" type="text/css">            

</head>         
<body>  
<div id=container>
		<?PHP
		$co_client=array($_POST["identifiant"],$_POST["password"]);
		
                $idcom= oci_connect('SYSTEM','root','localhost/XE');
                
                
		$requete="SELECT name,first_name,mail FROM PROJET.Client WHERE name= '".$co_client[0]."'  and password='".$co_client[1]."'";
		$requete2="SELECT * FROM PROJET.Client WHERE name= '".$co_client[0]."'";
		//echo $requete;exit;
                $stmt = oci_parse($idcom, $requete);
                $stmt2= oci_parse($idcom, $requete2);
                $result = oci_execute($stmt);
                $result2 = oci_execute($stmt2);
		
		
		if(empty($co_client[0]) or empty($co_client[1])){
				header("Location: http://localhost/Projet-PHP-Vente-Bio/connect.php?erreur=45");
				exit;
				}
		
                                 
                $res=oci_fetch_assoc($stmt);
                $res2=oci_fetch_assoc($stmt2);
                
		if($res==null)
		{
                    
			if($res2== null){
				header("Location: http://localhost/Projet-PHP-Vente-Bio/connect.php?erreur=43");					
				exit;}
			header("Location: http://localhost/Projet-PHP-Vente-Bio/connect.php?erreur=44");				
			exit;
		}
		else{
                    $_SESSION["login"]=array();

                    $nbart=oci_num_rows($stmt);
                    foreach($res as $valeur){
                        array_push($_SESSION["login"],$valeur);
                    }
                }
                    header("Location: http://localhost/Projet-PHP-Vente-Bio/index.php");				
                    exit;
		
				
?>

				
				

</div>  
</body> 
</html>