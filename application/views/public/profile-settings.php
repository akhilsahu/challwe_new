<?php
$user=$result[0];
//$fetch_data=$get_data[0];
//print_r($get_data[0]);exit;
?>


            <!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                                <li><a href="profile-page-v2.html">profile</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> profile setting
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <!-- profile top section -->
            <section class="topProfile topProfile-inner" style="background: url('<?php echo base_url($user['txt_cover_image']);?>') no-repeat;">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="upload-bg">
                            <form method="post">
                                <label for="topfileupload" class="btn-upload"><i class="fa fa-camera"></i><span>update cover image</span></label>
                                <input type="file" id="topfileupload" class="show-for-sr">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="main-text">
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
                                <img src="<?php echo base_url($user['txt_profile_image']);?>" alt="profile author img">
                                <form method="post">
                                    <label for="imgfileupload" class="btn-upload"><i class="fa fa-camera"></i><span>update Avatar</span></label>
                                    <input type="file" id="imgfileupload" class="show-for-sr">
                                </form>
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
                                            <li class="clearfix"><a href="profile-video.html"><i class="fa fa-video-camera"></i>Videos <span class="float-right">36</span></a></li>
                                            <li class="clearfix"><a href="profile-favorite.html"><i class="fa fa-heart"></i>Favorite Videos<span class="float-right">50</span></a></li>
                                            <li class="clearfix"><a href="profile-followers.html"><i class="fa fa-users"></i>Followers<span class="float-right">6</span></a></li>
                                            <li class="clearfix"><a href="profile-comments.html"><i class="fa fa-comments-o"></i>comments<span class="float-right">26</span></a></li>
                                            <li class="clearfix"><a class="active" href="#"><i class="fa fa-gears"></i>Profile Settings</a></li>
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
                    <!-- profile settings -->
                    <section class="profile-settings">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <i class="fa fa-gears"></i>
                                    <h4>profile Settings</h4>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <div class="setting-form">
                                      <form method="post" enctype="multipart/form-data" action="<?php echo site_url()?>/user/profile_settings">
                                                <div class="setting-form-inner">
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <h6 class="borderBottom">Username Setting:</h6>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>First Name:
															<input type="hidden" id="id" name="id" value="<?php echo $user['int_artist_id'];?>">
                                                                <input type="text" id="fname" name="fname" value="<?php echo $user['txt_fname'];?>" >
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>Last Name:
                                                                <input type="text" id="lname" name="lname" value="<?php echo $user['txt_lname'];?>">
                                                            </label>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                                <div class="setting-form-inner">
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <h6 class="borderBottom">Update Password:</h6>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>New Password:
															
                                                                <input type="password" id="password" name="password" value="<?php echo $user['txt_password'];?>">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>Retype Password:
                                                                <input type="password" value="<?php echo $user['txt_password'];?>">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-form-inner">
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <h6 class="borderBottom">About Me:</h6>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>Email ID:
                                                                <input type="email" id="email" name="email"	value="<?php echo $user['txt_email'];?>" >
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>Website URL:
                                                                <input type="url" id="website_url" name="website_url" value="<?php echo $get_data[0]['txt_website_url'];?>">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns end">
                                                            <label>Phone No:
                                                                <input type="tel" id="phone_no" name="phone_no" value="<?php echo $user['txt_cell_no'];?>"	>
                                                            </label>
                                                        </div>
                                                        <div class="medium-12 columns">
                                                            <label>Bio Description:
                                                                <textarea  id="description" name="description"><?php echo $user['txt_description'];?></textarea>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-form-inner">
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <h6 class="borderBottom">Social Profile links:</h6>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>facebook:
                                                                <input type="url"  id="facebook" name="facebook" value="<?php echo $get_data[0]['txt_facebook'];?>">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>twitter:
                                                                <input type="url" value="<?php echo $get_data[0]['txt_twitter'];?>"id="twitter" name="twitter">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns end">
                                                            <label>Google Plus:
                                                                <input type="url" value="<?php echo $get_data[0]['txt_google_plus'];?>" id="google_plus" name="google_plus">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>Youtube:
                                                                <input type="url"value="<?php echo $get_data[0]['txt_youtube'];?>"  id="youtube" name="youtube">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>vimeo:
                                                                <input type="url" value="<?php echo $get_data[0]['txt_vimeo'];?>" id="vimeo" name="vimeo">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns end">
                                                            <label>Pinterest:
                                                                <input type="url"  value="<?php echo $get_data[0]['txt_pinterest'];?>" id="pinterest" name="pinterest">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>Instagram:
                                                                <input type="url" value="<?php echo $get_data[0]['txt_instagram'];?>" id="instagram" name="instagram">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns end">
                                                            <label>Linkedin:
                                                                <input type="url" value="<?php echo $get_data[0]['txt_linkedin'];?>" id="linkedin" name="linkedin">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-form-inner">
                                                    <button class="button expanded" type="submit" name="setting">update now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End profile settings -->
                </div><!-- end left side content area -->
            </div>

          