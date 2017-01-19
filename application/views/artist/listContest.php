<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Active Challenges</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Challenge List</li>
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
			<span style="float:right;">
				<a href="<?php echo site_url();?>/artist/myContest" class=" button">My Challenges</a>
				
				<a href="<?php echo site_url();?>/artist/manageContest" class=" button">Manage Contest</a>
			</span>
		<?php }?>
		<!-- <a href="<?php echo site_url();?>/artist/addContest" class=" button">Create Contest</a> -->

		<table class="manage-table resumes responsive-table">

			<tr>
				<th><i class="fa fa-file-text"></i> Title</th>
				<th><i class="fa fa-calendar"></i> Start Date</th>
				<th><i class="fa fa-calendar"></i> Date Closed</th>
				<th><i class="fa fa-tags"></i> Skills</th>
				<th><i class="fa fa-map-marker"></i> Price</th>
				<th></th>
			</tr>

			<!-- Item #1 -->
			<?php 

			foreach($list as $val){


				$s_date=date_create($val['dt_start_date']);
				$c_date=date_create($val['dt_last_date']);
				?>
			<tr>
				<td class="alert-name"><?php echo $val['txt_contest_name'];?></td>
				<td><?php echo date_format($s_date,"F j, Y");?></td>
				<td><?php echo date_format($c_date,"F j, Y");?></td>
				<td class="keywords"><?php echo $val['skills'];?></td>
				<td>$ <?php echo $val['txt_budget'];?></td>
				<td class="action">
					<a href="<?php echo site_url();?>/content/showContest?id=<?php echo $val["int_contest_id"]?>"><i class="fa fa-check-circle-o"></i> Show Challenge</a>
					<?php if($val['user_status'] == '' && $user['int_artist_id'] ){?>
					<a onclick="javascript:
					if(confirm('Are you sure? You want to participate in contest?')){
						setparticipate('<?php echo $val["int_contest_id"]?>');
					}"><i class="fa fa-eye-slash"></i> participate</a>
					<?php } ?>
				</td>
			</tr>
			<?php }?>

		</table>
	<br>
	<br>	
	</div>

</div>
<script type="text/javascript">
	function setparticipate(id){
	$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>/artist/updateparticipate",
			data: { 'id' : id  } ,
			cache: false,
			success: function(data) {
				window.location='<?php echo site_url(); ?>/content/listcontest/';
			}
	});
}
</script>
