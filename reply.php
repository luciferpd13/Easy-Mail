 <?php 	
 include "db.php";
 error_reporting(0);
 session_start();
 $id=$_SESSION['id'];
 $email = $_GET['to'];
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
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Easy-Mail</title>
   
     <link rel="stylesheet" href="speech-input.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="img/mlogo.png" />
  <style>

	
	#navB {
		margin-top:20px;
	}
	
   @media only screen and (max-width: 790px) {
  	#navB {
		margin-top:120px;
	}
	
    }
	tr:hover {
		background: #fff;
	}

	
	@media only screen and (max-width: 992px) {
  	#subject{
		width : 650px;
	}
	#bodym{
		width : 650px;
		height : 250px;
	}
	
    }
		@media only screen and (max-width: 768px) {
  	#subject{
		width : 450px;
	}
	#bodym{
		width : 450px;
		height : 250px;
	}
    }
			@media only screen and (max-width: 576px) {
  	#subject{
		width : 250px;
	}
	#bodym{
		width : 250px;
		height : 250px;
	}
    }
	
	@media only screen and (min-width: 1000px) {
  	#subject{
		width : 900px;
	}
	#bodym{
		width : 900px;
		height : 250px;
	}
	
    }
  </style>
  </head>
<body>
 <nav class="navbar navbar-expand-md navbar-light fixed " style="height:109px;">
		
      <a href="mail.php" class="navbar-brand">
        <img src="img/mlogo.png" width="94" height="94" alt="" style="margin-left:100px">
      </a>
	  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
	  <div class='ml-auto mx-4'>
	  <a href='mail.php'> Go Back </a>
	  </div>
    <div class="btn-group">
  <img src='uploads/<?php 
  
  if($image1!=""){
  echo $image1; 
  }else{
	  echo "alt.png"; 
  }
		?>' class="rounded-circle" style='margin-right:113px;' alt="alt.png" width="64" height="64" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

  <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="settings.php">Settings</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
      
      
      </div>
    </nav>


      <div class="container" id="navB" >
        
          <h3 class="display-4" align="center">Reply</h3>
     
      
        <div class="col-lg-12 mx-5">
          <form  method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">To</label>
              <input type="text" name='to' value="<?php echo $email ?>" style='max-width:900px;' class="form-control">
            </div>
			<div class="form-group">
              <label for="title">Subject</label></br>
              <input type="text" name='sub' id="subject" class="speech-input" >
            </div>
           
           
            <div class="form-group">
              <label for="body">Body</label></br>
              <textarea  class="speech-input"  name='msg' id="bodym" style="height:180px"></textarea>
            </div>
		     <div class='form-group'>
              <label for='file'>Attachments</label>
              <input type='file' name='file' id='file' class='form-control-file'>
              <small class='form-text text-muted'>Max Size 3mb</small>
            </div>
         
        </div>
        <div class='text-center'>
		 <input type='submit' class='btn btn-warning' value='Save to Draft' name='draft'>
          <input type='submit' class='btn btn-primary' value='Send' name='send'>
        </div>
        <div class='my-5'></div>
		 </form>
      </div>
<?php include "compose.php"; ?>

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>

  <script src="speech-input.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


</body>
</html>