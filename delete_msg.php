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
//echo $v;
$sql=mysqli_query($con,"SELECT * FROM usermail where rec_id='$id' and mail_id='$v'");
$dd=mysqli_fetch_array($sql);
	if($dd>0)
	{
	$rec=$dd['rec_id'];
	$sen=$dd['sen_id'];
	$sub=$dd['sub'];
	$msg=$dd['msg'];
	$att=$dd['attachement'];
	//store into trash table
	mysqli_query($con,"insert into trash(rec_id,sen_id,sub,msg,image,date,status) values('$rec','$sen','$sub','$msg','$att',now(),'1')");
	
	//delete form inbox
	
	mysqli_query($con,"delete FROM usermail where mail_id='$v'");

	}
	
}
echo "<script>alert('Message Deleted');window.location='mail.php?chk=inbox'</script>";
}
?>