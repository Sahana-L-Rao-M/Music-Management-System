<?php
    session_start();
    if(!isset($_SESSION['email']))
		header('location:index.php');
	
	include('connection.php');

	$name = $_SESSION['name'];
	$sql = "SELECT * FROM user_profile_588 ";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);
	$uid = $row['uid'];


    #Album

	if(isset($_POST['upload_album'])){

        $album_id = mysqli_real_escape_string($conn,$_POST['album_id']);
        $album_name = mysqli_real_escape_string($conn,$_POST['album_name']);
        $year = mysqli_real_escape_string($conn,$_POST['year']);
        $no_of_songs = mysqli_real_escape_string($conn,$_POST['no_of_songs']);        

		$sql = "INSERT INTO album_588(`alid`,`album_name`,`year`,`no_of_songs`) VALUES('$album_id','$album_name','$year','$no_of_songs')";
		$result = mysqli_query($conn,$sql);
		if($result){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>Successfully uploaded '.$album_id.'</b>","success");';
				echo '}, 500);</script>';
		}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
            echo '}, 500);</script>';
		}

    }

    if(isset($_POST['update_album'])){

        $album_id = mysqli_real_escape_string($conn,$_POST['album_id']);
        $album_name = mysqli_real_escape_string($conn,$_POST['album_name']);
        $year = mysqli_real_escape_string($conn,$_POST['year']);
        $no_of_songs = mysqli_real_escape_string($conn,$_POST['no_of_songs']);        

		$update = mysqli_query($conn,"UPDATE album_588 SET album_name='".$album_name."',
					  year='".$year."',
					  no_of_songs='".$no_of_songs."' WHERE alid = '$album_id'");
        if($update){
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { sweetAlert("Updated"," <b>Album '.$album_id.' is updated from album record</b>","success");';
                        echo '}, 500);</script>';
        }else{
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while updating.Please check your internet connection!</b>","error");';
                        echo '}, 500);</script>';
        }

    }

       
    $sql = "SELECT * FROM album_588";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$album_id = $rows['alid'];
		if(isset($_POST[$album_id])){

			$sql = "SELECT * FROM album_588 WHERE alid = '$album_id' ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$album_id = $row['alid'];

			$sql = "DELETE FROM album_588 WHERE alid = '$album_id' ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Album '.$album_id.' is deleted from album record</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet connection!</b>","error");';
            	echo '}, 500);</script>';
			}
        }
    }


    


    #Artist

    
if(isset($_POST['upload_artist'])){

    $art_id = mysqli_real_escape_string($conn,$_POST['art_id']);
    $artist_name = mysqli_real_escape_string($conn,$_POST['artist_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);     
    
    
    $sql = "INSERT INTO artist_588(`art_id`,`artist_name`,`email`,`gender`,`dob`) VALUES('$art_id','$artist_name','$email','$gender','$dob')";
    $result = mysqli_query($conn,$sql);
    if($result){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>Successfully uploaded '.$art_id.'</b>","success");';
            echo '}, 500);</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
        echo '}, 500);</script>';
    }
    }

    if(isset($_POST['update_artist'])){

        $art_id = mysqli_real_escape_string($conn,$_POST['art_id']);
        $artist_name = mysqli_real_escape_string($conn,$_POST['artist_name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $dob = mysqli_real_escape_string($conn,$_POST['dob']);     

		$update = mysqli_query($conn,"UPDATE artist_588 SET artist_name='".$artist_name."',
					  email='".$email."',
					  gender='".$gender."',dob='".$dob."' WHERE art_id = '$art_id'");
        if($update){
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { sweetAlert("Updated"," <b>Artist '.$art_id.' is updated from artist record</b>","success");';
                        echo '}, 500);</script>';
        }else{
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while updating.Please check your internet connection!</b>","error");';
                        echo '}, 500);</script>';
        }

    }
    
    
    $sql = "SELECT * FROM artist_588";
        $result = mysqli_query($conn,$sql);
    
        while($rows = mysqli_fetch_array($result)){
            $art_id = $rows['art_id'];
            if(isset($_POST[$art_id])){
    
                $sql = "SELECT * FROM artist_588 WHERE art_id = '$art_id' ";
                $results = mysqli_query($conn,$sql);
    
                $row = mysqli_fetch_array($results);
                $art_id = $row['art_id'];
    
                $sql = "DELETE FROM artist_588 WHERE art_id = '$art_id' ";
                $results = mysqli_query($conn,$sql);
    
                if($results){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Artist '.$art_id.' is deleted from artist records</b>","success");';
                    echo '}, 500);</script>';
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet coonection!</b>","error");';
                    echo '}, 500);</script>';
                }
            }
        }

        #Track

    
if(isset($_POST['upload_track'])){


    $audio_file = $_FILES['audio_file']['name'];
    $track_name = mysqli_real_escape_string($conn,$_POST['track_name']);
    $tid = mysqli_real_escape_string($conn,$_POST['tid']);
    $song_image = $_FILES['song_image']['name'];
    $alid = mysqli_real_escape_string($conn,$_POST['alid']);
    $art_id= mysqli_real_escape_string($conn,$_POST['art_id']);        
    
    if(isset($_FILES['audio_file'])){
        $file_name = $_FILES['audio_file']['name'];
        $file_size = $_FILES['audio_file']['size'];
        $file_tmp = $_FILES['audio_file']['tmp_name'];
        $file_type = $_FILES['audio_file']['type'];
        
        move_uploaded_file($file_tmp,"songs/Songs-tracks/".$file_name);
     }
     
     if(isset($_FILES['song_image'])){
        $file_name = $_FILES['song_image']['name'];
        $file_size = $_FILES['song_image']['size'];
        $file_tmp = $_FILES['song_image']['tmp_name'];
        $file_type = $_FILES['song_image']['type'];
        
        move_uploaded_file($file_tmp,"songs/Songs-tracks/img/".$file_name);
     }       
    
    
    $sql = "INSERT INTO track_588(`tid`,`track_name`,`alid`,`art_id`,`song_image`,`audio_file`) VALUES('$tid','$track_name','$alid','$art_id','$song_image','$audio_file')";
    $result = mysqli_query($conn,$sql);
    if($result){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>Successfully uploaded '.$tid.'</b>","success");';
            echo '}, 500);</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
        echo '}, 500);</script>';
    }
    }

    if(isset($_POST['update_track'])){

    $audio_file = $_FILES['audio_file']['name'];
    $track_name = mysqli_real_escape_string($conn,$_POST['track_name']);
    $tid = mysqli_real_escape_string($conn,$_POST['tid']);
    $song_image = $_FILES['song_image']['name'];
    $alid = mysqli_real_escape_string($conn,$_POST['alid']);
    $art_id= mysqli_real_escape_string($conn,$_POST['art_id']);        
    
    if(isset($_FILES['audio_file'])){
        $file_name = $_FILES['audio_file']['name'];
        $file_size = $_FILES['audio_file']['size'];
        $file_tmp = $_FILES['audio_file']['tmp_name'];
        $file_type = $_FILES['audio_file']['type'];
        
        move_uploaded_file($file_tmp,"songs/Songs-tracks/".$file_name);
     }
     
     if(isset($_FILES['song_image'])){
        $file_name = $_FILES['song_image']['name'];
        $file_size = $_FILES['song_image']['size'];
        $file_tmp = $_FILES['song_image']['tmp_name'];
        $file_type = $_FILES['song_image']['type'];
        
        move_uploaded_file($file_tmp,"songs/Songs-tracks/img/".$file_name);
     }       

		$update = mysqli_query($conn,"UPDATE track_588 SET track_name='".$track_name."',
					  alid='".$alid."',
					  art_id='".$art_id."',song_image='".$song_image."',audio_file='".$audio_file."' WHERE tid = '$tid'");
/*mine */

        $sql = "SELECT * FROM fav_588 WHERE tid='$tid' ";
        $results = mysqli_query($conn,$sql);
        
        while($rows = mysqli_fetch_array($results))
        {
            $update_fav = mysqli_query($conn,"UPDATE fav_588 SET track_name='".$track_name."' WHERE tid = '$tid'");
        }


        if($update){
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { sweetAlert("Updated"," <b>Album '.$tid.' is updated from track record</b>","success");';
                        echo '}, 500);</script>';
        }else{
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while updating.Please check your internet connection!</b>","error");';
                        echo '}, 500);</script>';
        }

    }
    
    
    $sql = "SELECT * FROM track_588";
        $result = mysqli_query($conn,$sql);
    
        while($rows = mysqli_fetch_array($result)){
            $tid = $rows['tid'];
            if(isset($_POST[$tid])){
    
                $sql = "SELECT * FROM track_588 WHERE tid = '$tid' ";
                $results = mysqli_query($conn,$sql);
    
                $row = mysqli_fetch_array($results);
                $tid = $row['tid'];
    
#mine



                $sql = "DELETE FROM track_588 WHERE tid = '$tid' ";
                $results = mysqli_query($conn,$sql);
    
                if($results){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Track '.$tid.' is deleted from track records</b>","success");';
                    echo '}, 500);</script>';
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet coonection!</b>","error");';
                    echo '}, 500);</script>';
                }
            }
        }


    

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Symphony Library | Admin Page</title>
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
</head>

<body>
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="#">
					Symphony Library
                </a>
                <pre>                 </pre>
                <li class="nav-item">
					<b style="font-size:20px;"><p style="color:blue;"><?php echo "Logged in as ".$_SESSION['name'];?></p></b>
                    <p style="color:blue;">| Admin Page |</p>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="logout.php">           <b>logout</b></a>
                </li>
			</nav>
		</div>
	</header>
	<!-- //header -->
	
   <br> <div class="alert alert-primary" role="alert">
     <center><b>List of all users</b></center>
    </div>
    <?php 

        include('connection.php');

        $sql = "SELECT * FROM user_profile_588 ";
        $result = mysqli_query($conn,$sql);

        echo "
            <div class='card'>
                <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Users List</h3>
                <div class='card-body'>
                    <div id='table' class='table-editable'>
                        <table class='table table-bordered table-responsive-md table-striped text-center'>
                            <tr>
                                <th class='text-center'>User id</th>
                                <th class='text-center'>Password</th>
                                <th class='text-center'>Name</th>
                                <th class='text-center'>Email</th>
                                <th class='text-center'>Phone no</th>
								<th class='text-center'>DOB</th>
                                <th class='text-center'>Gender</th>
                                <th class='text-center'>Location</th>
                            </tr>
            ";
            while($row = mysqli_fetch_array($result)){

                echo "
                        <tr>
                            <td class='pt-3-half' >".$row['uid']."</td>
                            <td class='pt-3-half' >".$row['password']."</td>
                            <td class='pt-3-half' >".$row['name']."</td>
                            <td class='pt-3-half' >".$row['email']."</td>
                            <td class='pt-3-half' >".$row['phone_no']."</td>
                            <td class='pt-3-half' >".$row['dob']."</td>
                            <td class='pt-3-half' >".$row['gender']."</td>
							<td class='pt-3-half' >".$row['location']."</td>
                        </tr>      
                ";
            }
        echo "
                </table>
            </div>
        </div>
    </div><br>
";

?>

<!--ALBUMS-->

<div class="alert alert-primary" role="alert">
     <center><b>Albums</b></center>
</div>


<form method="post" action="admin_page.php" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form5" class="form-control validate" name="album_id" required>
				<label data-error="wrong" data-success="right" for="form5">Album ID</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form6" class="form-control validate" name="album_name" required>
				<label data-error="wrong" data-success="right" for="form6">Album Name</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form7" class="form-control validate" name="year" required>
				<label data-error="wrong" data-success="right" for="form6">Year</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form8" class="form-control validate" name="no_of_songs" required>
				<label data-error="wrong" data-success="right" for="form8">No_of_songs</label>
			</div>
		</div>

		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload_album" class="btn btn-default btn-rounded mb-4">Upload <i class="fa fa-upload"></i></button>
			</div>
            <div class="text-center">
				<button type="submit" name="update_album" class="btn btn-default btn-rounded mb-4">Update <i class="fa fa-upload"></i></button>
			</div>
		</div>

        
		
    </div>

</form>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM album_588";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Albums</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
                            <th class='text-center'>Album id</th>
                            <th class='text-center'>Album Name</th>
                            <th class='text-center'>Year</th>
                            <th class='text-center'>no_of_songs</th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $album_id = $row['alid'];
            #$link_address1 = 'AdminEditUser.php';
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['alid']."</td>
                        <td class='pt-3-half' >".$row['album_name']."</td>
                        <td class='pt-3-half' >".$row['year']."</td>
                        <td class='pt-3-half' >".$row['no_of_songs']."</td>
                        <td>
                            <span><button type='submit' name='$album_id' class='btn btn-danger btn-rounded btn-sm my-0'>Delete Album  <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr>  
                </form>    
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>

<!--Artist-->

<div class="alert alert-primary" role="alert">
     <center><b>Artist Details</b></center>
</div>


<form method="post" action="admin_page.php" enctype="multipart/form-data">
	<div class="form-row">
        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form9" class="form-control validate" name="art_id" required>
				<label data-error="wrong" data-success="right" for="form9">Artist ID</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form10" class="form-control validate" name="artist_name" required>
				<label data-error="wrong" data-success="right" for="form10">Artist Name</label>
			</div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form11" class="form-control validate" name="email" required>
				<label data-error="wrong" data-success="right" for="form10">Email</label>
			</div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form12" class="form-control validate" name="gender" required>
				<label data-error="wrong" data-success="right" for="form10">Gender</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form13" class="form-control validate" name="dob" required>
				<label data-error="wrong" data-success="right" for="form10">DOB</label>
			</div>
		</div>

        <div class="col">
			<div class="text-center">
				<button type="submit" name="upload_artist" class="btn btn-default btn-rounded mb-4">Upload <i class="fa fa-upload"></i></button>
			</div>
            <div class="text-center">
				<button type="submit" name="update_artist" class="btn btn-default btn-rounded mb-4">Update <i class="fa fa-upload"></i></button>
			</div>
		</div>

	</div>	
</form>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM artist_588";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Artist Details</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
                            <th class='text-center'>Artist ID</th>
                            <th class='text-center'>Artist Name</th>
                            <th class='text-center'>Artist Email</th>
                            <th class='text-center'>Artist Gender</th>
                            <th class='text-center'>Artist DOB</th>
                            <th class='text-center'>Artist Age</th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $art_id = $row['art_id'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['art_id']."</td>
                        <td class='pt-3-half' >".$row['artist_name']."</td>
                        <td class='pt-3-half' >".$row['email']."</td>
                        <td class='pt-3-half' >".$row['gender']."</td>
                        <td class='pt-3-half' >".$row['dob']."</td>
                        <td class='pt-3-half' >".$row['age']."</td>
                        <td>
                            <span><button type='submit' name='$art_id' class='btn btn-danger btn-rounded btn-sm my-0'>Delete Artist  <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr>  
                </form>    
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>


<!--Track-->

<div class="alert alert-primary" role="alert">
     <center><b>Track</b></center>
</div>


<form method="post" action="admin_page.php" enctype="multipart/form-data">

<div class="form-row">
		<div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile1" aria-describedby="fileHelp" name="audio_file" required>
                <label data-error="wrong" data-success="right" for="form19">Insert Audio file</label>
			</div>
		</div>		

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form15" class="form-control validate" name="track_name" required>
				<label data-error="wrong" data-success="right" for="form15">Track Name</label>
			</div>
		</div>
</div>



<div class="form-row">

         <div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="song_image" required>
                <label data-error="wrong" data-success="right" for="form20">Insert image of song</label>
            </div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form16" class="form-control validate" name="tid" required>
				<label data-error="wrong" data-success="right" for="form16">Track ID</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form17" class="form-control validate" name="alid" required>
				<label data-error="wrong" data-success="right" for="form17">Album ID</label>
			</div>
		</div>


        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form18" class="form-control validate" name="art_id" required>
				<label data-error="wrong" data-success="right" for="form18">Artist ID</label>
			</div>
		</div>
		
		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload_track" class="btn btn-default btn-rounded mb-4">Upload <i class="fa fa-upload"></i></button>
			</div>
            <div class="text-center">
				<button type="submit" name="update_track" class="btn btn-default btn-rounded mb-4">Update <i class="fa fa-upload"></i></button>
			</div>
		</div>
	</div>	
</form>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM track_588";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Track</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
                            <th class='text-center'>Track ID</th>
                            <th class='text-center'>Track Name</th>
                            <th class='text-center'>Album ID</th>
                            <th class='text-center'>Artist ID</th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $tid = $row['tid'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['tid']."</td>
                        <td class='pt-3-half' >".$row['track_name']."</td>
                        <td class='pt-3-half' >".$row['alid']."</td>
                        <td class='pt-3-half' >".$row['art_id']."</td>
                        <td>
                            <span><button type='submit' name='$tid' class='btn btn-danger btn-rounded btn-sm my-0'>Delete track  <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr>  
                </form>    
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>



<!--div class="alert alert-primary" role="alert">
         <center><b>Tracks</b></center>
    </div>

<form method="post" action="admin_page.php" enctype="multipart/form-data">
	<div class="form-row">
			

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form1" class="form-control validate" name="tid" required>
				<label data-error="wrong" data-success="right" for="form1">tid</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form2" class="form-control validate" name="alid" required>
				<label data-error="wrong" data-success="right" for="form2">Album ID</label>
			</div>
		</div>
    </div>

	<div class="form-row">

         <div class="col">
			<div class="form-group btn btn-primary">
				<input type="text" class="form-control validate" id="form3" name="art_id" required>
				<label data-error="wrong" data-success="right" for="form3">Artist ID</label>
			</div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form4" class="form-control validate" name="track_name" required>
				<label data-error="wrong" data-success="right" for="form4">Track name</label>
			</div>
		</div>
		
		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload_track" class="btn btn-default btn-rounded mb-4">Upload <i class="fa fa-upload"></i></button>
			</div>
		</div>
	</div>	
</form>

<!?php 

    include('connection.php');

    $sql = "SELECT * FROM track_588";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Kannada Songs</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
                            <th class='text-center'>Track ID/th>
                            <th class='text-center'>Track Name</th>
                            <th class='text-center'>Album ID</th>
                            <th class='text-center'>Artist ID</th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $album_id = $row['tid'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['tid']."</td>
                        <td class='pt-3-half' >".$row['track_name']."</td>
                        <td class='pt-3-half' >".$row['alid']."</td>
                        <td class='pt-3-half' >".$row['art_id']."</td>
                        <td>
                            <span><button type='submit' name='$album_id' class='btn btn-danger btn-rounded btn-sm my-0'>Delete Song <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr>
                </form>      
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?-->

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
</body>

</html>