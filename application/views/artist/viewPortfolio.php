<style>
.cl-cover-img{
	background: url(<?php echo base_url().$user_details['txt_cover_image'];?>);
	background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
.cl-a-6 {
    border-right: 1px solid #e9eaed;
    float: left;
    font-size: 14px;
    font-weight: bold;
    height: 43px;
    line-height: 3.05;
    padding: 0 17px;
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
}
.cl-a-7 {
    border-width: 0 1px;
    color: #4b4f56;
}

.cl-span-6 {
    //background-image: url();
    //background-repeat: no-repeat;
    //background-size: auto;
    //background-position: -138px -254px;
    bottom: -1px;
    display: none;
    height: 9px;
    left: 50%;
    margin-left: -8px;
    position: absolute;
    width: 17px;
}
</style>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume <?php if($user_details['txt_cover_image']){ echo 'cl-cover-img'; }?>">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
				<img src="<?php echo ($user_details['txt_profile_image'])?base_url().$user_details['txt_profile_image']:base_url()."uploads/no-image.png";?>" alt="">
				<div class="resumes-list-content">
					<h4><?php echo $user_details['txt_fname']." ".$user_details['txt_lname'];?> </h4>
					<?php if($user_details['txt_tagline']){?><h6><span><?php echo $user_details['txt_tagline'];?></span></h6><?php }?>
					<span class="icons"><i class="fa fa-map-marker"></i><?php echo $user_details['country_name'];?></span>
					<?php if($user_details['txt_hourly_charge']){?><span class="icons"><i class="fa fa-money"></i> <?php echo $user_details['txt_hourly_charge'];?> / hour</span><?php }?>
					<br><span class="icons"><a href="mailto:<?php echo $user_details['txt_email'];?>"><i class="fa fa-envelope"></i> <?php echo $user_details['txt_email'];?></a></span>
					<div class="skills">
						<?php echo $getskill;?>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="two-buttons">
				<?php 
				if($user_details['int_artist_id']==$user['int_artist_id']){?>
					<a href="<?php echo site_url().'/artist/accountDetails'?>" class="button dark"><i class="fa fa-edit"></i> Edit Profile</a>
				<?php }else if($user['int_artist_id'] && count($is_follower)==0){?>
					<a href="<?php echo site_url().'/artist/follow/'.$user_details['int_artist_id'];?>" class="button dark"><i class="fa fa-star"></i> Follow</a>
				<?php }else if($user['int_artist_id'] && count($is_follower)>0){?>
					<a href="<?php echo site_url().'/artist/unfollow/'.$user_details['int_artist_id'];?>" class="button dark"><i class="fa fa-star"></i> UnFollow</a>
				<?php }?>
			</div>
		</div>

	</div>
</div>

<div class="clearfix" id="menu-outer-container">
	<div class="menu-inner-container clearfix">
		<a class="cl-a-6 " href="<?php echo site_url()."/content/viewProfile/".$user_details['int_artist_id'];?>">Basic Details<span class="cl-span-6"></span></a>
		<a class="cl-a-6 cl-a-7" href="#">Portfolio<span class="cl-span-6"></span></a>
		<a class="cl-a-6 " href="<?php echo site_url()."/content/viewFollowers/".$user_details['int_artist_id'];?>">Followers<span class="cl-follower-count"></span><span class="cl-span-6"></span></a>
		<a class="cl-a-6" href="#">Post<span class="cl-span-6"></span></a>
		<a class="cl-a-6" href="#">Challenge Participation History<span class="cl-span-6"></span></a>
	</div>
</div>


<div class="container">

            <div clasjFiler-items jFiler-rows="row">

                <!-- Left Section -->

                <div class="col-sm-9 col-md-9 col-lg-9">				
					
					<div class="jFiler-items jFiler-row">
						<h3>Albums</h3>
                        <ul class="jFiler-items-list jFiler-items-grid">
                            <?php foreach($album_details as $val){
								//if($val['txt_path']=='' && $val['no_of_photos']==1){
								//	$no_of_photos=$val['no_of_photos']-1;
								//}else{
									$no_of_photos=$val['no_of_photos'];
								//}
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
                                    <a href="<?php echo site_url()."/content/showAlbum/".$user_details['int_artist_id']."/".$val['slug'];?>">
										<img src="<?php echo ($val['txt_path'])?base_url().$val['txt_path']:base_url()."uploads/folder.jpg";?>" draggable="false"></div>                                
									</a>
								</div>                                
                                <div class="jFiler-item-assets jFiler-row">                                    
                                <ul class="list-inline pull-left">                                        
                                    <li>
										<div class="">
											<div class="bar" style="width: 100%;"><?php echo $val['txt_name'];?><br> <?php echo $no_of_photos." photos"?></div>
										</div>
                                        <div class="jFiler-item-others"></div>
                                    </li>                                    
                                </ul>                                    
                                <ul class="list-inline pull-right">                                        
                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>                                    
                                </ul>                                
								</div>                            
                                </div>                        
                                </div>                    
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
					
					<hr>
					
                    <div class="jFiler-items jFiler-row">
                        <ul class="jFiler-items-list jFiler-items-grid">
                            <?php foreach($media_details as $val){?>
                            <li class="jFiler-item" data-jfiler-index="1" style="">                        
                                <div class="jFiler-item-container">                            
                                <div class="jFiler-item-inner">                                
                                <div class="jFiler-item-thumb">                                    
                                <div class="jFiler-item-status"></div>                                    
                                <div class="jFiler-item-info">                                        
                                <!-- <span class="jFiler-item-title"><b title="city_1 (1).jpg">city_1 (1).jpg</b></span>                                                                         -->
                                </div>                                    
                                <div class="jFiler-item-thumb-image">
                                    <img src="<?php echo base_url().$val['txt_path']?>" draggable="false"></div>                                
                                </div>                                
                                <div class="jFiler-item-assets jFiler-row">                                    
                                <ul class="list-inline pull-left">                                        
                                    <li><div class="jFiler-jProgressBar" style="display: none;">
                                        <div class="bar" style="width: 100%;"></div></div>
                                        <div class="jFiler-item-others"></div>
                                    </li>                                    
                                </ul>                                    
                                <ul class="list-inline pull-right">                                        
                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>                                    
                                </ul>                                </div>                            
                                </div>                        
                                </div>                    
                            </li>
                            <?php } ?>
                        </ul>
                        </div>





                </div>

            </div>

        </div>


<!-- Footer
================================================== -->
<div class="margin-top-50"></div>



<!-- Back To Top Button -->
<div id="backtotop" style="display: none;"><a href="#"></a></div>

</div>

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
<link href="<?php echo base_url();?>plugins/jQuery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />

<link href="<?php echo base_url();?>plugins/jQuery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

