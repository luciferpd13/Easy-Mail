<h1 align="center">Profile Settings</h1>
<?php
include_once('db.php');
$id=$_SESSION['id'];

 if(!isset($_SESSION['log_in']) )
{
	 echo "<script type='text/javascript'>
                alert('You Have to Login first !!');
				window.location.href='index.html';
            </script>";
}

$sql="SELECT user_name,email,gender,dob,image FROM userinfo where user_id='$id'";
$dd=mysqli_query($con,$sql);
$num = mysqli_fetch_array($dd);
if($num > 0 )
{
	$uname = $num['user_name'];
	$email = $num['email'];
	$gender = $num['gender'];
	$dob = $num['dob'];
	$photo = $num['image'];
}
?>
<?php 


if(isset($_REQUEST["change"]))
{
    $name=$_REQUEST['signupName'];
	$gender = $_REQUEST['gender'];
	$dob = $_REQUEST['date'];


		
if(isset($_FILES['file']['name']) && ($_FILES['file']['name']!="") )
			   {
				$source_file=$_FILES["file"]["tmp_name"];
                $target_file="uploads/".$_FILES["file"]["name"];
				unlink("uploads/$photo");
				
			if(move_uploaded_file($source_file, $target_file))
			{
			$imagename=$_FILES['file']['name'];
		$msg=mysqli_query($con,"UPDATE userinfo SET user_name='$name',gender='$gender',dob='$dob',image='$imagename' where user_id = $id");
			echo "<script type='text/javascript'>
                alert('Profile Modified');
				window.location.href='mail.php';
            </script>";
			}
			
	else{
		echo "<script type='text/javascript'>
                alert('Can't Upload your Image');
			
            </script>";
	}

}else{
	
	$msg=mysqli_query($con,"UPDATE userinfo SET user_name='$name',gender='$gender',dob='$dob' where user_id = $id");
		echo "<script type='text/javascript'>
                alert('Profile Modified');
				window.location.href='mail.php';
            </script>";
}
}
?>

 <form  method="post" enctype="multipart/form-data">
<div class='register'>
                <div class='row'>
                    <div class='col-md-3 register-left wow slideInDown' data-wow-duration='1s'>
                        <a href='#'><img src='img/mlogo.png'  alt=''/></a>
                       
                    </div>
                    <div class='col-md-9 register-right wow slideInRight' data-wow-duration='1s'>
                 
                        <div class='tab-content' id='myTabContent'>
                            <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                <div class='row register-form'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                          </br>  <input type='text' class='form-control'  style="width:350px;" name='signupName' placeholder='Full Name *' value='<?php echo $uname ?>'/>
                                        </div>
                                        
          									
                                        <div class='form-group my-2'>
                                            <div class='maxl'>
                                           
  <input type='radio' name='gender' value='f'  <?php echo ($gender=='f')?'checked':'' ?>>Female
  <input type='radio' name='gender'  value='m' <?php echo ($gender=='m')?'checked':'' ?>>Male
  <input type='radio' name='gender' value='o' <?php echo ($gender=='o')?'checked':'' ?>>Other  
                                            </div>
                                        </div>
			 
                                    </div>
                               
                                        <div class='col-md-12 my-2'>
                                        <div class="form-group">
											<label for="file">Uplode your Image</label>
											<input type="file" name="file" id="file" class="form-control-file">
										</div>
										</div>	
									   
										

                                       <div class='col-md-12 my-2'>
                                        <div class='form-group'>
                                            <input type='date' name='date' style="width:200px;" value='<?php echo $dob ?>' class='form-control' />
                                        </div>
									
										</div>
											<div class='col-md-12'>
                                        <input type='submit' class='btn btn-primary' name='change' value='Change'/>
										
										</div>
										<br><br><br><br><h1></h1>
                                    
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

            </div>
</form>

