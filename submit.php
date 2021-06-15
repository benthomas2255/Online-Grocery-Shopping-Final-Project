<?php
session_start();
$totalprice = $_SESSION['total'];
require('configs.php');
include('includes/config.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>$totalprice* 100,
		"currency"=>"inr",
		"description"=>"4 U SHOPPING ",
		"source"=>$token,
	));
	

	//echo "<pre>";
	//print_r($data);

	$tmpid=$_SESSION['id'];
	$queryA = "SELECT * FROM carts WHERE userId = '$tmpid'";
	$resultA=mysqli_query($con,$queryA);
	$rowCheck=mysqli_num_rows($resultA);
	if($rowCheck>0){
		while($roA=mysqli_fetch_array($resultA))  
		{
			$Pid= $roA['productId'];
			$queryB = "SELECT * FROM products where id ='$Pid'";
			$resultB = mysqli_query($con,$queryB);
			$roB=mysqli_fetch_array($resultB);

			$count= $roB['quantity'] - $roA['quantity'];
			$quantity= $roA['quantity'];
			$queryC ="update products SET quantity = '$count' where id ='$Pid'";
			$resultC =mysqli_query($con,$queryC);

			$queryD ="insert into orders(userId,productId,quantity) values($tmpid,$Pid,$quantity)";
			$resultD =mysqli_query($con,$queryD);
			$oid=mysqli_insert_id($con);


		}
		$queryE ="DELETE FROM carts WHERE userId= $tmpid";
		$resultE =mysqli_query($con,$queryE);

		header("location:../orderDetails.php?dd=".$oid);

		
	}
	else{
		header("location:index.php");
	}
	
	header("location:php/BillSentMail.php?dd=".$oid);
	
}
?>