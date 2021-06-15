<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />
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
</head>
<style>

table{
	margin-left:4%;
	/* margin-top:1%; */
	
}
label{
	width: 70%;
}
input[type="file"],[type=button]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 40%;
    margin: 8px 0;
    border-radius: 10px;
}
</style>

<body>
<?php include('include/header.php');?>
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

	

		<br><h1 style="margin-left:4%;">New Messages</h1><br>

		<table class="cart" cellpadding="5" cellspacing="10">
			<tbody>
			<tr>
				<th style="text-align:left;" width="40px">No</th>
				<th style="text-align:left;" width="100px">Name</th>
				<th style="text-align:left;" width="300px">Message</th>
				<th style="text-align:left;" width="100px">Date</th>
				<th style="text-align:left;" width="100px">Mobile</th>
				<th style="text-align:left;" width="100px">Delete</th>

			</tr>
			<?php
				$counter = 0;
			
				include('include/config.php');
				$query="select * from chat_message ORDER BY ms_id DESC";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{?>
					<tr>
					<td><?php echo ++$counter ?></td>
					<?php
					$mid =$row['ms_id'];
					$id=$row['L_id'];
					$quer="select * from users where id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
					$quer2="select * from users where id=$id";
					$resl2 =mysqli_query($con,$quer2);
					$ro2=mysqli_fetch_array($resl2);
					// echo count($ro);
					?>
					<td><?php echo $ro['name'] ?></td>
					<td><?php echo $row['message'] ?></td>
					<td><?php echo $row['date'] ?></td>
					<td><?php echo $ro2['contactno'] ?></td><br>
					<td><a href="DeleteMsg.php?mid=<?php echo $mid ?>"><img src="images\icon-delete.png" /></a></td>


					</tr>
					<?php
				}
			?> 		
			
			
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>

</body>
</html>