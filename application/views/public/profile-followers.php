<?php //print_r($follow);exit; ?>
<!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                                <li><a href="<?php echo base_url().$pro[0]['txt_profile_image']?>">profile</a></li>
                                <li>
                                    <span class="show-for-sr">Current:</span> followers
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
                                            <li class="clearfix"><a href="profile-video.html"><i class="fa fa-video-camera"></i>Videos <span class="float-right">36</span></a></li>
                                            <li class="clearfix"><a href="profile-favorite.html"><i class="fa fa-heart"></i>Favorite Videos<span class="float-right">50</span></a></li>
                                            <li class="clearfix"><a class="active" href="#"><i class="fa fa-users"></i>Followers<span class="float-right">6</span></a></li>
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
                    <!-- followers -->
                    <section class="content content-with-sidebar followers margin-bottom-10">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="row column head-text clearfix">
                                    <h4 class="pull-left"><i class="fa fa-users"></i>Followers</h4>
                                </div>
								<?php foreach($follow as $fol){ ?>
                                <div class="row collapse">
                                    <div class="large-2 small-6 medium-3 columns">
                                        <div class="follower">
                                            <div class="follower-img">
                                                <img src="<?php echo base_url().$fol['txt_profile_image']; ?>" alt="followers">
                                            </div>
                                            <span><?php echo $fol['txt_fname'].' '.$fol['txt_lname']; ?></span>
                                            <button type="submit" name="follow">Subscribe</button>
                                        </div>
                                    </div>
                                    
                                </div>
								<?php } ?>
                            </div>
                            <div class="show-more-inner text-center">
                                <a href="#" class="show-more-btn">show more</a>
                            </div>
                        </div>
                    </section>
                </div><!-- end left side content area -->
            </div>

            <!-- footer -->
           