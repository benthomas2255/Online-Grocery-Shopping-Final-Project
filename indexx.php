<?php
require('configs.php');
session_start();
$totalprice = $_SESSION['total'];
?>
<form action="submit.php" method="post" style="position:absolute;padding-left:45%;padding-top:15%" >
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount=<?php echo $totalprice* 100 ?>
		data-name="4 U Grocery Shopping "
		data-description="Payment for your order"

		data-currency="inr"
		data-email="benthomas965@gmail.com"
	>
	</script>

</form>