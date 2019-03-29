<h1 align="center">Change Password</h1>
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

if(isset($_REQUEST["passchange"]))
{

	$password1=$_REQUEST['signupPass1'];
	$password2=$_REQUEST['signupPass2'];
	$enc_password=md5(md5($password1));

if (strcmp($password1,$password2) == 0)
{
	
		
	$msg=mysqli_query($con,"Update userinfo set password='$enc_password' where user_id='$id'");
	echo "<script type='text/javascript'>
                alert('Your Password Has reset. Log In Again With your new password !!');
				window.location.href='logout.php';
            </script>";
	}else{
		echo "<script type='text/javascript'>
                alert('failed');
			
            </script>";
	}
}

?>

 <form  method="post">
<div class='register'>
                <div class='row'>
                    <div class='col-md-3 register-left wow slideInDown' data-wow-duration='1s'>
                        <a href='#'><img src='img/mlogo.png'  alt=''/></a>
                       
                    </div>
                    <div class='col-md-9 register-right wow slideInRight' data-wow-duration='1s'>
                 
                        <div class='tab-content' id='myTabContent'>
                            <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                <div class='row register-form'>
                                    <div class='col-md-6 my-3'>
                                        <div class="form-group">
                                            <input type="password" id="pass1" class="form-control" name="signupPass1" onchange="password()" placeholder="Enter Your New Password *" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="pass2" class="form-control" name="signupPass2" onchange="password()" placeholder="Confirm New Password *" value="" required/>
                                        </div>
										<div>
										<p id="passcheck"> </p>
										</div>
<script type="text/javascript">
function password() {
  var x = document.getElementById("pass1").value;
  var y = document.getElementById("pass2").value;
  var n = x.localeCompare(y);
  document.getElementById("passcheck").innerHTML = n;
  if(n == 0)
  {
  document.getElementById("passcheck").innerHTML = "Password Matched";
  }else{
  document.getElementById("passcheck").innerHTML = "Password Do Not Match";  
  }
}
</script>	
    
										<div class='col'>
                                        <input type='submit' class='btn btn-primary' name='passchange' value='Change'/>
										
										</div>
										</div>
										
										
                                    
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

            </div>
</form>

