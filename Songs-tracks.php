<?php
    session_start();
    if(!isset($_SESSION['email']))
		header('location:index.php');
	
	include('connection.php');

	$name = $_SESSION['name'];
	$sql = "SELECT * FROM user_profile_588 WHERE name = '$name' ";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);
	$uid = $row['uid'];

	$sql = "SELECT * FROM track_588";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$tid = $rows['tid'];
		if(isset($_POST[$tid])){

			$sql = "SELECT * FROM fav_588 WHERE tid = '$tid' AND uid = '$uid' ";
			$results = mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($results)>0){
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Warning","<b> You have already added this song to your favorite list!!...</b>","warning");';
            	echo '}, 500);</script>';
			}else{

			$sql = "SELECT * FROM track_588 WHERE tid = '$tid' ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$tid = $row['tid'];
			$track_name = $row['track_name'];
			$art_id = $row['art_id'];
			$song_image = $row['song_image'];
			$audio_file = $row['audio_file'];

			$sql = "INSERT INTO fav_588(`uid`,`tid`,`track_name`) VALUES('$uid','$tid','$track_name') ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Added"," <b>Song '.$track_name.' is successfully added to your favorite songs</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while adding.Please check your internet coonection!</b>","error");';
            	echo '}, 500);</script>';
			}
		}
	}
}


?>

<!DOCTYPE HTML>
<html>

<head>

	<title>Symphony Library | Tracks</title>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">


	    <style>
         table, th, td {
			padding: 25px;
         }
    /* card details start  */
@import url('https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:400,400i,700,700i');
section{
    padding: 100px 0;
}

.btn-card{
	background-color: #1ABC9C;
	color: #fff;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    padding: .84rem 2.14rem;
    font-size: .81rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin: 0;
    border: 0;
    -webkit-border-radius: .125rem;
    border-radius: .125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: #fff;
}
.btn-card:hover {
    background: orange;
}
a.btn-card {
    text-decoration: none;
    color: #fff;
}

.col-md-3{
	padding-bottom:10px;
	padding-left:10px;
}
/* End card section */
    </style>

</head>

<body>
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="index.html">
					Symphony Library
                </a>
                <pre>                 </pre>
                <li class="nav-item">
					<b style="font-size:20px;"><p style="color:blue;"><?php echo "Logged in as ".$_SESSION['name'];?></p></b>
                    <p style="color:blue;">| Tracks |</p>
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
									<a class="dropdown-item" href="Songs-tracks.php"><b>Tracks</b></a>
								</div>	
						</div>
						<li class="nav-item">
							<a class="nav-link scroll" href="favorite_list.php"><i class='fa fa-heart' style='font-size:40px;color:red'></i></a>
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
	

		<?php
			include('connection.php');
			$sql = "SELECT * FROM track_588";
			$result = mysqli_query($conn,$sql);
			echo "<section class='details-card'>
			<div class='container'>
				<div class='row'>";
			$limit = 2;
            $count = 0;						
					echo "<table width=900>";
					while($row = mysqli_fetch_array($result)){
						$tid = $row['tid'];
						$track_name = $row['track_name'];
						$alid = $row['alid'];
						$art_id = $row['art_id'];
						$song_image = $row['song_image'];
						$audio_file = $row['audio_file'];
						
			
						$sql = "SELECT * FROM album_588 where alid='$alid'";
						$result1 = mysqli_query($conn,$sql);
						$sql = "SELECT * FROM artist_588 where art_id='$art_id'";
						$result2 = mysqli_query($conn,$sql);
			
			
						$row1 = mysqli_fetch_array($result1);
						$row2 = mysqli_fetch_array($result2);
			
						$album_name=$row1['album_name'];
						$artist_name=$row2['artist_name'];
                        

						echo "<form method='post' action='Songs-tracks.php'>";

                        if($count < $limit){
                            if($count == 0){
                                echo "<tr>"; //Start table row
                        }
                            echo "<td width=80 ><img src='songs/Songs-tracks/img/$song_image' width=90 height=80></td>";
                            echo "<td>$track_name<br/>$artist_name | $album_name<br/><audio class='embed-responsive-item' controls='' preload='none'> <source src='songs/Songs-tracks/$audio_file' type='audio/mp3'></audio><br></td>";
                            echo "<td><button type='submit' style='color:red;' class='btn-card' name='$tid'><i class='fa fa-heart'></i></button><br></td><br>";
						}else{
                                $count = 0;
                                echo "</tr><tr>"; //End table row
                                echo "<td width=80><img src='songs/Songs-tracks/img/$song_image' width=90 height=80></td>";					
                                echo "<td>$track_name<br/>$artist_name | $album_name<br><audio class='embed-responsive-item' controls='' preload='none'> <source src='songs/Songs-tracks/$audio_file' type='audio/mp3'></audio><br></td>";	
								echo "<td><button type='submit' style='color:red;' class='btn-card' name='$tid'><i class='fa fa-heart'></i></button><br></td><br>";	
                            }
                        $count++;
                    }
            echo "</tr></table></form>";
			echo "</div>
				</div>
			</section>
			";
	
		?>
    
	<!-- contact top -->
	<div style="background-size:contain;">
	<div class="contact-top text-center" id="more_info">
		<div class="content-contact-top">
			<h3 class="stat-title text-white">for more information</h3>
			<h2 class="stat-title text-white">stay in touch</h2>
			<p class="text-white w-75 mx-auto">Symphony Library a unique platform for upcoming singers.
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
								<p>Bangalore</p>
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
		<p>© 2018 Symphony Library. All rights reserved</p>
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
	<script src="js/bootstrap.js"></script>
	<!-- //Bootstrap Core JavaScript -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>

	</div>
</body>

</html>