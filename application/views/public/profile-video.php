            <!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                                <li><a href="profile-page-v2.html">profile</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> my videos
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
                                <img src="images/profile-auth-img.png" alt="profile author img">
                            </div>
                            <div class="profile-subscribe">
                                <span><i class="fa fa-users"></i>6</span>
                                <button type="submit" name="subscribe">subscribe</button>
                            </div>
                            <div class="profile-share">
                                <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com">
                                    <!-- Facebook -->
                                    <button data-easyshare-button="facebook">
                                        <span class="fa fa-facebook"></span>
                                        <span>Share</span>
                                    </button>
                                    <span data-easyshare-button-count="facebook">0</span>

                                    <!-- Twitter -->
                                    <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                        <span class="fa fa-twitter"></span>
                                        <span>Tweet</span>
                                    </button>
                                    <span data-easyshare-button-count="twitter">0</span>

                                    <!-- Google+ -->
                                    <button data-easyshare-button="google">
                                        <span class="fa fa-google-plus"></span>
                                        <span>+1</span>
                                    </button>
                                    <span data-easyshare-button-count="google">0</span>

                                    <div data-easyshare-loader>Loading...</div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="profile-author-name float-left">
                                    <h4>Joseph John</h4>
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
                                            <div class="li-text float-left">
                                                <p class="number-text">6</p>
                                                <span>followers</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-comments-o"></i>
                                            </div>
                                            <div class="li-text float-left">
                                                <p class="number-text">26</p>
                                                <span>comments</span>
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
                                            <li class="clearfix"><a href="profile-about-me.html"><i class="fa fa-user"></i>about me</a></li>
                                            <li class="clearfix"><a class="active" href="#"><i class="fa fa-video-camera"></i>Videos <span class="float-right">36</span></a></li>
                                            <li class="clearfix"><a href="profile-favorite.html"><i class="fa fa-heart"></i>Favorite Videos<span class="float-right">50</span></a></li>
                                            <li class="clearfix"><a href="profile-followers.html"><i class="fa fa-users"></i>Followers<span class="float-right">6</span></a></li>
                                            <li class="clearfix"><a href="profile-comments.html"><i class="fa fa-comments-o"></i>comments<span class="float-right">26</span></a></li>
                                            <li class="clearfix"><a href="profile-settings.html"><i class="fa fa-gears"></i>Profile Settings</a></li>
                                            <li class="clearfix"><a href="home-v1.html"><i class="fa fa-sign-out"></i>Logout</a></li>
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
                    <!-- single post description -->
					
                    <section class="profile-videos">
					
                        <div class="row secBg">
                            <div class="large-12 columns">
							
                                <div class="heading">
                                    <i class="fa fa-video-camera"></i>
                                    <h4>My Videos</h4>
                                </div>
								<?php foreach($vedio as $player){ ?>
                                <div class="profile-video" >
								
                                    <div class="media-object stack-for-small" id="del_div<?php echo $player['int_post_id'] ?>">
                                        <div class="media-object-section media-img-content">
                                            <div class="video-img">											
											
											<video controls="controls">
											  <source src="<?php echo base_url().$player['txt_filepath']; ?>" type="video/mp4">
											</video>
											
                                            </div>
                                        </div>
                                        <div class="media-object-section media-video-content">
                                            <div class="video-content">
                                                <h5><a href="#"><?php echo $player['txt_title'] ; ?></a></h5>
                                                <p><?php echo $player['txt_description'] ; ?></p>
                                            </div>
                                            <div class="video-detail clearfix">
                                                <div class="video-stats">
                                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                                    <span><i class="fa fa-clock-o"></i><?php echo $player['dt_created_on']?></span>
                                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                                </div>
                                                <div class="video-btns">
                                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                                    <a class="video-btn" onclick="vedio_delete(<?php echo $player['int_post_id'] ?>);"  id="blog_vedio_del" name="blog_vedio_del"><i class="fa fa-trash"></i>delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php } ?>
                      
                                </div>
                                <div class="show-more-inner text-center">
                                    <a href="#" class="show-more-btn">show more</a>
                                </div>
                            </div>
                        </div>
                    </section><!-- End single post description -->
                </div><!-- end left side content area -->
            </div>
					
<script type="text/javascript">
function vedio_delete(id)
{
	//alert("hi");
	 //console.log(id);
	jQuery.ajax({
		type:'POST',
		url:"<?php echo site_url().'/post/vedio_del/'?>"+id,
		success:function(data)
		{
			if(data.trim()=='success')
			{
				console.log("#del_div_"+id);
					jQuery("#del_div"+id).remove();
			}
			else
			{
				alert("data");
			}
		},
		error:function(data)
		{
			alert("failure");
		}
		
	});
}
</script>