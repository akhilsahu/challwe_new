<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<div id="wrapper">


<!-- Header
================================================== -->
<div class="clearfix"></div>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="photo-bg" style="background: url(<?php echo base_url();?>assets/images/job-page-photo.jpg)">
	<div class="container">
		<div class="ten columns">
			<span><a href="browse-jobs.html">Show Contest</a></span>
			<h2>Home > Show Contets <span class="full-time">Contst</span></h2>
		</div>

		<div class="six columns">
		<?php if($list[0]['int_status'] != 1){ ?>
			<a href="#"  onclick="javascript:
					if(confirm('Are you sure? You want to participate in contest?')){
						setparticipate('<?php echo $list[0]["int_contest_id"]?>','<?php echo $list[0]['int_created_by'] ?>');
					}" class="button white"></i>Participate</a>
		<?php }else{ ?>
			<a href="#" class="button white"><?php echo "Participated"; ?></a>
			<?php } ?>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<?php 
		$s_date=date_create($val['dt_start_date']);
		$c_date=date_create($val['dt_last_date']);

	?>
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		<!-- Company Info -->
		<div class="company-info">
			<div class="content">
				<h4><?php echo $list[0]['txt_contest_name']; ?></h4>
				
			</div>
			<div class="clearfix"></div>
		</div>

		<p class="margin-reset">
			<div><?php echo $list[0]['txt_contest_description']; ?></div>
		</p>

		
	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Overview</h4>

			<div class="job-overview">
				
				<ul>
					
					<li>
						<i class="fa fa-file-text"></i>
						<div>
							<strong>Title:</strong>
							<span><?php echo $list[0]['txt_contest_name']; ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-calendar"></i>
						<div>
							<strong>Date:</strong>
							<span><?php echo date_format($s_date,"F j, Y")." to ".date_format($c_date,"F j, Y");?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-money"></i>
						<div>
							<strong>Price:</strong>
							<span>$<?php echo $list[0]['txt_budget']; ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-tags"></i>
						<div>
							<strong>Skills:</strong>
							<span><?php echo $getskill[0]['skill_name']; ?></span>
						</div>
					</li>
				</ul>

			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>


<!-- Footer
================================================== -->
<div class="margin-top-50"></div>



<!-- Back To Top Button -->
<div id="backtotop" style="display: none;"><a href="#"></a></div>

</div>
<script type="text/javascript">
	function setparticipate(id,name){
	$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>/artist/updateparticipate",
			data: { 'id' : id  , 'artist_id' : name } ,
			cache: false,
			success: function(data) {
				window.location='<?php echo site_url(); ?>/content/listcontest/';
			}
	});
}
</script>