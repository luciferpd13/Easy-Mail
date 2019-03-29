<?php
session_start();
$id=$_SESSION['id'];
include_once('db.php');

 if(!isset($_SESSION['log_in']) )
{
	 echo "<script type='text/javascript'>
                alert('You Have to Login first !!');
				window.location.href='index.html';
            </script>";
}

$v = $_POST['draft'];
	
	mysqli_query($con,"delete FROM draft where mail_id='$v'");

echo "<script>alert('Message Deleted');window.location='mail.php?chk=draft'</script>";
	



?>