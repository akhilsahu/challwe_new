<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Active Contest</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Contest List</li>
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
				<a href="<?php echo site_url();?>/artist/myContest" class=" button">My Contest</a>
				<a href="<?php echo site_url();?>/artist/addContest" class=" button">Create Contest</a>
			</span>
		<?php }?>
	

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
		/*	echo "<pre><br>";
			print_r($directory);
*/



			foreach($list as $val){

				$getskill = "";
				if($val['int_skill1']){
					$getskill = $val['txt_field_name']." ";
				}else if($val['int_skill2']){
					$getskill .= $val['txt_field_name']." ";
				}else if($val['int_skill3']){
					$getskill .= $val['txt_field_name']." ";
				}else if($val['int_skill4']){
					$getskill .= $val['txt_field_name']." ";
				}else if($val['int_skill5']){
					$getskill .= $val['txt_field_name']." ";
				}

				$s_date=date_create($val['dt_start_date']);
				$c_date=date_create($val['dt_last_date']);
				?>
			<tr>
				<td class="alert-name"><?php echo $val['txt_contest_name'];?></td>
				<td><?php echo date_format($s_date,"F j, Y");?></td>
				<td><?php echo date_format($c_date,"F j, Y");?></td>
				<td class="keywords"><?php echo $getskill;?></td>
				<td>$ <?php echo $val['txt_budget'];?></td>
				<td class="action">
					<?php /*<a href="<?php echo site_url();?>/content/showContest"><i class="fa fa-check-circle-o"></i> Show Contest</a>
					<a href="#"><i class="fa fa-eye-slash"></i> participate</a>*/ ?>
				</td>
			</tr>
			<?php }?>

		</table>
	<br>
	<br>	
	</div>

</div>
