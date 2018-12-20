<?php
    session_start();
    if(!isset($_SESSION['email_address']))
		header('location:index.php');
		
	$email_address = $_SESSION['email_address'];
?>


<!DOCTYPE HTML>
<html>

<head>
	<title>Music Buzz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="icon" href="images/i1.png" />
    <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<!--//webfonts-->
</head>

<body>
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="index.html">
					Musical World
                </a>
                <pre>                 </pre>
                <li class="nav-item">
					<b style="font-size:20px;"><p style="color:blue;"><?php echo "WELCOME ".$_SESSION['username'];?></p></b>
                </li>
				<button class="navbar-toggler ml-lg-auto ml-sm-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav text-center ml-auto">
						<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">Track</button>
								<div class="dropdown-menu dropdown-primary">
									<a class="dropdown-item" href="kannada_songs.php"><b>Kannada Songs</b></a>
									<a class="dropdown-item" href="hindi_songs.php"><b>Hindi Songs</b></a>
									<a class="dropdown-item" href="english_songs.php"><b>English Songs</b></a>
									<a class="dropdown-item" href="uploaded_songs.php"><b>Uploaded Songs</b></a>
								</div>	
						</div>
						<li class="nav-item  mr-3">
							<a class="nav-link scroll" href="#about">about</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link scroll" href="#contact">contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link scroll" href="logout.php">logout</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- //header -->
	<!-- banner -->
	<div class="banner" id="home">
		<div class="container">
			<div class="banner-text">
				<div class="slider-info text-right">
					<h1 class="text-uppercase">listen to music anywhere.</h1>
					<p class="text-white">Are you a Singer?...Upload Your Music here and get featured.</p>
					<a class="btn btn-agile  mt-4 scroll" href="#about" role="button">read more</a>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about-->
	<section class="wthree-row" id="about">
		<div class="row justify-content-center align-items-center no-gutters abbot-main">
			<div class="col-lg-6 p-0">
				<img src="images/about.jpg" class="img-fluid" alt="" />
			</div>
			<div class="col-lg-6 abbot-right px-md-5  py-lg-0 py-3">
				<div class="card">
					<div class="card-body px-lg-5">
						<h3 class="stat-title card-title align-self-center mb-sm-5 mb-3">musical world
							<br> get addicted to music</h3>
						<span class="w3-line"></span>
						<p class="card-text align-self-center my-4 text-white">
							Are you a singer?...But afraid to sing in front of a huge crowd.Then you are in the right place.Upload your songs to musical world and let the people listen to your songs and rate it.
						</p>
						<p class="card-text align-self-center mb-5 text-white">Be the part of musical world.Upload your songs and get featured by greate musicians.</p>
						<a href="#more_info" class="btn btn-agile abt_card_btn scroll">Know More</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //about -->
	<!-- contact top -->
	<div class="contact-top text-center" id="more_info">
		<div class="content-contact-top">
			<h3 class="stat-title text-white">for more information</h3>
			<h2 class="stat-title text-white">stay in touch</h2>
			<p class="text-white w-75 mx-auto">Musical World a unique platform for upcoming singers.
			</p>
		</div>
	</div>
	<!-- //contact top -->
	<!-- contact -->
	<div class="w3-contact py-5" id="contact">
		<div class="container">
			<div class="row contact-form pt-md-5">
				<!-- contact details -->
				<div class="col-lg-6 contact-bottom d-flex flex-column contact-right-w3ls">
					<h5>get in touch</h5>
					<div class="fv3-contact">
						<div class="row">
							<div class="col-2">
								<span class="fas fa-envelope-open"></span>
							</div>
							<div class="col-10">
								<h6>email</h6>
								<p>
									<a href="mailto:example@email.com" class="text-dark">admin@musicalworld.com</a>
								</p>
							</div>
						</div>
					</div>
					<div class="fv3-contact my-4">
						<div class="row">
							<div class="col-2">
								<span class="fas fa-phone-volume"></span>
							</div>
							<div class="col-10">
								<h6>phone</h6>
								<p>+91 7899496873</p>
							</div>
						</div>
					</div>
					<div class="fv3-contact">
						<div class="row">
							<div class="col-2">
								<span class="fas fa-home"></span>
							</div>
							<div class="col-10">
								<h6>address</h6>
								<p>DSI Labz | Adyar Mangalore</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 wthree-form-left my-lg-0 mt-5">
					<h5>send us a mail</h5>
					<!-- contact form grid -->
					<div class="contact-top1">
						<form action="#" method="get" class="contact-wthree">
							<div class="form-group d-flex">
								<label>
									Name
								</label>
								<input class="form-control" type="text" placeholder="Name" name="email" required="">
							</div>
							<div class="form-group d-flex">
								<label>
									Email
								</label>
								<input class="form-control" type="email" placeholder="email" name="email" required="">
							</div>
							<div class="form-group d-flex">
								<label>
									Phone
								</label>
								<input class="form-control" type="text" placeholder="phone number" name="email" required="">
							</div>
							<div class="form-group d-flex">
								<label>
									Message
								</label>
								<textarea class="form-control" rows="5" id="contactcomment" placeholder="Your message" required></textarea>
							</div>
							<div class="d-flex  justify-content-end">
								<button type="submit" class="btn btn-agile btn-block w-50">Submit</button>
							</div>
						</form>
					</div>
					<!--  //contact form grid ends here -->
				</div>

			</div>
			<!-- //contact details container -->
		</div>
	</div>
	<!-- //contact -->
	<!-- copyright -->
	<div class="cpy-right text-center">
		<p>© 2018 Musical World. All rights reserved</p>
	</div>
    <!-- //copyright -->
    <!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- js-->
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js "></script>
    <script src="js/easing.js "></script>
    <script src="js/SmoothScroll.min.js "></script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js">
	</script>
	<!-- //Bootstrap Core JavaScript -->
</body>

</html>
