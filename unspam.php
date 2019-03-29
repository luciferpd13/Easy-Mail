<?php
$id = $_GET['spam'];
session_start();
$id=$_SESSION['id'];
include_once('db.php');

mysqli_query($con,"delete from spam_inner where spammer=$id");
 echo "<script type='text/javascript'>
                alert('You have unspam this email.Now you will recieve regular email');
				window.location.href='mail.php';
            </script>";

?>