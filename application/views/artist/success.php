<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2Wallet</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Payment Success</li>
				</ul>
			</nav>
		</div>

	</div>
</div>

<!-- Content
================================================== -->
<div class="container">
	
	<!-- Table -->
	<div class="sixteen columns">
			<span style="float:right;">
				<a href="<?php echo site_url();?>/wallet/addAmount" class=" button">Add Coins To Wallet</a>
			</span>
	</div>
	<div class="sixteen columns">
		<h2>Dear <?php echo $user['txt_fname']." ".$user['txt_lname'];?></h2>
		<span>Your payment was successful, thank you.</span><br/>
		<span>TXN ID : 
			<strong><?php echo $txn_id; ?></strong>
		</span><br/>
		<span>Amount Paid : 
			<strong>$<?php echo $payment_amt.' '.$currency_code; ?></strong>
		</span><br/>
		<span>Payment Status : 
			<strong><?php echo $status; ?></strong>
		</span><br/>
	</div>
	<br>
	<hr><br>
</div>