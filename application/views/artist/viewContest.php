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
			<h2><?php echo $list[0]['txt_contest_name']; ?></h2>
		</div>

		<div class="six columns">
			<?php if($list[0]['int_status'] != 1){ ?>
				<a href="#" class="button white"><?php echo "Decide Winner"; ?></a>
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
	<br>

	<div class="col-sm-14 col-md-14 col-lg-14">

                    <div class="title-box">

                      <form method="POST" action="<?php echo site_url()?>/artist/updateArtistdetails" enctype="multipart/form-data" >  
                      <input type="hidden" id="hid_int_artist_id" name="hid_int_artist_id" value="<?php echo $user_details['int_artist_id']; ?>" />

                        <div id="tabs">

                          <ul>

                            <li><a href="#tabs-1">Paritcipated</a></li>

                            <li><a href="#tabs-2">Request</a></li>

                            <li><a href="#tabs-3">Submissions</a></li>

                          </ul>

                          <div id="tabs-1">
                          	
							<div class="jFiler-items jFiler-row">
							<ul class="jFiler-items-list jFiler-items-grid">			
							<?php 
								foreach($participated as $val){
									$profile_pic='';
									if($val['txt_profile_image']) $profile_pic=base_url().$val['txt_profile_image'];
									else $profile_pic=base_url()."uploads/no-image.png";
									?>
									<li class="jFiler-item" data-jfiler-index="1" style="">                        
										<div class="jFiler-item-container">                            
											<div class="jFiler-item-inner">                                
												<div class="jFiler-item-thumb">                                    
													<div class="jFiler-item-status"></div>                                    
													<div class="jFiler-item-info">                                        
														<span class="jFiler-item-title"><b title=""><?php echo $val['txt_fname']." ".$val['txt_lname'];?></b></span>
													</div>                                    
													<div class="jFiler-item-thumb-image">
														<a href="#">
															<img src="<?php echo $profile_pic;?>" draggable="false">                                
														</a>
													</div>	
												</div>                                                       
											</div>                        
										</div>                    
									</li>
								<?php
							}?>                                  

							</ul>
							</div>	
	                          
                         	
							
                       
                        	</div>

                          <div id="tabs-2">
	                          	<table class="manage-table resumes responsive-table">
									
									<?php 

									foreach($requests as $val){
										if($val['int_status'] != 1 ){ ?>
									<h6 style='border-bottom: 1px solid #e0e0e0;'>
										<tr><td>
										<?php echo $val['txt_fname']." ".$val['txt_lname']; ?>
										</td><td>
											<a onclick="javascript:
											if(confirm('Are you sure? You want to Accept the request?')){
												setparticipate('<?php echo $val["int_contest_id"]?>','<?php echo $val['int_artist_id'] ?>');
											}"><i class="fa fa-eye-slash"></i>Accept</a>
												&nbsp;&nbsp;&nbsp;&nbsp;
											<a onclick="javascript:
											if(confirm('Are you sure? You want to Reject the request?')){
												setparticipaterj('<?php echo $val["int_contest_id"]?>','<?php echo $val['int_artist_id'] ?>');
											}"><i class="fa fa-eye-slash"></i>Reject</a>
										</td>		
										</h6>
									<?php }
								}?>                                  

	                                  
	                            </table>
                          </div>

                          <div id="tabs-3">

                          	  <table class="manage-table resumes responsive-table">
								<tr>
									<th><i class="fa fa-file-text"></i> Name</th>
									<th><i class="fa fa-calendar"></i> Submission Date Date</th>
									<th><i class="fa fa-calendar"></i> Description</th>
									<th><i class="fa fa-tags"></i> Attachments</th>
									<th></th>
								</tr>                               

                                  
                            </table>

                          </div>

                        </div>

                      </form>  



                    </div>

                </div>
                <br>
	<h2 style="    border-bottom: 1px solid #e0e0e0;">Attachments</h2>
	<br>
	<div class="col-sm-9 col-md-9 col-lg-9">                  
			<div class="jFiler-items jFiler-row">
				<ul class="jFiler-items-list jFiler-items-grid">
					<?php 
					$i=1;
					$media_details=json_decode($list[0]['txt_attachements']);
					foreach($media_details as $val){
						$ext=explode(".",$val);
						$url='';
						if($ext[count($ext)-1]=='pdf') $url=base_url()."uploads/pdf_icon.jpg";
						else if($ext[count($ext)-1]=='xls') $url=base_url()."uploads/excell_icon.jpg";
						else if($ext[count($ext)-1]=='docx' || $ext[0]=='doc') $url=base_url()."uploads/word_icon.jpg";
						else $url=base_url().$val;
						?>
					<li class="jFiler-item" data-jfiler-index="1" style="">                        
						<div class="jFiler-item-container">                            
							<div class="jFiler-item-inner">                                
								<div class="jFiler-item-thumb">                                    
									<div class="jFiler-item-status"></div>                                    
									<div class="jFiler-item-info">                                        
									<!-- <span class="jFiler-item-title"><b title="city_1 (1).jpg">city_1 (1).jpg</b></span>                                                                         -->
									</div>                                    
									<div class="jFiler-item-thumb-image">
										<a href="<?php echo site_url()."/content/contest_download/".$list[0]['int_contest_id']."/".$i++;?>">
											<img src="<?php echo $url;?>" draggable="false">                                
										</a>
									</div>	
								</div>                                                       
							</div>                        
						</div>                    
					</li>
					<?php } ?>
				</ul>
				</div>
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
				url: "<?php echo site_url(); ?>/artist/updateparticipateac",
				data: { 'id' : id  , 'artist_id' : name } ,
				cache: false,
				success: function(data) {
					  location.reload();
				}
		});
	}
	function setparticipaterj(id,name){
		$.ajax({
				type: "POST",
				url: "<?php echo site_url(); ?>/artist/updateparticipaterj",
				data: { 'id' : id  , 'artist_id' : name } ,
				cache: false,
				success: function(data) {
					  location.reload();
				}
		});
	}
</script>

<style>

.sidebar .widget, .widget {

    margin-bottom: 35px;

}

#sidebar h3 {

    padding-top: 7px;

}

.sidebar-nav li {

    padding: 10px;

    background-color: #fafafa;

    width: 100%;

    margin-bottom: 5px;

    color: #000;

}

ul, li, ol {

    line-height: 24px;

    margin: 0;

}

#search-form form, ul.post-meta, .sidebar ul, ul.tabs, .testimonials ul, ul.why, .panel-heading h3, .features .panel-heading h4, #options ul, .gallery ul {

    margin: 0;

}

.widget ul {

    list-style: none;

    padding: 0;

}

ul, li, ol {

    line-height: 24px;

    margin: 0;

}

.sidebar-nav li a {

    color: #000;

    width: 100%;

}

nav li.active, .sidebar-nav li:hover, .btn.btn-shopping-cart .fa {

    background-color: #59ab02;

}

.sidebar-nav li.active {

    padding: 10px;

    width: 100%;

    margin-bottom: 5px;

    color: #ffffff !important;

}

h2.title {

    font-size: 26px;

    line-height: 40px;

    margin: 20px 0;

    color: #fff;

}

.margin-bottom60 {

    margin-bottom: 60px;

}

.margin-top60 {

    margin-top: 60px;

}

@media (min-width: 768px)

.container {

    width: 750px;

}

.pricing_plan h3, .pricing_plan.special h3, .sidebar-nav li.active, .sidebar-nav li:hover, .btn.btn-shopping-cart .fa {

    background-color: #59ab02;

}



.sidebar-nav li.active {

    padding: 10px;

    width: 100%;

    margin-bottom: 5px;

    color: #ffffff !important;

}

.pattern-overlay {

    background-color: rgba(89, 171, 2, 0.75);

}



.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {

    border: 1px solid rgba(89, 171, 2, 0.75);;

    background: rgba(89, 171, 2, 0.75);

    color: #ffffff;

}

.form-group{

      margin-top: 10px;

}



</style>
<script type="text/javascript">
	 $(document).ready(function(){
	 	$( "#tabs" ).tabs();
	 });

</script>
<link href="<?php echo base_url();?>plugins/jQuery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />

<link href="<?php echo base_url();?>plugins/jQuery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url();?>plugins/jQuery.filer/js/jquery.filer.min.js?v=1.0.5"></script>

<script type="text/javascript" src="<?php echo base_url();?>plugins/jQuery.filer/js/custom.js?v=1.0.5"></script>

