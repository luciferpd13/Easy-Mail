  
<?php
include "db.php";



//for sign up
if(isset($_REQUEST["signup"]))
{
    $name=$_REQUEST['signupName'];
	$email=$_REQUEST['UserName'];
	$password1=$_REQUEST['signupPass1'];
	$password2=$_REQUEST['signupPass2'];
	$gender = $_REQUEST['gender'];
	$contact=$_REQUEST['signupContact'];
	$dob = $_REQUEST['date'];
	$enc_password=md5(md5($password1));
	$email1 = '@easymail.com';

if (strcmp($password1,$password2) == 0)
{
	if (strpos($email,$email1) !== false) {
		$row1=mysqli_query($con,"select * from userinfo WHERE email='$email'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{	
	echo "<script type='text/javascript'>
                alert('This Email already exists !');			
            </script>";
}else{	
		
	$msg=mysqli_query($con,"insert into userinfo(user_name,password,mobile,email,gender,dob) values('$name','$enc_password',$contact,'$email','$gender','$dob')");
	echo "<script type='text/javascript'>
                alert('Congratulations You have been registered now you can Login !!');
				window.location.href='register.php';
            </script>";
	}}else{
		echo "<script type='text/javascript'>
                alert('failed');
			
            </script>";
	}
}
}
?>


