<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];
$password=$_POST['password'];
$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
	echo "<script>alert('You are successfully register');</script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
}
}

if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="my-account.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];

$status=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$status=0;

$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Grocery Shopping  | Signi-in | Signup</title>


	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
	

		

		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

   
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	

		<script>
  function myname()
  {
  var n=document.getElementById("fullname");
  var letter=/[A-Za-z]+$/;
  if(n.value == "")
  {
    document.getElementById("consid").innerHTML = "<span class='error'>Please enter a valid name</span>";
        txt1.focus();
        return false;
}
else if(!n.value.match(letter))
  {
    document.getElementById("consid").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
        txt1.focus();
        return false;
  }
  else if(n.value.match(letter))
  {
      document.getElementById("consid").innerHTML = "<span class='error'></span>";
      return false;
  }
}
function mynumb()
   {
     var n=document.getElementById("contactno");
     var e=/([6789][0-9]{9})+$/;
     if(n.value == "")
     {
       document.getElementById("consid20").innerHTML = "<span class='error'>Please enter a valid phone number</span>";
       inputEmail.focus();
           return false;
   }
   else if(!n.value.match(e))
     {
       document.getElementById("consid20").innerHTML = "<span class='error'>This is not a valid phone number. Please try again</span>";
       inputEmail.focus();
           return false;
     }
   else if(n.value.match(e))
       {
         document.getElementById("consid20").innerHTML = "<span class='error'></span>";
             return false;
       }
   }
	function myemail()
   {
     var n=document.getElementById("email");
     var e=/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if(n.value == "")
     {
       document.getElementById("consid3").innerHTML = "<span class='error'>Please enter a valid email Address</span>";
       inputEmail.focus();
           return false;
   }
   else if(!n.value.match(e))
     {
       document.getElementById("consid3").innerHTML = "<span class='error'>This is not a valid email address. Please try again</span>";
       inputEmail.focus();
           return false;
     }
   else if(n.value.match(e))
       {
         document.getElementById("consid3").innerHTML = "<span class='error'></span>";

             return false;
       }
    
       
   }
   function mypassword()
   {
     var n6=document.getElementById("password");
     var ps=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,}/;
     if(n6.value == "")
     {
       document.getElementById("consid7").innerHTML = "<span class='error'>Please enter a valid password</span>";
       txt7.focus();
           return false;
   }
   if(!n6.value.match(ps))
   {
     document.getElementById("consid7").innerHTML = "<span class='error'>This is not a valid password. Please try again</span>";
         txt7.focus();
         return false;
   }
   else if(n6.value.match(ps))
       {
         document.getElementById("consid7").innerHTML = "<span class='error'></span>";
             return false;
       }
   }
function mycpassword()
{
  var n7=document.getElementById("password");
  var n8=document.getElementById("confirmpass");
  if(n8.value == "")
  {
    document.getElementById("consid8").innerHTML = "<span class='error'>Please enter a valid password</span>";
    txt8.focus();
        return false;
}
if(n7.value==n8.value)
{

  document.getElementById("consid8").innerHTML = "<span class='error'></span>";
      return false;
}
else {
  document.getElementById("consid8").innerHTML = "<span class='error'> Password Missmatch</span>";
      txt8.focus();
      return false;
}
}
</script>		
<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function userAvailability()
 {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>



	</head>
    <body class="cnt-home">
	
		
	
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>

</header>
<div class="breadcrumb">
<div class="container">
<div class="breadcrumb-inner">
<ul class="list-inline list-unstyled">
<li><a href="index.php">Home</a></li>

</ul>
</div>
</div>
</div>

<div class="body-content outer-top-bd">
<div class="container">
<div class="sign-in-page inner-bottom-sm">
<div class="row">
							
<div class="col-md-6 col-sm-6 sign-in">
<h4 class="">sign in</h4>
<p class="">Hello, Welcome to your account.</p>
<form class="register-form outer-top-xs" method="post">
<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
			
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>
		
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login">Login</button>
	</form>					
</div>

<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">create a new account</h4>
	<p class="text title-tag-line">Create your own Shopping account.</p>
	<form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
<div class="form-group">
	    	<label class="info-title" for="fullname">Full Name <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" onblur="myname()"  id="fullname" name="fullname" required="required">
			<span id ="consid"></span></td></td></tr>	 
		</div>


		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" onblur="userAvailability()"   id="email" name="emailid" required >
			<span id ="consid3"></span></td></td></tr>		  
			<span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="contactno">Contact No. <span>*</span></label>
			<input type="text" class="form-control unicase-form-control text-input" onblur="mynumb()" id="contactno" name="contactno" maxlength="10" required >
			<span id ="consid20"></span></td></td></tr>	
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="password">Password. <span>*</span></label>
			<input type="password" class="form-control unicase-form-control text-input"  onblur="mypassword() "id="password" name="password"  required >
			<span id ="consid7"></span></td></td></tr>	
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
			<input type="password" class="form-control unicase-form-control text-input" onblur="mycpassword()" id="confirmpassword" name="confirmpassword" required >
			<span id ="consid8"></span></td></td></tr>	
	  	</div>


	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Sign Up</button>
	</form>
	
	</div>
</div>	

		</div>

</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>

</body>
</html>