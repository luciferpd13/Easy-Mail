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

if(isset($_POST['name'])) 
{
$v = $_POST['name'] ;
{	
	
	$sql1="SELECT image FROM trash where rec_id='$id'";
	$dd1=mysqli_query($con,$sql1);
	$row1=mysqli_fetch_array($dd1);
	if($row1>0)
	{
		$image1 = $row1['image'];
	}

	unlink("attachement/$image1");

	
	mysqli_query($con,"delete FROM trash where trash_id=$v");

	}
	echo "<script>alert('Message Deleted');window.location='mail.php?chk=inbox'</script>";
}


?>