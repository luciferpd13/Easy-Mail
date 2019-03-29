<?php 
include "registermain.php";
 ?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign-up</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="login2.css">
  <link rel="shortcut icon" href="img/mlogo.png" />
  <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
function checkname()
{
 var name=document.getElementById( "UserName" ).value;
	
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="Available")	
   {
	   $("#name_status").css('color', '#0AC02A', 'important');
    return true;
   }
   else
   {
	   $("#name_status").css('color', '#FF0004', 'important');
    return false;
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}
</script>
</head>
<body>
   
  <form  method="post"  > 
<div class="register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <a href='index.html'><img src="img/mlogo.png"  alt=""/></a>
                        <h3>Welcome</h3>
                    </div>
                    <div class="col-md-9 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Sign-up</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="signupName" placeholder="Full Name *" value="" required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" id="pass1" class="form-control" name="signupPass1" placeholder="Password *" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="pass2" class="form-control" name="signupPass2" onchange="password()" placeholder="Confirm Password *" value="" required/>
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
                                        <div class="form-group">
                                            <div class="maxl">
                                           
  <input type="radio" name="gender" value="f" >Female
  <input type="radio" name="gender"  value="m" >Male
  <input type="radio" name="gender" value="o" >Other  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="UserName" id="UserName" onkeyup="checkname();" class="form-control" onchange="email()"  placeholder="Your Email *" value="" required/>
										
									   </div>
										<p id='name_status'> </p>

										
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="12" name="signupContact" class="form-control" placeholder="Your Phone *" value="" required/>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="date" name="date" class="form-control" required/>
                                        </div>
                                        <input type="submit" class="btnRegister" name="signup" value="Register"/>
										
										<a href="login.php" class="btnRegister" style="text-decoration: none;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLogin-Page?</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

            </div>
</form>



</body>
</html>

