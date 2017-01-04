<!doctype html>
<head>
	<!--technical meta-->
	<meta charset="utf-8">

	<!--seo & stuff-->
	<title>Hashslider pro - Example Integration</title>
    <meta name="description" content="This jquery-based slider does what the most jquery-sliders do, but adds a hashtag to the window location, so you can link to any content / position of the slider." />
    <meta name="keywords" content="carousel, hashslider, slider, hash, hashsliver v2" />

	<!--mobile stuff and favicons-->
    <link rel="icon" type="image/png" href="img/fav.png" />

	<!-- Basic CSS-->
    <link href="<?php echo base_url();?>assets/slider/inc/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/slider/inc/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/slider/inc/hashslider.css" rel="stylesheet" type="text/css" />


</head>
<body>

<div id="sitewrapper">
	<section class="sliderwrapper">
		<div id="slider" data-source="index.html" data-speed="500" data-easing="swing" data-duration="9000">
		<!-- Extern-Content loading works only on (simulated) server -->
		<!-- <div id="slider" data-source="slider-content-pro.html" data-speed="500" data-easing="swing"> -->
			<ul>
				<li class="hslide" data-id="pro"><img src="<?php echo base_url();?>assets/slider/content/pro_1.png"></li>
				<li class="hslide" data-id="function"><img src="<?php echo base_url();?>assets/slider/content/pro_2.png"></li>
				<li class="hslide" data-id="features-pro"><img src="<?php echo base_url();?>assets/slider/content/pro_3.png"></li>
				<li class="hslide" data-id="donation"><img src="<?php echo base_url();?>assets/slider/content/pro_4.png"></li>
			</ul>
		</div>
		<div id="loader"><span id="load"></span></div>
		<a class="button" id="back"></a>
		<a class="button" id="next"></a>
		<div id="numbers"></div>
	</section>
<!--end sitewrapper-->
</div>


<!--jquery-->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
<!-- download here: https://github.com/brandonaaron/jquery-mousewheel/blob/master/jquery.mousewheel.js -->
<!-- <script type="text/javascript" src="inc/jquery.mousewheel.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/slider/inc/hashslider-pro_v1.0.js"></script>

</body>
</html>