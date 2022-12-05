<?php  
if(!isset($_SESSION['email']))
header('location:index.php');

	if(isset($_POST['register'])){

    if(!isset($_SESSION))
		session_start();

	include('connection.php');
		
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $mobile_number = mysqli_real_escape_string($conn,$_POST['mobile_number']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
		
    if($password == $confirm_password){
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
            if(preg_match("/^[6-9]\d{9}$/", $mobile_number)){

                $sql_email = "SELECT email FROM user_profile_588 WHERE email='$email'";
                $result_email = mysqli_query($conn,$sql_email);

                $sql_mobile = "SELECT phone_no FROM user_profile_588 WHERE phone_no='$mobile_number'";
                $result_mobile = mysqli_query($conn,$sql_mobile);

                if(mysqli_num_rows($result_email)>0){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","Email Address '. $email.' is already exists!","error");';
                    echo '}, 500);</script>';
                }
                else if(mysqli_num_rows($result_mobile)>0){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","Mobile number '.$mobile_number.' is already exists!","error");';
                    echo '}, 500);</script>';
                }else{
   

                        $sql = "INSERT INTO user_profile_588 (`password`,`name`,`email`,`phone_no`,`dob`,`gender`,`location`) VALUES('$password','$name','$email','$mobile_number','$dob','$gender','$location')";

                        $result = mysqli_query($conn,$sql);

                        if(!$result)
                            die("Error while updating!!!...").mysqli_error($conn);
                        else{
                                $_SESSION['name']=$name;	
                                $_SESSION['mobile_number']=$mobile_number;	
                                $_SESSION['email']=$email;	
                                $_SESSION['password']=$password;
                                $_SESSION['dob']=$dob;	
                                $_SESSION['gender']=$gender;	
                                $_SESSION['location']=$location;
                                
                                include('index.php');
                            }
                        
                    }
            }else{
                    //invalid mobile number error message
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("Oops...","Mobile number '. $mobile_number.' is invalid!","error");';
                    echo '}, 500);</script>';
                }
        }else{
                //email address invalid error messaage
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Oops...","Email address '. $email.' is invalid!","error");';
                echo '}, 500);</script>';
        }
    }else{
            //password does not match error 
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops...","The two passwords does not match!","error");';
            echo '}, 500);</script>';
        }
}

if(isset($_POST['login'])){

    session_start();

    include('connection.php');

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);


    $sql = "SELECT * FROM user_profile_588 WHERE email = '$email' AND password = '$password' ";

    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("Warning...","Error while loggin in!..","warning");';
        echo '}, 500);</script>';
    }
    else
    {
        $row=mysqli_fetch_array($result);
        $name = $row['name'];
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            
                    if($row['email'] == 'admin@gmail.com' && $row['password'] == 'admin'){
                        $_SESSION['name']=$name;
                        $_SESSION['email'] = $email;
                        header('location:admin_page.php');
                    }else{
                        $_SESSION['name']=$name;
                        $_SESSION['email'] = $email;
                        header('location:profile.php');
                    }
                
        }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Oops...","Wrong user_profile_588name or Password!...","error");';
                echo '}, 500);</script>';
            }
        }
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="KEERTHANA KUTEERA LOGO-BLACK-01.png" type="image/png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
    </body>
</html>