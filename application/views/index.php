<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KepoAbiscom - Always Make You Curious">
    <meta name="keywords" content="{meta_tag}"> 
   	<meta property="og:title" content="{title}"/>
	<meta property="og:url" content="{url}"/>
	<meta property="og:image" content="{og_image}"/>
    <link rel="icon" href="<?php echo base_url('favicon.png'); ?>">
    

    <title>{site_name} &trade; - {title}</title>

    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<style>
		body{
			background-color:rgba(17,183,152,0.5); background: url('<?php echo base_url('assets/img/background.jpg'); ?>') no-repeat center top; background-size: 150%; background-attachment: fixed;
		}
		
		#navigation ul li {
			font-weight: bold;
		}
		
		#navigation ul li.active{
			border-bottom: 3px solid #555;
		}
		
		#navigation ul ul li a {
			background-color: #ffffff;
		}
		
		#page-title {
			-moz-border-bottom-colors: none;
			-moz-border-left-colors: none;
			-moz-border-right-colors: none;
			-moz-border-top-colors: none;
			background: rgb(135, 0, 0) none repeat scroll 0px 0px; width: 1343px; float: left; display: block;
			border-color: #03db21 -moz-use-text-color;
			border-image: none;
			border-style: solid none;
			border-width: 1px medium;
			margin-top: -1px;
		}
		
		#page-title {
			border-bottom: 1px solid #f0f0f0;
			border-top: 1px solid #f0f0f0;
			margin-bottom: 10px;
			width: 100%;
		}
		
		@media (max-width: 767px) {
			body{
				background-color:rgba(255,255,255,0.5); background: none;
			}
			
			.header, #navigation {
				text-align: center;
			}
			
			#navigation ul li a {
				border-bottom: 3px solid transparent;
				color: #888;
				display: inline-block;
				font-family: Arial,sans-serif;
				font-size: 12px;
				padding: 10px 10px;
				text-decoration: none;
			}
		}
	</style>
	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    {header}
    {slider}
	<div style="background-color: rgba(255,255,255,0.9)">
		<div class="container" style="padding-top: 10px; padding-bottom: 10px; min-height: 515px;">

		  <div class="row">
			{content}
		  </div>

		</div> <!-- /container -->
	</div>
	<div style="background-color: #fff; border-top: 1px solid #ccc;">{map}</div>
	{footer}
	
	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#"></a></div>
	
	<script>
		var myCenter=new google.maps.LatLng("{contact_lat}", "{contact_long}");

		function initialize()
		{
		var mapProp = {
			center:myCenter,
			zoom:15,
			scrollwheel: false,
			panControl: true,
			zoomControl: true,
			scaleControl: true,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		  };

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
		  position:myCenter,
		  });

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
		  content:"{contact_footer}"
		  });

		google.maps.event.addListener(marker, 'click', function() {
		  infowindow.open(map,marker);
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
