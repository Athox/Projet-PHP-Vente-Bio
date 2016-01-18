<div id=header>
	<nav>
		<table cellspacing='0' cellpadding='5' style='padding:10px 50px;'>
			<tr>
				 <td><a href="index.php#container">Accueil</a></td>
				 <td><a href="index.php#fruits">Fruits</a></td>
				 <td><a href="index.php#legumes">Légumes</a></td>
				 <td><a href="inscription.php">Inscritpion</a></td>
				 <td><a href="connect.php">Connexion</a></td>
				 <td><a href="panier.php">Panier</a></li> 
				<?php
					
					if(isset($_SESSION["login"])){
						echo"<td id=si_connecter>";
						echo "<div>".$_SESSION["login"][0]." ".$_SESSION["login"][1]."</div><div><a href='logout.php'>deconnexion</a></div>" ;
						echo"</td>";
					}		
				?>				 
			</tr>
		</table> 
	<?php 
		if(isset($_SESSION["login"])&& $_SESSION["login"][0]=='Admin'){
			
			echo "<a href='page_admin.php'class=bouton_produit style='border-radius:0px;border-bottom-right-radius:10px; position:fixed;'>page admin</a>";			
		}
	
	?>
	</nav> 
	<img id=image_entete src="images/entete.jpg" alt="" />
	
</div>