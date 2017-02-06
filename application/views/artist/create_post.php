           <!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                <li><a href="<?php echo site_url('user/user_profile');?>">profile</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> submit post
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <!-- profile top section -->
            <section class="topProfile topProfile-inner" style="background: url('images/profile-bg1.png') no-repeat;">
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
                                <img src="<?php echo base_url().$pro[0]['txt_profile_image']; ?>" alt="profile author img">
                            </div>
                            <div class="profile-subscribe">
                                <span><i class="fa fa-users"></i>6</span>
                                <button type="submit" name="subscribe">subscribe</button>
                            </div>
                            
                            <div class="clearfix">
                                <div class="profile-author-name float-left">
                                    <h4><?php echo $pro[0]['txt_fname'].''.$pro[0]['txt_fname']; ?></h4>
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
                    <!-- profile settings -->
                    <section class="submit-post">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <h4>Add new video Post</h4>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">

                                        <form data-abide novalidate action="<?php echo site_url();?>/artist/addpost" enctype="multipart/form-data" method="post">
                                            <div data-abide-error class="alert callout" style="display: none;">
                                                <p><i class="fa fa-exclamation-triangle"></i>
                                                    There are some errors in your form.</p>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label>Title
                                                        <input type="text" id="title" name="title" placeholder="enter you video title..." required>
                                                        <span class="form-error">
                                                            Yo, you had better fill this out, it's required.
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="large-12 columns">
                                                    <label>Description
                                                        <textarea id="description" name="description"></textarea>
                                                    </label>
                                                </div>
                                                <div class="large-12 columns">
                                                    <h6 class="borderBottom">Choose Video Method:</h6>
                                                    <p><strong>Note:</strong> Please choose one of the following ways to embed the video into your post, the video is determined in the order: Video Code > Video URL > Video File.</p>
                                                </div>
                                                <div class="large-12 columns">
                                                    <div class="radio">
													<div class="demo1">
                                                       <input type="radio" value="check1" name="videolink" id="videolink1" checked>
                                                       <label class="customLabel" for="videolink1">Video Link From Youtube/Vimeo etc..</label>
													   </div>
													   
													   <div class="demo2">
                                                       <input type="radio" value="check2" name="videolink" id="videolink2">
                                                       <label class="customLabel" for="videolink2">Custom Video Upload / Put custom Video URL </label>
													   </div>
                                                       <!--<input type="radio" value="check" name="videolink" id="videolink3">
                                                       <label class="customLabel" for="videolink3">Embed/Object Code</label>-->
                                                    </div>
                                                </div>
                                                <div class="large-12 columns">
												<div class="desc">
                                                    <label>Put here your video url with proper extension:
                                                        <input type="url" id="url_text" name="url_text"  placeholder="for example:http://yoursite.com/sample-video.mp4">
                                                    </label>
													</div>
                                                    <h6>OR</h6>
                                                    <div class="desc1">
                                                        <!--<label for="#" class="button">Upload File</label>-->
                                                        <input type="file" id="post_file" name="post_file">
                                                     
														
                                                    </div>
                                                    <p class="extraMargin">Paste your video file url to here. Supported Video Formats: mp4, m4v, webmv, webm, ogv and flv. About Cross-platform and Cross-browser Support. If you want your video works in all platforms and browsers(HTML5 and Flash), you should provide various video formats for same video, if the video files are ready, enter one url per line. For Example: http://yousite.com/sample-video.m4v http://yousite.com/sample-video.ogv Recommended Format Solution: webmv + m4v + ogv.</p>
                                                </div>
                                                <div class="large-12 columns">
                                                    <div class="post-meta">
                                                        <label>Meta Title:
                                                            <textarea id="metatitle" name="metatitle" placeholder="enter meta title"></textarea>
                                                        </label>
                                                        <p>IF you want to put your custom meta Title then put here otherwise your post title will be the default meta Title</p>
                                                    </div>
                                                  
                                                    <div class="post-category">
                                                        <label>Choose Video Category:
                                                            <select name="category" id="category">
                                                                <option value="one">one</option>
                                                                <option value="two">two</option>
                                                                <option value="three">three</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                            
                                                <div class="large-12 columns">
                                                    <button class="button expanded" type="submit" name="submit">publish now</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End profile settings -->
                </div><!-- end left side content area -->
            </div>
		

<script src="<?php echo base_url();?>assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("input[name='videolink']").click(function () {
            if ($("#videolink1").is(":checked")) {
                $(".desc").show();
            } else {
                $(".desc").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name='videolink']").click(function () {
            if ($("#videolink2").is(":checked")) {
                $(".desc1").show();
            } else {
                $(".desc1").hide();
            }
        });
    });
</script>