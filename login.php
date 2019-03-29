<?php
include "db.php";
session_start();
if(isset($_REQUEST['login']))
{
$password=$_REQUEST['loginPass'];
$dec_password= md5(md5($password));
$useremail=$_REQUEST['loginName'];
$ret1= mysqli_query($con,"SELECT * FROM userinfo WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret1);
if($num>0)
{
$_SESSION['log_in']= true;
$_SESSION['id']=$num['user_id'];	
echo "
<script type='text/javascript'>
                alert('You have Logged in !');
				window.location.href='mail.php';
            </script>
";
	
}
else
{
	 echo "<script type='text/javascript'>
                alert('Invalid Email Id or Password');
				
            </script>";
}
}	

?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login-Page</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="login2.css">
  <link rel="shortcut icon" href="img/mlogo.png" />
</head>
<body>
   
    
    <div class="login-page">


        <div class="form">
                             
	<div class="text-center">
	<a href="index.html"><img class="rounded" src="img/mlogo.png"></a>
	</div>
            <form method="POST">
                    <input type="text" name="loginName" placeholder="E-mail"/>
                    <input type="password" name="loginPass" placeholder="Password"/>
					 <input class="btn" type="submit" name="login" value="login" />
                  <p class="message">Not Registered? <a href="Register.php">Register</a></p>
                  <p class="fp"><a href="Forgot.html">Forgotten Password? </a></p>
            </form>


        </div>
    </div>



</body>
</html>