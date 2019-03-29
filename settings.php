<?php session_start();
include "db.php";
 $id=$_SESSION['id'];
 if(!isset($_SESSION['log_in']) )
{
	 echo "<script type='text/javascript'>
                alert('You Have to Login first !!');
				window.location.href='index.html';
            </script>";
}
$sql="SELECT user_name,image FROM userinfo where user_id='$id'";
$dd1=mysqli_query($con,$sql);
$num = mysqli_fetch_array($dd1);
if($num > 0 )
{
	$uname1 = $num['user_name'];
	$image1 = $num['image'];
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Easy-Mail</title>
   
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="img/mlogo.png" />
  <style>

	
	#navB {
		margin-top:120px;
	}
	
   @media only screen and (max-width: 790px) {
  	#navB {
		margin-top:250px;
	}
	
    }
	tr:hover {
  background: #fff;
}
	
  </style>
</head>
</head>
<body>

 <nav class="navbar navbar-expand-md navbar-light fixed-top " style="height:109px;">
		
      <a href="mail.php" class="navbar-brand">
        <img src="img/mlogo.png" width="94" height="94" alt="" style="margin-left:100px">
      </a>
	  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
	  <div class='ml-auto mx-4'>
	  <h4 style='color:#87cefa'>Hello <?php echo substr($uname1, 0, strpos($uname1, ' ')) ?> !</h4>
	  </div>
    <div class="btn-group">
  <img src='uploads/<?php 
  
  if($image1!=""){
  echo $image1; 
  }else{
	  echo "alt.png"; 
  }
		?>'  class="rounded-circle" style='margin-right:113px;' alt="Cinque Terre" width="64" height="64" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

  <div class="dropdown-menu dropdown-menu-right">
	 <a class="dropdown-item" href="mail.php">Inbox</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
      
      
      </div>
    </nav>

  
<div class="container-fluid" id="navB">
 <div class="row">
      <div class="col-lg-2">
	   <ul class="list-group">

  <li class="list-group-item"><a href="settings.php?chk=ps" style="color:#000000">Profile-Settings</a></li>

  <li class="list-group-item"><a href="settings.php?chk=cp" style="color:#000000">Change-Password</a></li>
   </ul>
	  </div>
	  
	  <div class="col-lg-10" style="background-color:#F5F5F5;"></br>
	  
	   		<?php
		@$id=$_SESSION['sid'];
		@$chk=$_REQUEST['chk'];
			if($chk=="ps")
			{
			include_once('ps.php');
			}
			else if($chk=="cp")
			{
			include_once('cp.php');
			}else
			{
				echo "
				
				 <form  method='post'>
					<div class='register'>
						<div class='row'>
                            <div class='col-md-2'></div>
							<div class='col-md-2 register-left  wow slideInLeft' data-wow-duration='1s'>
								<a href='#'><img src='img/mlogo.png'  alt=''/></a>
							</div>
                            <div class='col-md-3 register-left my-5  wow slideInRight' data-wow-duration='1s'>
								<h1 class='display-4' style='color:#1589ce'>Want to Make some changes</h1>
							</div>
						</div>
					</div>                       
				</form>
				";
			}
	
		?>
	  
	  </div>
    <script src="js/wow/wow.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/script.js"></script>				
</body>
</html>