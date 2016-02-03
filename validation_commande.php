<?php 
	session_start();
	include("connection.php");
	function cacul_prix_total(){
		$prix_total = 0;
		if(isset($_SESSION['panier'])){
			foreach($_SESSION['panier'] as $produit){
                            $produit['prix']=str_replace(',','.',$produit['prix']);
				$prix_total += $produit['prix']*$produit['qte_voulu'];
			}
		}
		return $prix_total;
	}	
	if(isset($_SESSION["login"])){
            $idcom= oci_connect('SYSTEM','root','localhost/XE');
            $datetime=new DateTime();
            foreach($_SESSION['panier'] as $product){
                $requete="INSERT INTO PROJET.Statvente (product_id,client_id,date_vente,quantite) VALUES (".$product['id'].",".$_SESSION["login"][3].",TO_DATE('".
                        $datetime->format('Y\-m\-d\ h:i:s')."', 'yyyy/mm/dd hh24:mi:ss'),".$product['qte_voulu'].")";         
                $stmt = oci_parse($idcom, $requete);
                oci_execute($stmt);
                oci_commit($idcom);
			
				
            }            
            
		$devis=fopen("devis_".$_SESSION["login"][1]."_".date("d-m-Y").".txt","w+");
		fputs($devis,$_SESSION["login"][1]);
		fputs($devis,"\r\n");
		fputs($devis,date("d-m-Y"));
		fputs($devis,"\r\n");	
		fputs($devis,"\r\n");	
		foreach($_SESSION['panier'] as $product){
			fputs($devis,"\t".$product['name']."\t");
			fputs($devis,"\t".$product['qte_voulu']."\t");			
			fputs($devis,"\r\n");		
		}
		fputs($devis,"\r\n");	
		fputs($devis," Prix total: ");
		fputs($devis,cacul_prix_total());
		fputs($devis,"€");
		
		$sujet = 'Commande produit bio';
		$message = $devis;
		$destinataire = $_SESSION['login'][3];
		$headers = "From: \"Cuchet\"<vincent.cuchet@etu.univ-lyon1.fr>\n";
		$headers .= "Reply-To: vincent.cuchet@etu.univ-lyon1.fr\n";
		$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
		mail($destinataire,$sujet,$message,$headers);
		
		
		if(isset($_SESSION['panier'])){
                    $idcom= oci_connect('SYSTEM','root','localhost/XE');
			foreach($_SESSION['panier'] as $produit){
				$qte_stock=$produit['qte_max']-$produit['qte_voulu'];
				$requete="UPDATE  PROJET.produits SET quantity_stock=".$qte_stock." where product_id=".$produit['id'];
                              
				$stmt = oci_parse($idcom, $requete);
                                oci_execute($stmt);
                                oci_commit($idcom);
                                
				}
	
		}
		$_SESSION["panier"]=NULL;
		

		header("Location: http://localhost/Projet-PHP-Vente-Bio/panier.php");
	
	}else{
		header("Location: http://localhost/Projet-PHP-Vente-Bio/connect.php");
	}

?>