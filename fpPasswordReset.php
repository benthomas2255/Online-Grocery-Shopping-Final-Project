<?php
session_start();
error_reporting(0);
include('includes/config.php');



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

	    <title> forgot password</title>


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
	

		




	</head>
	<script>
		function myemail()
	{
		// window.alert('Done');

		var n=document.getElementById("email");
		var letter=/^([a-zA-Z0-9._-]{4,30})+@([a-zA-Z.-]{2,10})+\.([a-zA-Z]{2,4})$/;
			if(n.value == "")
			{
				n.placeholder ="Email id is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Enter valid Email id";
			}
	}
	function ee()
	{
		document.getElementById('err').style.cssText="visibility: hidden";

	}
    }

</script>
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
<li><a href="index.php">Reset password</a></li>

</ul>
</div>
</div>
</div>

<div class="body-content outer-top-bd">
<div class="container">
<div class="sign-in-page inner-bottom-sm">
<div class="row">
<?php
			if(isset($_SESSION['login']))
			{
		?>

							
<div class="col-md-6 col-sm-6 sign-in">
<h4 class="">Create New Password </h4>

<form class="register-form outer-top-xs" action="fpPasswordUpdation.php" method="post">
<span style="color:red;" >

	</span>
		<div class="form-group">
	
		    <label class="info-title" for="exampleInputEmail1">Password<span>*</span></label>
		    <input type="password"  class="form-control unicase-form-control text-input" name =password id="p1"  onblur="pass()" required >
            <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
		    <input type="password" name="pass2" class="form-control unicase-form-control text-input" name =pass2 id="p2"  onblur="pass()" required  >
			
		
		<br>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="rp">Submit</button>
	</form>					
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

<?php
    }
    else{
        header("location:fpEnterMail.php");
    }

?>