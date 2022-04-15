<?php include "gestion.php" ;
$gestion = new Gestion();
$data = $gestion->afficherlesproduitPopuler()
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery Immersive Slider Example</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="jquery.immersive-slider.js"></script>
<link href='immersive-slider.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main">
<div class="page_container">

<div id="immersive_slider">

<?php foreach($data as $value){ ?>

<div class="slide" data-blurred="img/slide3_blurred.jpg">
<div class="content">
<h2><a href="#" target="_blank"><?=  $value->getName() ?></a></h2>
<p>It’s never been easier to watch YouTube on the big screen
              Send your favorite YouTube videos from your Android phone or tablet to TV with the touch of a button. It’s easy. No wires, no setup, no nothing. Find out more here.</p>
</div>
<div class="image"> <a href="#" target="_blank"><img src="<?php echo 'img/' .$value->getPhoto(); ?>" alt="Slider 1"></a> </div>
</div>
<?php } ?>
<a href="#" class="is-prev">&laquo;</a> <a href="#" class="is-next">&raquo;</a> </div>

</div>
</div>
</div>
<script type="text/javascript">
  	  $(document).ready( function() {
  	    $("#immersive_slider").immersive_slider({
  	      container: ".main"
  	    });
  	  });

    </script> 
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>