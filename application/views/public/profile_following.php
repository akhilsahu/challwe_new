<?php //print_r($following);  ?>
<!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                                <li><a href="profile-page-v2.html">profile</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> followers
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->
			
			
			 <!-- profile top section -->
            <section class="topProfile">
                <div class="main-text text-center">
                    <div class="row">
                        <div class="large-12 columns">
                            <h3>World’s Biggest</h3>
                            <h1>Powerfull Video Theme</h1>
                        </div>
                    </div>
                </div>
                <div class="profile-stats">
                    <div class="row secBg">
                        <div class="large-12 columns">
                            <div class="profile-author-img">
                                <img src="<?php echo base_url().$pro[0]['txt_profile_image'];?>" alt="profile author img">
                            </div>
                            <div class="profile-subscribe">
                                <span><i class="fa fa-users"></i><?php echo $follow['pqr'];?></span>
                                <button type="submit" name="subscribe">Followers</button>
                            </div>
                            
                            <div class="clearfix">
                                <div class="profile-author-name float-left">
                                    <h4><?php echo $pro[0]['txt_fname'].' '.$pro[0]['txt_lname'];?></h4>
                                    <p>Join Date : <span>5 January 16</span></p>
                                </div>
                                <div class="profile-author-stats float-right">
                                    <ul class="menu">
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-video-camera"></i>
                                            </div>
                                            <div class="li-text float-left">
                                                <p class="number-text">36</p>
                                                <span>Videos</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="li-text float-left">
                                                <p class="number-text">50</p>
                                                <span>favorites</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <div class="li-text float-left"><a href="<?php echo site_url();?>/user/get_followers">
                                                <p class="number-text"><?php echo $follow['pqr'];?></p>
                                                <span>followers</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-comments-o"></i>
                                            </div>
                                            <div class="li-text float-left">
											<a href="<?php echo site_url();?>/user/userComments">
                                                <p class="number-text"><?php echo $com['abc']; ?></p>
                                                <span>comments</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End profile top section -->


           
            <div class="row">
			
			
                <!-- left sidebar -->
                <div class="large-4 columns">
                    <aside class="secBg sidebar">
                        <div class="row">
                            <!-- profile overview -->
                            <div class="large-12 columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>Profile Overview</h5>
                                    </div>
                                    <div class="widgetContent">
                                        <ul class="profile-overview">
                                            <li class="clearfix"><a href="<?php echo site_url();?>/user/user_profile">
											<i class="fa fa-user"></i>About me</a></li>
                                            <li class="clearfix"><a href="#"><i class="fa fa-video-camera"></i>Videos <span class="float-right">36</span></a></li>
                                            <li class="clearfix"><a href="#"><i class="fa fa-heart"></i>Favorite Videos<span class="float-right">50</span></a></li>
                                            <li class="clearfix"><a class="" href="<?php echo site_url();?>/user/get_followers"><i class="fa fa-users"></i>Followers<span class="float-right"><?php echo $follow['pqr'];?></span></a></li>
											<li class="clearfix"><a class="" href="<?php echo site_url();?>/user/profile_following"><i class="fa fa-users"></i>Following<span class="float-right"><?php echo $following['pqr'];?></span></a></li>
                                            <li class="clearfix"><a href="<?php echo site_url();?>/user/userComments"><i class="fa fa-comments-o"></i>comments<span class="float-right"><?php echo $com['abc']; ?></span></a></li>
                                            <li class="clearfix"><a href="#"><i class="fa fa-gears"></i>Profile Settings</a></li>
                                            <li class="clearfix"><a href="<?php echo site_url();?>/user/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                                        </ul>
                                        <a href="submit-post.html" class="button"><i class="fa fa-plus-circle"></i>Submit Video</a>
                                    </div>
                                </div>
                            </div><!-- End profile overview -->
                        </div>
                    </aside>
                </div><!-- end sidebar -->
			 
                <!-- right side content area -->
                <div class="large-8 columns profile-inner">
                    <!-- followers -->
                    <section class="content content-with-sidebar followers margin-bottom-10">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="row column head-text clearfix">
                                    <h4 class="pull-left"><i class="fa fa-users"></i>Following</h4>
                                </div>
								
                                <div class="row collapse">
								<?php foreach($following['abc'] as $fol){?>
      <div class="large-2 small-6 medium-3 columns" id="deldiv<?php echo $fol['int_artist_id']; ?>">
                                        <div class="follower">
                                            <div class="follower-img" >
                                                <img src="<?php echo base_url().$fol['txt_profile_image']; ?>" alt="followers">
                                            </div>
                                            <span>
											<?php echo $fol['txt_fname'].' '.$fol['txt_lname']; ?>
											</span>
											
											<button onclick="delete_following(<?php echo $fol['int_artist_id'] ?>);" name="unfollow">Unfollow
											</button>
											
                                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
								
                            </div>
                            <div class="show-more-inner text-center">
                                <a href="#" class="show-more-btn">show more</a>
                            </div>
                        </div>
                    </section>
                </div><!-- end left side content area -->
            </div>
			

<script type="text/javascript">

function delete_following(id)
    {   
	//alert(id);
	var r = confirm("Are you sure you want to Unfollow!");
	
	if (r == true) 
	{

		$.ajax({
			url:"<?php echo site_url().'/user/delete_following/';?>"+id,
			
            success:function(data)
            {        
//alert(data);			
				if(data.trim()=='success')
				{
					$('#deldiv'+id).remove();
				}
				else
				{
					alert('Not Able to Unfollow');
				}
           
            }
			});
        }
	}
</script> 
           