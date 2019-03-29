<?php
include_once('db.php');
@$to=$_REQUEST['to'];
@$sub=$_REQUEST['sub'];
@$msg=$_REQUEST['msg'];
$text = nl2br(str_replace(" ", "&nbsp", $msg));
$id=$_SESSION['id'];
//

	$daa =mysqli_query($con,"SELECT * FROM userinfo where user_id='$id'");
	$numaa =mysqli_fetch_array($daa);	
	if($numaa>0){
		@$to1 = $numaa['email'];
	}
	
//



 if(!isset($_SESSION['log_in']) )
{
	 echo "<script type='text/javascript'>
                alert('You Have to Login first !!');
				window.location.href='index.html';
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


//	
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
                $id2 = $num1['user_id'];	
			   $email1 = $num1['email'];
			   $email = $num['email'];
				$name1 = $num1['user_name'];
		
   //spam section
     
            
    $d3 =mysqli_query($con,"SELECT spammer FROM spam_inner where spamed_email=$id2");
	$num3=mysqli_fetch_array($d3);	
          if($num3>0){  

              
	foreach ($num3 as $value) {
            if($value == $id1 ){
        if(move_uploaded_file($source_file, $target_file))
           {        
		if(copy("attachement/".$imagename."","attachement1/".$imagename.""))
		{
            //counter
            
             mysqli_query($con,"INSERT INTO counter(sender,receiver) values($id2,$id1)");
    $d9 =mysqli_query($con,"SELECT COUNT(*) FROM counter where sender='$id2' and receiver='$id1'");
	$num9 =mysqli_fetch_array($d9);	
	if($num9>0){
     $check = $num9['COUNT(*)'];   
    }
        if($check>30){
            echo "
        <script>
        alert('Sorry you cannot send more than 30 messages to same email. Thats under Policy voilation');
        window.location.href='mail.php';
        </script>
        ";
        exit;
       
    }
            
            
     //counter end   
		mysqli_query($con,"INSERT INTO spam_outer(rec_id,email,user_name,sub,msg,attachement,date,status) values('$id1','$email1','$name1','$sub','$text','$imagename',sysdate(),'1')");

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
   //counter
            
             mysqli_query($con,"INSERT INTO counter(sender,receiver) values($id2,$id1)");
    $d9 =mysqli_query($con,"SELECT COUNT(*) FROM counter where sender='$id2' and receiver='$id1'");
	$num9 =mysqli_fetch_array($d9);	
	if($num9>0){
     $check = $num9['COUNT(*)'];   
    }
        if($check>30){
            echo "
        <script>
        alert('Sorry you cannot send more than 30 messages to same email. Thats under Policy voilation');
        window.location.href='mail.php';
        </script>
        ";
        exit;
       
    }
            
            
     //counter end  
            
		mysqli_query($con,"INSERT INTO spam_outer(rec_id,email,user_name,sub,msg,date,status) values('$id1','$email1','$name1','$sub','$text',sysdate(),'1')");
		mysqli_query($con,"INSERT INTO sentmail(rec_id,sen_id,user_name,sub,msg,recDT,status) values('$id','$email','$name','$sub','$text',sysdate(),'1')");
		echo "
		<script>
		alert('Message Sent');
		window.location.href='mail.php';
		</script>";
		   }
            exit;
		
	}}
    
 }
        else{
              
         //spam end  

       if(move_uploaded_file($source_file, $target_file))
           {        
		if(copy("attachement/".$imagename."","attachement1/".$imagename.""))
		{
        //counter
            
             mysqli_query($con,"INSERT INTO counter(sender,receiver) values($id2,$id1)");
    $d9 =mysqli_query($con,"SELECT COUNT(*) FROM counter where sender='$id2' and receiver='$id1'");
	$num9 =mysqli_fetch_array($d9);	
	if($num9>0){
     $check = $num9['COUNT(*)'];   
    }
        if($check>30){
            echo "
        <script>
        alert('Sorry you cannot send more than 30 messages to same email. Thats under Policy voilation');
        window.location.href='mail.php';
        </script>
        ";
        exit;
       
    }
            
            
     //counter end  
        mysqli_query($con,"INSERT INTO usermail(rec_id,sen_id,user_name,sub,msg,attachement,recDT,status) values('$id1','$email1','$name1','$sub','$text','$imagename',sysdate(),'1')");
	
		mysqli_query($con,"INSERT INTO sentmail(rec_id,sen_id,user_name,sub,msg,attachement,recDT,status) values('$id','$email','$name','$sub','$text','$imagename',sysdate(),'1')");
		echo "
		<script>
		alert('Message Sent');
		window.location.href='mail.php';
		</script>";
		
		}  }else{
			   $name = $num['user_name'];
               $id1 = $num['user_id'];		
			   $email1 = $num1['email'];
			   $email = $num['email'];
				$name1 = $num1['user_name'];	
          //counter
            
             mysqli_query($con,"INSERT INTO counter(sender,receiver) values($id2,$id1)");
    $d9 =mysqli_query($con,"SELECT COUNT(*) FROM counter where sender='$id2' and receiver='$id1'");
	$num9 =mysqli_fetch_array($d9);	
	if($num9>0){
     $check = $num9['COUNT(*)'];   
    }
        if($check>30){
            echo "
        <script>
        alert('Sorry you cannot send more than 30 messages to same email. Thats under Policy voilation');
        window.location.href='mail.php';
        </script>
        ";
        exit;
       
    }
            
            
     //counter end  
		mysqli_query($con,"INSERT INTO usermail(rec_id,sen_id,user_name,sub,msg,recDT,status) values('$id1','$email1','$name1','$sub','$text',sysdate(),'1')");
		mysqli_query($con,"INSERT INTO sentmail(rec_id,sen_id,user_name,sub,msg,recDT,status) values('$id','$email','$name','$sub','$text',sysdate(),'1')");
		echo "
		<script>
		alert('Message Sent');
		window.location.href='mail.php';
		</script>";
           exit;
		   }

	}
    }
}	
    } } 
if(isset($_REQUEST['draft']))
{
  

		mysqli_query($con,"INSERT INTO draft(rec_id,email,sub,msg,date,status) values('$id','$to','$sub','$text',sysdate(),'1')");

		echo "
		<script>
		alert('Message Saved');
		window.location.href='mail.php';
		</script>";
		
	}





	
?>

