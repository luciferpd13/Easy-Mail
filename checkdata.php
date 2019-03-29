<?php
$db_host='localhost';
$db_user='root';
$db_pwd='';
$database='easymail';
$email1 = '@easymail.com';

if(!mysql_connect($db_host,$db_user,$db_pwd))
die("can't Connect to Database");

if(!mysql_select_db($database))
die("can't Select Database");


if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $checkdata="SELECT * FROM userinfo WHERE email='$name'";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "User Name Already Exist";
 }
 else if(strpos($name,$email1) == false)
 {
  echo "Email must end with xxx@easymail.com";
 }else{
	 echo "Available";
 }
 exit();
}
?>