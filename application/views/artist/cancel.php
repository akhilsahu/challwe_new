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
					<li>Payment Cancel</li>
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
		<h3>Dear <?php echo $user['txt_fname']." ".$user['txt_lname'];?></h3>
    <p>We are sorry! Your last transaction was cancelled.</p>
	</div>
	<br>
	<hr><br>
</div>