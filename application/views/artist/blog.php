
<section id="breadcrumb" class="breadMargin">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> Blog
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <section class="category-content">
                <div class="row">
                    <!-- left side content area -->
                    <div class="large-8 columns">
					<?php foreach($blogs as $blog){?>
                        <div class="blog-post">
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="blog-post-heading">
                                        <h3><a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $blog['int_blog_id']?>"><?php echo $blog['txt_title']; ?></a></h3>
                                        <p>
                                            <span><i class="fa fa-user"></i><a href="<?php echo site_url()?>/user/view_profile/<?php echo $blog['int_artist_id']?>"><?php echo $blog['txt_fname'].' '.$blog['txt_lname']; ?></a></span>
                                            <span><i class="fa fa-clock-o"></i><?php echo $blog['dt_created_on']; ?></span>
                                            <span><i class="fa fa-eye"></i><?php echo $blog['int_views']; ?></span>
                                            <span><i class="fa fa-commenting"></i><?php echo $blog['t_comments']; ?></span>
                                        </p>
                                    </div>
                                    <div class="blog-post-content">
									<?php //$arr=explode(".",$blog['txt_media_url']);
											      if($blog['int_media_type']=='2'){
													  ?>
                                        <div class="blog-post-img">
                                            <video width="320" height="240" controls>
													<source src="<?php echo base_url().$blog['txt_media_url']; ?>" type="video/mp4">
												</video>
												  </div><?php } else{ ?>
												  <div class="blog-post-img">
                                            <img src="<?php echo base_url().$blog['txt_media_url'];?>" alt="blog image">
												  </div>
												  <?php } ?>
										<?php $abc=explode(' ',$blog['txt_description']); ?>
                                        <p><?php for($i=0;$i<90;$i++){echo $abc[$i].' ';} ?></p>
                                        <a class="blog-post-btn" href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $blog['int_blog_id']; ?>">read me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }$blog=' ';?>
                    
                        <!-- ad Section -->
                        <!--  <div class="googleAdv">
                            <a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
                        </div><!-- End ad Section -->
                    </div><!-- end left side content area -->
                    <!-- sidebar -->
            <div class="large-4 columns">
                        <aside class="secBg sidebar">
                            <div class="row">
                                <!-- search Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Search Videos</h5>
                                        </div>
                                        <form id="searchform" action="<?php echo site_url('Blog/search_blog');?>" method="post" role="search">
                                            <div class="input-group">
                                                <input class="input-group-field" type="text" name="search" placeholder="Enter your keyword">
                                                <div class="input-group-button">
                                                    <input type="submit" class="button" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- End search Widget -->

                                <!-- most view Widget -->
                                 <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Most Viewed Videos</h5>
                                        </div>
                                        <div class="widgetContent">
										<?php foreach($most_viewed as $view){?>
                                            <div class="video-box thumb-border">
											<?php //$arr=explode(".",$view['txt_media_url']);
											      if($view['int_media_type']=='2'){
													  ?>
											
												<div class="video-img-thumb">
												<video width="100%" height="100%" controls>
													<source src="<?php echo base_url().$view['txt_media_url']; ?>" type="video/mp4">
												</video>
                                                   <!-- <img src= alt="most viewed videos">-->
                                                    <a href="<?php echo base_url().$view['txt_media_url']; ?>" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div>
											<?php } 	
                                                else
												{?><div class="video-img-thumb">
                                                    <img src="<?php echo base_url().$view['txt_media_url']?>" alt="most viewed videos">
                                                    <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div><?php } ?>
                                                <div class="video-box-content">
                                                    <h6><a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $view['int_blog_id'];?>"><?php echo $view['txt_title']?> </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="<?php echo site_url()?>/user/view_profile/<?php echo $view['int_artist_id']?>"><?php echo $view['txt_fname'].' '.$view['txt_lname'] ?></a></span>
                                                        <span><i class="fa fa-clock-o"></i><?php echo $view['dt_created_on'] ?></span>
                                                        <span><i class="fa fa-eye"></i><?php echo $view['int_views'] ?></span>
                                                    </p>
                                                </div>
                                            </div>
										<?php } ?>
                                        </div>
                                    </div>
                                </div><!-- end most view Widget -->


                                <!-- categories -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox clearfix">
                                        <div class="widgetTitle">
                                            <h5>Categories</h5>
                                        </div>
                                        <div class="widgetContent clearfix">
                                            <ul>
                                                <?php foreach($get_all_categories as $get_all){?>
                                                <li class="cat-item"><!--<a href="#">--><?php echo $get_all['txt_title']?><!--&nbsp;(3)</a>--></li><?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- social Fans Widget -->
                                 <!--<div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>social fans</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <div class="social-links">
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                    <span>698K</span>
                                                    <span>fans</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-twitter"></i>
                                                    <span>598</span>
                                                    <span>followers</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                    <span>98k</span>
                                                    <span>followers</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-youtube"></i>
                                                    <span>168k</span>
                                                    <span>followers</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-vimeo"></i>
                                                    <span>498</span>
                                                    <span>followers</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End social Fans Widget -->

                                <!-- ad banner widget -->
                                <!-- <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Recent post videos</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <div class="advBanner text-center">
                                                <a href="#"><img src="images/sideradv.png" alt="sidebar adv"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end ad banner widget -->

                                <!-- Recent post videos -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Recent posts</h5>
                                        </div>
                                        <div class="widgetContent">
										<?php foreach($recent_viewed as $recent){?>
                                            <div class="media-object stack-for-small">
                                                <div class="media-object-section">
												<?php if($recent['int_media_type']==1) {?>
                                                    <div class="recent-img">
                                                        <img src= "<?php echo base_url().$recent['txt_media_url']; ?>" alt="recent">
                                                    </div>
													<?php } else {  ?>
													<div class="recent-img">
															<a href="#" class="hover-posts"><span><i class="fa fa-play"></i></span></a>
													<video width="100%" height="100%" controls>
														<source src="<?php echo base_url().$recent['txt_media_url']; ?>" type="video/mp4">
													</video>
                                                    </div><?php }  ?>
                                                </div>
                                                <div class="media-object-section">
                                                    <div class="media-content">
                                                        <h6><a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $recent['int_blog_id'];?>"><?php echo $recent['txt_title'] ?></a></h6>
                                                        <p><i class="fa fa-user"></i><a href="<?php echo site_url()?>/user/view_profile/<?php echo $recent['int_artist_id']?>"><span><?php echo $recent['txt_fname'].' '.$recent['txt_lname'] ?></span></a><?php ?><i class="fa fa-clock-o"></i><span><?php echo $recent['dt_created_on']; ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div><!-- End Recent post videos -->

                                <!-- tags -->
                               <!-- <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Tags</h5>
                                        </div>
                                        <div class="tagcloud">
                                            <a href="#">3D Videos</a>
                                            <a href="#">Videos</a>
                                            <a href="#">HD</a>
                                            <a href="#">Movies</a>
                                            <a href="#">Sports</a>
                                            <a href="#">3D</a>
                                            <a href="#">Movies</a>
                                            <a href="#">Animation</a>
                                            <a href="#">HD</a>
                                            <a href="#">Music</a>
                                            <a href="#">Recreation</a>
                                        </div>
                                    </div>
                                </div><!-- End tags -->
                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>
            </section><!-- End Category Content-->