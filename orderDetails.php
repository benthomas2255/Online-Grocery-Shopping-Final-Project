<?php 
session_start();
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

	    <title>Order History</title>
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


	<link rel="stylesheet" type="text/css" href="css\registration.css" />


<style>
	
	.odbox {
		padding: 10px ;
		display: flex;
		border: 1px solid black;
		width:32%;
		margin-left: 20px;
		}

	.odbox1 {
	
		float: left;
		padding: 10px;
	}  
	.odcenter {
		position: absolute;
		left: 46%;
		top: 45%;
		width:auto%;
		height:auto%;
		border:1;
		border: 1px solid black;
		/* background-color:red; */
		}
	/* .odright {
		position: absolute;
		left: 70%;
		top: 35%;
		width:25%;
		height:25%;
		margin-left:3%;
		padding: 10px ;
		display: flex;
		background-color:red;
		} */
	#osmry{
		position: absolute;
		left: 46%;
		top: 36%;
	}
</style>
</head>

<body>
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<br>
		<h2 style="margin-left:1.5%;">Order Details</h2><br>

		<div class=""></div>
			<?php
		
				$counter = 0;
				$tmpid=$_SESSION['id'];
				$oid=$_GET['dd'];

				$query1="select * from orders where id = $oid";
				$result1 =mysqli_query($con,$query1);
				$row1=mysqli_fetch_array($result1);
				$date= $row1['orderDate'];
				$date= substr_replace($date,"", -3);
				
				echo "<h4>&emsp;&nbsp;Order Date: ".$date."</h5>";
				$gtotal =0;
			
				
				$namearray=array();
				$totalarray=array();

				$query="select * from orders where userId = $tmpid and orderDate LIKE '$date%'";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{	
					$id=$row['productId'];
					$quer="select * from products where id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
					
					
					//$image = $ro['image'];
					//$image_src = "uploads/".$image;?><br><br>
					      
					<div class="odbox">
						<div class="odbox1">
			
						</div>
						<DIV class="odbox1">
							<?php 
							echo "Name" ;?><br><?php
							echo "Price" ;?><br><?php
							echo "Quantity";?><br><?php
							echo "Total";?><br>
						</DIV>						
						<DIV class="odbox1">
							<?php 
								array_push($namearray, $ro['productName']);
							echo ": ".$ro['productName'] ;?><br><?php
								// echo ": ".$namearray[$counter] ;
							echo ": ".$ro['productPrice'] ;?><br><?php
							echo ": ".$row['quantity'];?><br><?php
								$total=$row['quantity']*$ro['productPrice'];
								array_push($totalarray, $total);
							echo ": ".$total ;
								$gtotal += $total;
								$counter++ ; ?><br>
						</DIV>
					</div>
					<?php
				}?>
				
				<h3 id="osmry">Order Summary</h3><br>
				<div class="odcenter">
					<!-- <br><h1 id="osmry">Order Summary</h1><br> -->
						<DIV class="odbox1"><?php
							$x=0;
								while($x<$counter){
									echo $namearray[$x] ;
									$x++;?><br><?php
								}?><?php
						
							echo "<h3>Order Total</h3>";?><br>

						</DIV>						
						<DIV class="odbox1"><?php
								$x=0;
								while($x<$counter){
									echo ": ".$totalarray[$x] ;
									$x++;?><br><?php
								}?><?php
							
								echo "<h3>: ".number_format((float)$gtotal, 2, '.', '')."</h3>";?><br>

						</DIV>
				</div>
				<!-- <div class="odright">
						<p>Shipment Details</p>
				</div> -->

				<?php
			?>
	</div>
</body>
</html>