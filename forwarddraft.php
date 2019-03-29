<?php 	
 include "db.php";
 session_start();
 error_reporting(0);
$id=$_SESSION['id'];
$condraft = $_POST['draft'];
$drd1 = $condraft;
mysqli_query($con,"update draft set status='0' where mail_id='$condraft'");

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


if($condraft){

$sql1="SELECT * FROM draft where mail_id='$condraft'";
$dd2=mysqli_query($con,$sql1);
$num1 = mysqli_fetch_array($dd2);
if($num1 > 0 )
{
	$sub = $num1['sub'];
	$msg1 = $num1['msg'];
    $msg = str_replace('<br />',"\n",$msg1);
}
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


    <div class="container" id="navB">

        <h3 class="display-4" align="center">Forward-Mail</h3>

               <form method="post" enctype="multipart/form-data">
        <div class="col-lg-12 mx-5">
         
                <div class="form-group">
                    <label for="title">To</label>
                    <input type="text" name='to' style='max-width:900px;' class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Subject</label></br>
                    <input type="text" name='sub' value="<?php echo $sub ?>" id="subject" class="speech-input">
                    <input type="hidden" name='drd'  value="<?php echo $drd1 ?>" />
                </div>


                <div class="form-group">
                    <label for="body">Body</label></br>
                    <textarea class="speech-input" name='msg' id="bodym" style="height:180px"><?php echo $msg ?></textarea>
                </div>
                 <div class='form-group'>
              <label for='file'>Attachments</label>
              <input type='file' name='file' id='file' class='form-control-file'>
              <small class='form-text text-muted'>Max Size 3mb</small>
            </div>
         
        </div>
        <div class='text-center'>
		 <input type='submit' class='btn btn-warning' value='Save to Draft' name='draft1'>
          <input type='submit' class='btn btn-primary' value='Send' name='send'>
        </div>
        <div class='my-5'></div>
    </form>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar-fixed.js"></script>

    <script src="speech-input.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


</body>

</html>

<?php
    
$to=$_REQUEST['to'];
$sub=$_REQUEST['sub'];
$msg=$_REQUEST['msg'];           
$drd=$_REQUEST['drd'];

$text = nl2br(str_replace(" ", "&nbsp", $msg));

if(isset($_REQUEST['draft1']))
{
  

		mysqli_query($con,"INSERT INTO draft(rec_id,email,sub,msg,date,status) values('$id','$to','$sub','$text',sysdate(),'1')");
		
		echo "
		<script>
		alert('Message Saved');
		window.location.href='mail.php';
		</script>";
		
	}

if(isset($_REQUEST['send']))
{

$source_file=$_FILES["file"]["tmp_name"];
$target_file="attachement/".$_FILES["file"]["name"];
$target_file1="attachement1/".$_FILES["file"]["name"];

$imagename=$_FILES['file']['name'];
	if($to=="" || $sub=="" ||  $msg=="")
	{
	echo "
		<script>
		alert('You need to fill To or Body');
		
		</script>";
	}
	
	//own email check
	else if(strcmp($to,$to1) == 0){
		
		echo "
		<script>
		alert('You can't email yourself');
		
		</script>";
		
	}

	else
	{
	
	$d=mysqli_query($con,"SELECT * FROM userinfo where email='$to'");
	$num=mysqli_fetch_array($d);	

	$d1 =mysqli_query($con,"SELECT * FROM userinfo where user_id='$id'");
	$num1 =mysqli_fetch_array($d1);	
	if($num1>0){
	if($num>0)
		{
		 $name = $num['user_name'];
               $id1 = $num['user_id'];		
			   $email1 = $num1['email'];
			   $email = $num['email'];
				$name1 = $num1['user_name'];
                $drd=$_REQUEST['drd'];  
		if(move_uploaded_file($source_file, $target_file))
           {
		 
		if(copy("attachement/".$imagename."","attachement1/".$imagename.""))
		{
    
             mysqli_query($con,"DELETE from draft where mail_id=$drd");
            
		mysqli_query($con,"INSERT INTO usermail(rec_id,sen_id,user_name,sub,msg,attachement,recDT,status) values('$id1','$email1','$name1','$sub','$text','$imagename',sysdate(),'1')");
	
		mysqli_query($con,"INSERT INTO sentmail(rec_id,sen_id,user_name,sub,msg,attachement,recDT,status) values('$id','$email','$name','$sub','$text','$imagename',sysdate(),'1')");
            
        	
            
            
		echo "
		<script>
		alert('Message Sent');
		window.location.href='mail.php';
		</script>";
		
		} }else{
			   $name = $num['user_name'];
               $id1 = $num['user_id'];		
			   $email1 = $num1['email'];
			   $email = $num['email'];
				$name1 = $num1['user_name'];	
            $drd=$_REQUEST['drd'];  
             mysqli_query($con,"DELETE from draft where mail_id=$drd");
		mysqli_query($con,"INSERT INTO usermail(rec_id,sen_id,user_name,sub,msg,recDT,status) values('$id1','$email1','$name1','$sub','$text',sysdate(),'1')");
		mysqli_query($con,"INSERT INTO sentmail(rec_id,sen_id,user_name,sub,msg,recDT,status) values('$id','$email','$name','$sub','$text',sysdate(),'1')");
       
		echo "
		<script>
		alert('Message Sent');
		window.location.href='mail.php';
		</script>";
		   }
		   
		
	}}
	else
		{
		echo "
		<script>
		alert('Message Can't Be Send');
		
		</script>";
		}	
	}
}	                    
    
?>    

