
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<style>
.list-type5{
width:410px;
margin:0 auto;
}
.list-type5 ol {
list-style-type: none;
list-style-type: decimal !ie; 
margin-left: 1em;
padding: 0;
counter-reset: li-counter;
}
.list-type5 ol li{
position: relative;
margin-bottom: 1.5em;
padding: 0.5em;
background-color: #F0D756;
padding-left: 58px;
}

.list-type5 a{
text-decoration:none;
color:black;
font-size:15px;
font-family: 'Raleway', sans-serif;
}

.list-type5 li:hover{
box-shadow:inset -1em 0 #6CD6CC;
-webkit-transition: box-shadow 0.5s; /* For Safari 3.1 to 6.0 */
transition: box-shadow 0.5s;
}

.list-type5 ol li:before {
position: absolute;
top: -0.3em;
left: -0.5em;
width: 1.8em;
height: 1.2em;
font-size: 2em;
line-height: 1.2;
font-weight: bold;
text-align: center;
color: white;
background-color: #6CD6CC;
transform: rotate(-20deg);
-ms-transform: rotate(-20deg);
-webkit-transform: rotate(-20deg);
z-index: 99;
overflow: hidden;
content: counter(li-counter);
counter-increment: li-counter;
}

</style>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| </title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	

</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Admin DASHBOARD</h3>
							</div>
							<div class="module-body">
			<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
									
<div class="control-group">

</div>
<div class="list-type5">
<ol>
<li><a href="category.php">Create Category</a></li>
<li><a href="subcategory.php">Create Sub Category</a></li>
<li><a href="insert-product.php">Insert Product</a></li>
<li><a href="manage-products.php">Manage Products</a></li>
		<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
						
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Order Management
									</ol>
								</a>
								<br>
								<ul  style="list-style-type:disc;"	 id="togglePages" class="collapse unstyled">
									<li>
										<a href="todays-orders.php">
											<i class="icon-tasks"></i>
											Today's Orders
										</a>
									</li>
									<li>
										<a href="pending-orders.php">
											<i class="icon-tasks"></i>
											Pending Orders
										<?php	
	$status='Delivered';									 
$ret = mysqli_query($con,"SELECT * FROM orders where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="delivered-orders.php">
											<i class="icon-inbox"></i>
											Delivered Orders
								<?php	
	$status='Delivered';									 
$rt = mysqli_query($con,"SELECT * FROM orders where orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
							

</div>

                               
</div>
										</div>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
