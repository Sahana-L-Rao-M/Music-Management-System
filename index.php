<!DOCTYPE HTML>
<html>

<head>
	<title>Symphony Library</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
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

	<style>
	.box3 img {
    object-fit: fill;
}
.opacity3 {
      fill-opacity: 0.25;
    }
	</style>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="index.php">
					Symphony Library
				</a>
				<button class="navbar-toggler ml-lg-auto ml-sm-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav text-center ml-auto">
						<li class="nav-item  mr-3">
							<a class="nav-link scroll" href="#about">about</a>
						</li>
						<li class="nav-item">
							<a class="nav-link scroll" href="" data-target="#modalLRForm" data-toggle="modal">Login/Signup</a>
						</li>
						<li class="nav-item">
							<a class="nav-link scroll" href="#contact">contact</a>
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
					<h1 class="text-uppercase">Get grooving with your favourite songs</h1>
					<p class="text-white">More than 1 billion songs in your pockets</p>

				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about-->
	<section class="wthree-row" id="about">
		<div class="row justify-content-center align-items-center no-gutters abbot-main">
			<div class="col-lg-6 p-0">
				<img src="images/about.jpg" class=".box3" alt="" />
			</div>
			
			<div class="col-lg-6 abbot-right px-md-5  py-lg-0 py-3">
				<div class="card" style="background-color:#30D5C8" >
					<div class="opacity3">
					<div class="card-body px-lg-5">
						<h3 class="stat-title card-title align-self-center mb-sm-5 mb-3">Symphony Library
							<br> Get addicted to MUSIC!!</h3>
						<span class="w3-line"></span>
						<p class="card-text align-self-center my-4 text-white">
							Wanna have a list of all your go-to musics?You are at the right place:))
						</p>
						<p class="card-text align-self-center mb-5 text-white">Join our community and soothe yourself</p>
						<a href="#more_info" class="btn btn-agile abt_card_btn scroll">Know More</a>
					</div>
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
			<p class="text-white w-75 mx-auto">Plug into - forever
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
					<h5>Contacts and About</h5>
					<div class="fv3-contact">
						<div class="row">
							<div class="col-2">
								<span class="fas fa-envelope-open"></span>
							</div>
							<div class="col-10">
								<h6>email</h6>
								<p>
									<a href="mailto:example@email.com" class="text-dark">admin@symphony.com</a>
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
								<p>+91 741369852</p>
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
								<p>Bangalore</p>
							</div>
						</div>
					</div>
					<div class="d-flex  justify-content-end">
								<a href="dialog_box.php" class="btn btn-agile btn-block w-50">Pass Query</a>
							</div>
				</div>
				

			</div>
			<!-- //contact details container -->
		</div>
	</div>
	<!-- //contact -->
	<!-- copyright -->
	<div class="cpy-right text-center">
		<p>© 2018 Symphony Library. All rights reserved</p>
	</div>
	<!-- //copyright -->

	<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal" role="document">
	  <!--Content-->
	  <div class="modal-content">
  
		<!--Modal cascading tabs-->
		<div class="modal-c-tabs">
  
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
				Login</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>
				Register</a>
			</li>
		  </ul>
  
		  <!-- Tab panels -->
		  <div class="tab-content">
			<!--Panel 7-->
			<div class="tab-pane fade in show active" id="panel7" role="tabpanel">
  
			  <!--Body-->
			  <form action="validate.php" method="post">
			  <div class="modal-body mb-1">
				<div class="md-form form-sm mb-5">
				  <i class="fa fa-envelope prefix"></i>
				  <input type="email" id="modalLRInput10" class="form-control form-control-sm validate" name="email" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput10">Your email</label>
				</div>
  
				<div class="md-form form-sm mb-4">
				  <i class="fa fa-lock prefix"></i>
				  <input type="password" id="modalLRInput11" class="form-control form-control-sm validate" name="password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
				</div>
				<div class="text-center mt-2">
				  <button class="btn btn-info" type="submit" name="login">Log in <i class="fa fa-sign-in ml-1"></i></button>
				</div>
			  </div>
			</form>
			  <!--Footer-->
			  <div class="modal-footer">
				
				<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
			  </div>
  
			</div>
			<!--/.Panel 7-->
  
			<!--Panel 8-->
			<div class="tab-pane fade" id="panel8" role="tabpanel">
  
			  <!--Body-->
			  <form action="validate.php" method="post">
			   <div class="modal-body">

				<div class="md-form form-sm mb-5">
					<i class="fa fa-user prefix"></i>
					<input type="text" id="modalLRInput10" class="form-control form-control-sm validate" name="name" required>
					<label data-error="wrong" data-success="right" for="modalLRInput11">Name</label>
				</div>

				<div class="md-form form-sm mb-5">
					<i class="fa fa-mobile prefix"></i>
					<input type="text" id="modalLRInput15" class="form-control form-control-sm validate" name="mobile_number" required>
					<label data-error="wrong" data-success="right" for="modalLRInput15">Mobile Number</label>
				</div>

				<div class="md-form form-sm mb-5">
				  <i class="fa fa-envelope prefix"></i>
				  <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="email" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
				</div>
				
				<div class="md-form form-sm mb-5">
					<i class="fa fa-user prefix"></i>
					<input type="text" id="modalLRInput16" class="form-control form-control-sm validate" name="gender" required>
					<label data-error="wrong" data-success="right" for="modalLRInput11">gender</label>
				</div>

				<div class="md-form form-sm mb-5">
					<i class="fa fa-user prefix"></i>
					<input type="date" id="modalLRInput17" class="form-control form-control-sm validate" name="dob" required>
					<label data-error="wrong" data-success="right" for="modalLRInput11"></label>
				</div>

				<div class="md-form form-sm mb-5">
					<i class="fa fa-user prefix"></i>
					<input type="text" id="modalLRInput18" class="form-control form-control-sm validate" name="location" required>
					<label data-error="wrong" data-success="right" for="modalLRInput11">location</label>
				</div>
  
				<div class="md-form form-sm mb-5">
				  <i class="fa fa-lock prefix"></i>
				  <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" name="password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
				</div>
  
				<div class="md-form form-sm mb-4">
				  <i class="fa fa-lock prefix"></i>
				  <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="confirm_password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
				</div>
  
				<div class="text-center form-sm mt-2">
				  <button class="btn btn-info" type="submit" name="register">Sign up <i class="fa fa-sign-in ml-1"></i></button>
				</div>
			  </div>
			</form>
			  <!--Footer-->
			  <div class="modal-footer">
				<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
			  </div>
			</div>
			<!--/.Panel 8-->
		  </div>
  
		</div>
	  </div>
	  <!--/.Content-->
	</div>
  </div>
  <!--Modal: Login / Register Form-->

  <!-- Modal for Forgot Password 
	<div class="modal fade" id="ForgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><b>Forgot Your Password</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
			<form action="validate.php" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate" required name="email">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
				</div>
				<div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" name="forgot">Send Password <i class="fa fa-sign-in"></i></button>
			</div>
			</form>
      </div>
		</div>
  </div>
</div>-->
	<!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- js-->
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js "></script>
	<script src="js/easing.js "></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll ").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
			$('#forgot').click(function(){
				$('#modalLRForm').modal('hide');
				$('ForgotPasswordModal').modal('show');
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<script src="js/SmoothScroll.min.js "></script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js">
	</script>
	<!-- //Bootstrap Core JavaScript -->
</body>

</html>