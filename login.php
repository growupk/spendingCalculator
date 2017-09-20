<!DOCTYPE html>
<?php
    /*
    DB New users
    INSERT INTO user (`user_type`,`username`,`password`) VALUES('admin','youruser',PASSWORD('yourpass'));
    */

    include "config.php";
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($con,$_POST['username']);
        $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
        
        $sql = "SELECT username FROM user WHERE username = '$myusername' and password = PASSWORD('$mypassword')";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
        
        if($count == 1) {
            //session_register("myusername");
            $_SESSION['login_user'] = $myusername;
            
            header("location: index.php");
        }else {
            $error = "Your Login Name or Password is invalid";
        }
    }
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bejelentkezés</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/login-form-elements.css">
        <link rel="stylesheet" href="css/login-style.css">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left text">
                                    <h1>Havi<strong> költségkalkulátor</strong><i class="fa fa-lock"></i></h1>
                        		</div>
                        		
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username">Felhasználónév</label>
			                        	<input type="text" name="username" placeholder="Felhasználónév" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password">Jelszó</label>
			                        	<input type="password" name="password" placeholder="Jelszó" class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Bejelentkezés</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
        <script src="js/login.js"></script>

    </body>

</html>