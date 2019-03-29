<?php 	
 include "db.php";
 session_start();
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
    <link rel="stylesheet" href="speech-input.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/animate.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/mlogo.png" />
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <style>
        #navB {
            margin-top: 20px;
        }

        @media only screen and (max-width: 790px) {
            #navB {
                margin-top: 120px;
            }

        }

        tr:hover {
            background: #fff;
        }


        @media only screen and (max-width: 992px) {
            #subject {
                width: 650px;
            }

            #bodym {
                width: 650px;
                height: 250px;
            }

        }

        @media only screen and (max-width: 768px) {
            #subject {
                width: 450px;
            }

            #bodym {
                width: 450px;
                height: 250px;
            }
        }

        @media only screen and (max-width: 576px) {
            #subject {
                width: 250px;
            }

            #bodym {
                width: 250px;
                height: 250px;
            }
        }

        @media only screen and (min-width: 1000px) {
            #subject {
                width: 900px;
            }

            #bodym {
                width: 900px;
                height: 250px;
            }

        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light " style="height:109px;">

        <a href="mail.php" class="navbar-brand">
            <img src="img/mlogo.png" width="94" height="94" alt="" style="margin-left:100px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class='ml-auto mx-4'>
                <h4 style='color:#87cefa'>Hello
                    <?php echo substr($uname1, 0, strpos($uname1, ' ')) ?> !</h4>
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


    <div class="container-fluid " id="navB">
        <div class="row">
            <div class="col-lg-2 wow slideInUp" data-wow-duration="1s">
                <ul class="list-group">
                    <li class="list-group-item">
                        <!--
  <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#addPostModal" > -->
                        <a href='mail.php?chk=cs' class="btn btn-primary pull-left"><i class="fab fa-telegram-plane"></i> Compose</a>
                    </li>
                    <li class="list-group-item"><a href="mail.php?chk=inbox" style="color:#000000">Inbox</a></li>

                    <li class="list-group-item"><a href="mail.php?chk=sent" style="color:#000000">Sent-mail</a></li>
                    <li class="list-group-item"><a href="mail.php?chk=draft" style="color:#000000">Draft</a></li>
                    <li class="list-group-item"><a href="mail.php?chk=trash" style="color:#000000">Trash</a></li>
                    <li class="list-group-item"><a href="mail.php?chk=spam" style="color:#000000">Spam-Box</a></li>
                </ul>
            </div>

            <div class="col-lg-10 wow slideInRight" data-wow-duration="1s" style="background-color:#F5F5F5;"></br>



                <?php
		@$id=$_SESSION['sid'];
		@$chk=$_REQUEST['chk'];
		@$coninb=$_POST['coninb'];
		@$contrash=$_POST['contrash'];
		@$consent=$_POST['consent'];
        @$conspam=$_POST['conspam'];    
            
			if($chk=="sent")
			{
			include_once('sentmail.php');
			}
			
					else if($chk=="cs")
			{
				echo " 
				
				    <div class='container'  >
        
          <h5 class='display-4' align='center'>New Message</h5>
     
        
        <div class='col-lg-12 mx-5'>
          <form  method='post' enctype='multipart/form-data'>
            <div class='form-group'>
              <label for='title'>To</label>
              <input type='text' name='to'  style='max-width:900px;' class='form-control'>
            </div>
			<div class='form-group'>
              <label for='title'>Subject</label></br>
              <input type='text' name='sub' id='subject' class='speech-input'>
            </div>
           
           
            <div class='form-group'>
              <label for='body'>Body</label></br>
              <textarea  class='speech-input' id='bodym' name='msg'></textarea>
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
				";
				
			 include "compose.php"; 
			}
	       else if($chk=="spam")
			{
			include "spamfull.php";
			}    
			else if($chk=="draft")
			{
			include "draft.php";
			}
			
			else if($chk=="trash")
			{
			include_once('trash.php');
			}
			else if($chk=="inbox")
			{
			include_once('inbox.php');
			}
			else if($chk=="edit_profile")
			{
			include_once('edit_profile.php');
			}
			else if($chk=="chngPass")
			{
			include_once('chngPass.php');
			}
			else if($coninb)
			{
			mysqli_query($con,"UPDATE usermail SET status='0' WHERE mail_id='$coninb'");	
			$sql="SELECT * FROM usermail where  mail_id='$coninb'";
			//$sql="SELECT * FROM usermail ORDER BY mail_id DESC";
			$dd=mysqli_query($con,$sql);
			$row=mysqli_fetch_object($dd);
			
			$sender = $row->sen_id;
			$sql2="SELECT * FROM userinfo where  email='$sender'";
			$dd2=mysqli_query($con,$sql2);
			$row1=mysqli_fetch_object($dd2);
			
			echo "<h3 style='margin-left:10px;'>".$row->sub."</h3>&nbsp&nbspon->$row->recDT";
			echo "
				<nav class='navbar navbar-expand-lg bg-primary navbar-dark my-4' s>
						<ul class='navbar-nav'>
							<li class='nav-item active my-2' style='color:white'>
								 <img src='uploads/";
								 $c = $row1->image;
								   if( $c != ""){
												echo $row1->image; 
									}else{
												echo "alt.png"; 
										}
								 
								 echo "' class='rounded-circle'  width='37' height='33'>
								".$row->user_name."
						</li>
						<li class='nav-item'>
								<p class='text-white my-2'><strong>&nbsp&nbsp&nbsp-&nbsp</strong>".$row1->email."</p>
						</li>

						<li class='nav-item active mx-3 my-1'>
								<a class='nav-link' href='reply.php?to=".$row1->email."'><i class='fas fa-reply'></i> Reply</a>
						</li>
						<li class='nav-item active my-1'>
								<a class='nav-link' href='forward.php?coninb=".$coninb."'><i class='fas fa-arrow-circle-right'></i> Forward</a>
						</li>
                        
                            <!--spam-->
                        &nbsp;&nbsp;&nbsp;
                        <li class='nav-item active my-1'>
								<a class='nav-link' href='spam.php?spam=".$coninb."&lol=".$row1->user_id."'><i class='fas fa-bug'></i> Spam</a>
						</li>
                        
                        <!--spam-->
						</ul>
				</nav>
	
			
			";
			echo "<div class='container' style=' word-wrap: break-word;'>" .$row->msg."</div></br></br><spam></spam>";
			if($row->attachement != "")
			{
				echo "<div class='col-12'><br>
				<h4> Attachments</h4>
				<a  href='download.php?download=".$row->attachement."'>Download Attachment ->".$row->attachement."</a>
				</div>	";
			}else
			{
				
			}
			}
			
			else if($consent)
			{
			mysqli_query($con,"UPDATE sentmail SET status='0' WHERE mail_id='$consent'");			
			$sql="SELECT * FROM sentmail where  mail_id='$consent'";
			$dd=mysqli_query($con,$sql);
			$row=mysqli_fetch_object($dd);
			
			$sender = $row->sen_id;
			$sql2="SELECT * FROM userinfo where  email='$sender'";
			$dd2=mysqli_query($con,$sql2);
			$row1=mysqli_fetch_object($dd2);
			
			echo "<h3 style='margin-left:10px;'>".$row->sub."</h3>&nbsp&nbspon->$row->recDT";
			echo "
				<nav class='navbar navbar-expand-lg bg-primary navbar-dark my-4' s>
						<ul class='navbar-nav'>
							<li class='nav-item active my-2' style='color:white'>
								 <img src='uploads/";
								 $c = $row1->image;
								   if( $c != ""){
												echo $row1->image; 
									}else{
												echo "alt.png"; 
										}
								 
								 echo "' class='rounded-circle'  width='37' height='33'>
								".$row->user_name."
						</li>
						<li class='nav-item my-2'>
							<p class='text-white'	<strong>&nbsp-&nbsp</strong>".$row1->email."</p>
						</li>
						<li class='nav-item active mx-3 my-1'>
								<a class='nav-link' href='reply.php?to=".$row1->email."'><i class='fas fa-reply'></i> Reply</a>
						</li>
						<li class='nav-item active my-1'>
								<a class='nav-link'  href='forward.php?consent=".$consent."'><i class='fas fa-arrow-circle-right'></i> Forward</a>
						</li>
                                 <!--spam-->
                        &nbsp;&nbsp;&nbsp;
                        <li class='nav-item active my-1'>
								<a class='nav-link' href='spam.php?spam=".$coninb."&lol=".$row1->user_id."'><i class='fas fa-bug'></i> Spam</a>
						</li>
                        
                        <!--spam-->
						</ul>
				</nav>
	
			
			";
			echo "<div class='container' style=' word-wrap: break-word;'>" .$row->msg."</div></br></br><spam></spam>";
			if($row->attachement != "")
			{
				echo "<div class='col-12'><br>
				<h4> Attachments</h4>
				<a  href='download1.php?download=".$row->attachement."'>Download Attachment ->".$row->attachement."</a>
				</div>	";
			}else
			{
				
			}
			}
			
            
            else if($conspam)
			{
                mysqli_query($con,"UPDATE spam_outer SET status='0' WHERE spam_out_id='$conspam'");			
			$sql="SELECT * FROM spam_outer where spam_out_id='$conspam'";
			$dd=mysqli_query($con,$sql);
			$row=mysqli_fetch_object($dd);
			
			$sender = $row->email;
			$sql2="SELECT * FROM userinfo where  email='$sender'";
			$dd2=mysqli_query($con,$sql2);
			$row1=mysqli_fetch_object($dd2);
			
			echo "<h3 style='margin-left:10px;'>".$row->sub."</h3>&nbsp&nbspon->$row->date";
			echo "
				<nav class='navbar navbar-expand-lg bg-primary navbar-dark my-4' s>
						<ul class='navbar-nav'>
							<li class='nav-item active my-2' style='color:white'>
								 <img src='uploads/";
								 $c = $row1->image;
								   if( $c != ""){
												echo $row1->image; 
									}else{
												echo "alt.png"; 
										}
								 
								 echo "' class='rounded-circle'  width='37' height='33'>
								".$row->user_name."
						</li>
						<li class='nav-item my-2'>
							<p class='text-white'	<strong>&nbsp-&nbsp</strong>".$row1->email."</p>
						</li>
						<li class='nav-item active mx-3 my-1'>
								<a class='nav-link' href='reply.php?to=".$row1->email."'><i class='fas fa-reply'></i> Reply</a>
						</li>
						<li class='nav-item active my-1'>
								<a class='nav-link'  href='forward.php?conspam=".$conspam."'><i class='fas fa-arrow-circle-right'></i> Forward</a>
						</li>
                                 <!--spam-->
                        &nbsp;&nbsp;&nbsp;
                        <li class='nav-item active my-1'>
								<a class='nav-link' href='unspam.php?spam=".$conspam."&lol=".$row1->user_id."'><i class='fas fa-bug'></i> Un-Spam</a>
						</li>
                        
                        <!--spam-->
						</ul>
				</nav>
	
			
			";
				echo "<div class='container' style=' word-wrap: break-word;'>" .$row->msg."</div></br></br><spam></spam>";
			if($row->attachement != "")
			{
				echo "<div class='col-12'><br>
				<h4> Attachments</h4>
				<a  href='download1.php?download=".$row->attachement."'>Download Attachment ->".$row->attachement."</a>
				</div>	";
			}else
			{
				
			}
            }
            
			else if($contrash)
			{
			mysqli_query($con,"UPDATE trash SET status='0' WHERE trash_id='$contrash'");				
			$sql="SELECT * FROM trash where  trash_id='$contrash'";
			$dd=mysqli_query($con,$sql);
			$row=mysqli_fetch_object($dd);
			
			$sender = $row->sen_id;
			$sql1="SELECT * FROM userinfo where  email='$sender'";
			$dd1=mysqli_query($con,$sql1);
			$row1=mysqli_fetch_object($dd1);
			
			echo "<h3 style='margin-left:10px;'>".$row->sub."</h3>&nbsp&nbspon->$row->date";
			echo "
				<nav class='navbar navbar-expand-lg bg-primary navbar-dark my-4' s>
						<ul class='navbar-nav'>
							<li class='nav-item active my-2' style='color:white'>
								 <img src='uploads/";
								 $c = $row1->image;
								   if( $c != ""){
												echo $row1->image; 
									}else{
												echo "alt.png"; 
										}
								 
								 echo "' class='rounded-circle'  width='37' height='33'>
								
						</li>
						<li class='nav-item my-2'>
							<p class='text-white'>	<strong>&nbsp-&nbsp</strong>".$row1->email."</p>
						</li>
						<li class='nav-item active mx-3 my-1'>
								<a class='nav-link' href='reply.php?to=".$row1->email."'><i class='fas fa-reply'></i> Reply</a>
						</li>
						<li class='nav-item active my-1'>
								<a class='nav-link'  href='forward.php?contrash=".$contrash."'><i class='fas fa-arrow-circle-right'></i> Forward</a>
						</li>
                                 <!--spam-->
                        &nbsp;&nbsp;&nbsp;
                        <li class='nav-item active my-1'>
								<a class='nav-link' href='spam.php?spam=".$coninb."&lol=".$row1->user_id."'><i class='fas fa-bug'></i> Spam</a>
						</li>
                        
                        <!--spam-->
						</ul>
				</nav>
	
			
			";
			echo "<div class='container' style=' word-wrap: break-word;'>" .$row->msg."</div></br></br><spam></spam>";
			if($row->image != "")
			{
				echo "<div class='col-12'><br>
				<h4> Attachments</h4>
				<a  href='download.php?download=".$row->image."'>Download Attachment ->".$row->image."</a>
				</div>	";
			}else
			{
				
			}
			}
            

            
            
			else
			{
				include_once('inbox.php');
			}
			
			
		?>

                <!--inbox -->
                <?php
		$id=$_SESSION['id'];
		@$coninb=$_GET['coninb'];
			

			
			
	@$cheklist=$_REQUEST['ch'];
	if(isset($_GET['delete']))
	{
		foreach($cheklist as $v)
		{
		
		$d="DELETE from usermail where mail_id='$v'";
		mysql_query($d);
		}
		echo "msg deleted";
	}
			
		?>





            </div>
        </div>
    </div>










    <!-- POST MODAL 
  <div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">New Message</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form  method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">To</label>
              <input type="text" name='to' class="form-control">
            </div>
			<div class="form-group">
              <label for="title">Subject</label>
              <input type="text" name='sub' class="form-control" >
            </div>
           
           
            <div class="form-group">
              <label for="body">Body</label>
              <textarea  class="speech-input form-control" name='msg' style="height:180px"></textarea>
            </div>
			 <div class="form-group">
              <label for="file">Attachments</label>
              <input type="file" name="file" id="file" class="form-control-file">
              <small class="form-text text-muted">Max Size 3mb</small>
            </div>
         
        </div>
        <div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type='submit' class="btn btn-primary" value='Send' name='send'>
        </div>
		 </form>
      </div>
    </div>
  </div>

-->


    <script src="js/wow/wow.min.js"></script>
    <script src="speech-input.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar-fixed.js"></script>
    <script src="speech-input.js"></script>
    
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="js/script.js"></script>
    
</body>

</html>