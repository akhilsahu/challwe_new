<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>My Transactions</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>My Transaction History</li>
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

		<?php if($user['logged_in']){?>
			<span style="float:right;padding-right:5%;">
				<a href="<?php echo site_url();?>/wallet/addAmount" class=" button">Buy Coins</a>
			</span>
		<?php }?>

		<table class="manage-table resumes responsive-table">

			<tr>
				<th><i class="fa fa-file-text"></i> Transaction Id</th>
				<th><i class="fa fa-calendar"></i> Amount</th>
				<th><i class="fa fa-calendar"></i> Date</th>
				<th><i class="fa fa-tags"></i> Payer Email</th>
				<th><i class="fa fa-map-marker"></i> Status</th>
				<th></th>
			</tr>

			<?php foreach($list as $val){?>
				<tr>
					<td class="alert-name"><?php echo $val['txn_id'];?></td>
					<td><?php echo $val['currency_code']." ".$val['payment_gross'];?></td>
					<td><?php 
						$s_date=date_create($val['dt_payment_date']);
						echo date_format($s_date,"F j, Y");?></td>
					<td><?php echo $val['payer_email'];?></td>
					<td><?php if($val['payment_status']==1) echo "<span class='btn btn-success'>Complete</span>";
							else if($val['payment_status']==2) echo "<span class='btn btn-danger'>Failed</span>";
							else echo "<span class='btn btn-warning'>Pending</span>";?>
					</td>
				</tr>
			<?php }?>

		</table>

		<br>
		</div>
	</div>

</div>
