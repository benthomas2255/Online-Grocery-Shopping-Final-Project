<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	


</head>
<style>
</head>
<style>

table{
	margin-left:4%;
	/* margin-top:1%; */
	/* border-collapse: collapse;	 */
}

label{
	width: 70%;
}
input[type="text"]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 25%;
    margin: -5% 0 0 6%;
    border-radius: 10px;
}input[type=submit]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 8%;
    margin: 8px 0 15px 1%;
    border-radius: 10px;
}
</style>

<body>

<!-- Home page begins -->
<?php include('include/header.php');?>
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">
<center>

		<br><h1 style="margin-left:4%;">Product List</h1>


			<?php
				include('include/config.php');
                
				// $output ='';
				$counter = 0;

				
				{
					$query = "SELECT * FROM products WHERE quantity <= 10  ORDER BY quantity";
					$result =mysqli_query($con,$query);
					$count = mysqli_num_rows($result);
					?>
						<table class="cart" cellpadding="5" cellspacing="10">
						<tbody>
						<tr>
							<th style="text-align:left;" width="40px">No</th>
							
							<th style="text-align:left;" width="100px">Name</th>
					
							<th style="text-align:left;" width="100px">Price</th>
							<th style="text-align:left;" width="100px">Quantity</th>
							<th style="text-align:left;" width="100px">Edit</th>
				
						</tr>
					<?php
					while($row=mysqli_fetch_array($result))  
					{
						?>
							<tr>
								<td><?php echo ++$counter ?></td>
								<?php 
									$id =$row['id'];
									;?>
						
								<td><?php echo $row['productName'] ?></td>
								<td><?php echo $row['productPrice'] ?></td>						
								<td><?php echo $row['quantity'] ?></td>
								<td><a href="edit-products.php?id=<?php echo $id ?>">Edit</a></td>
							
							</tr> 
						<?php
					}
				}
			?> 		
		</form>
	</div>
				</center>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>

</body>
</html>