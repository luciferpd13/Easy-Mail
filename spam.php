<?php 
session_start();
$id=$_SESSION['id'];
include_once('db.php');
$spam_id = $_GET['spam'];
$spammer = $_GET['lol'];
$check = mysqli_query($con,"Insert into spam_inner(spammer,spamed_email) values($id,$spammer)");
 echo "
 <script>
        alert('This email is Spammed now. From now You will recieve mail from this email on your spam box');
        window.location = 'mail.php';
 </script>
 ";
?>