<?php 

include "gestion.php";
$gestion = new Gestion();


$data = $gestion->getTotalAjoutProduitAuPanier();
$chart_data= '';

 foreach($data as $value){ 

 $chart_data .= "{ Produit:'". $value['nom_produit']."',numbre:".$value['total']."}, ";
}

?>


<!DOCTYPE html>
<html>
 <head>
 
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">

   <h3 align="center">Total d'ajouter un produit au  panier</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Produit',
 ykeys:['numbre', ],
 labels:['numbre'],
 hideHover:'auto',
 stacked:true
});
</script>