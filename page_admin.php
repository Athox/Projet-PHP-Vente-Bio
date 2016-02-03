<?php session_start();?>
<!DOCTYPE html>
<html>     
<head>         
	<meta http-equiv="Content-type" content= "text/html;charset=UTF-8" /> 
	<link href="style.css" rel="stylesheet" type="text/css"> 
	<script src="js/jquery.js" type="text/javascript"></script><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>  
        
	<title>Les produits bios du pays</title>                
</head> 

<body>
	<div id=container>
		 <?php include("entete.php");
                 ?>
		<div class='box'  style='width:800px; '>
			<h2>Ajout de produit</h2>
			<table cellspacing='0' cellpadding='5'>
				<tr>	
					<th>Nom</th><th>Description</th><th>Stock</th><th>Prix</th><th>Fruit</th><th></th>
				</tr>
				<tr>
					<form action="valid_ajout.php" method="post">
						<?php
							for($i=0;$i<4;$i++){								
								echo"<td><input type='texte' name='produit[]' style='width:150px;'/></td>";							
							}
							echo "<td><input type='checkbox' name='is_fruit' value='yes' style='width:50px;'/></td>";
						?>
				</tr>
			</table>
						<input class='bouton_produit' type="submit" value="Valider" style="width:100px;"/>
						<input class='bouton_produit' type="reset" value='Annuler' style="width:100px;"/>
					</form>
				
		</div>
            <div class='box'  style='width:800px; '>
                <h2>Statistiques</h2>
                <div id="myfirstchart" style="height: 250px;"></div>
                <div id="bar-example"></div>   
                <div id="donut-example"></div>
                <div id="area-example"></div>
            </div>
        </div>
    
</body>
</html>
<script>
    new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
Morris.Bar({
  element: 'bar-example',
  data: [
    { y: '2006', a: 100, b: 90 },
    { y: '2007', a: 75,  b: 65 },
    { y: '2008', a: 50,  b: 40 },
    { y: '2009', a: 75,  b: 65 },
    { y: '2010', a: 50,  b: 40 },
    { y: '2011', a: 75,  b: 65 },
    { y: '2012', a: 100, b: 90 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});
Morris.Donut({
  element: 'donut-example',
  data: [
    {label: "Download Sales", value: 12},
    {label: "In-Store Sales", value: 30},
    {label: "Mail-Order Sales", value: 20}
  ]
});
Morris.Area({
  element: 'area-example',
  data: [
    { y: '2006', a: 100, b: 90 },
    { y: '2007', a: 75,  b: 65 },
    { y: '2008', a: 50,  b: 40 },
    { y: '2009', a: 75,  b: 65 },
    { y: '2010', a: 50,  b: 40 },
    { y: '2011', a: 75,  b: 65 },
    { y: '2012', a: 100, b: 90 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});

</script>
