<?php


?>
 <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> Profile
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
                                <img src="<?php echo base_url().$pro['artist']['txt_profile_image'];?>" alt="">
                                
                            </div>
                            <form action="<?php echo site_url();?>/user/follow/<?php echo $this->uri->segment(3);?>">
                            <div class="profile-subscribe">
                                
                                <span  class="no_follower fa fa-users"  style="padding:13px 15px;"><?php echo count($pro['followers']['followers']);?></span>
                                <button type="button" id="btn_follow" class="btn btn-primary follow" name="subscribe" onclick="follow(<?php echo $this->uri->segment(3)?>);">Follow</button>
                                <button type="button" id="btn_unfollow" class="btn btn-primary follow" name="subscribe" onclick="unfollow(<?php echo $this->uri->segment(3)?>);">UnFollow</button>
                            </div></form>
                            <script type="text/javascript">
                              $(".follow").toggle(function() {
                                   if(<?php echo $pro['flag'] ?>==0)
                               {
                                   $("#btn_follow").show();
                                   $("#btn_unfollow").hide();
                               }
                               else
                               {
                                    $("#btn_follow").hide();
                                   $("#btn_unfollow").show();
                               }
                              });
                             
                               
                          /* $(".follow").toggle(function() {
                                     $("#btn_follow").hide();
                                   $("#btn_unfollow").show();
                              });*/
                               
                           </script>
                            <div class="clearfix">
                                <div class="profile-author-name float-left">
                                    <h4><?php echo $pro[0]['txt_fname'].' '.$pro[0]['txt_lname'];?></h4>
                                    <p>Join Date : <span><?php echo $pro['artist']['dt_added'];?></span></p>
                                </div>
                                <div class="profile-author-stats float-right">
                                    <ul class="menu">
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-video-camera"></i>
                                            </div>
                                            <div class="li-text float-left">
                                                <p class="number-text"><?php echo count($pro['video']); ?></p>
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
                                                <p class="number-text no_follower"><?php echo $pro['followers']['followers']?></p>
                                                <span>followers</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon float-left">
                                                <i class="fa fa-comments-o"></i>
                                            </div>
                                            <div class="li-text float-left">
                                                <p class="number-text"><?php echo count($pro['comment']); ?></p>
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
                <!-- left side content area -->
                <div class="large-8 columns">
                    <!-- single post description -->
                    <section class="singlePostDescription">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <i class="fa fa-user"></i>
                                   <h4><?php echo $pro['artist']['txt_fname']." ". $pro['artist']['txt_lname'];?></h4>
                                </div>
                                <div class="description">
                                    <p><?php echo $pro['artist']['txt_description']; ?></p>

                                    <div class="site profile-margin">
                                        <button><i class="fa fa-globe"></i>Site</button>
                                        <a href="#" class="inner-btn">www.betube.com</a>
                                    </div>
                                    <div class="email profile-margin">
                                        <button><i class="fa fa-envelope"></i>Email</button>
                                        <span class="inner-btn"><?php echo $pro['artist']['txt_email']; ?></span>
                                    </div>
                                    <div class="phone profile-margin">
                                        <button><i class="fa fa-phone"></i>Phone</button>
                                        <span class="inner-btn"><?php echo $pro['artist']['int_phone_no']; ?></span>
                                    </div>
                              <!--      <div class="socialLinks profile-margin">
                                        <button><i class="fa fa-share-alt"></i>get socialize</button>
                                        <a href="#" class="inner-btn"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="inner-btn"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="inner-btn"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" class="inner-btn"><i class="fa fa-flickr"></i></a>
                                    </div>-->


                                </div>
                            </div>
                        </div>
                    </section><!-- End single post description -->

                    <!-- author videos -->
                    <section class="content content-with-sidebar margin-bottom-10">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="row column head-text clearfix">
                                    <h4 class="pull-left"><i class="fa fa-video-camera"></i>Videos</h4>
                                    <div class="grid-system pull-right show-for-large">
                                        <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                                        <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                        <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                    </div>
                                </div>
                                <div class="tabs-content" data-tabs-content="newVideos">
                                    <div class="tabs-panel is-active" id="new-all">
                                        <div class="row list-group">
                                                <?php foreach($pro['video'] as $video) { ?>
                                            <div class="item large-4 medium-6 columns group-item-grid-default">
                                                <div class="post thumb-border">
                                                    <div class="post-thumb">
                                                        <video src="<?php echo base_url().$video['txt_filepath'];?>" alt="new video" controls></video>
                                                       <a href="#" class="hover-posts">
                                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                                        </a>
                                                        <div class="video-stats clearfix">
                                                            <div class="thumb-stats pull-left">
                                                                <h6>HD</h6>
                                                            </div>
                                                            <div class="thumb-stats pull-left">
                                                                <i class="fa fa-heart"></i>
                                                                <span>506</span>
                                                            </div>
                                                            <div class="thumb-stats pull-right">
                                                                <span>05:56</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-des">
                                                        <h6><a href="#"><?php echo $video['txt_title']; ?></a></h6>
                                                        <div class="post-stats clearfix">
                                                            <p class="pull-left">
                                                                <i class="fa fa-user"></i>
                                                                <span><a href="#"><?php echo $video['txt_fname']; ?></a></span>
                                                            </p>
                                                            <p class="pull-left">
                                                                <i class="fa fa-clock-o"></i>
                                                                <span><?php echo $video['dt_created_on']; ?></span>
                                                            </p>
                                                            <p class="pull-left">
                                                                <i class="fa fa-eye"></i>
                                                                <span>1,862K</span>
                                                            </p>
                                                        </div>
                                                        <div class="post-summary">
                                                            <p><?php echo $video['txt_description']; ?></p>
                                                        </div>
                                                        <div class="post-button">
                                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center row-btn">
                                    <a class="button radius" href="#">View All Video</a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!--author favorite videos-->
                    

                    <!-- followers -->
                    <section class="content content-with-sidebar followers margin-bottom-10">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="row column head-text clearfix">
                                    <h4 class="pull-left" ><i class="fa fa-users"></i>Followers<span class="no_follower">(<?php echo $pro['followers']['followers']?>)</span></h4>
                                </div>
                                <div class="row collapse">
                                    <?php foreach($pro['follower'] as $follower) { ?>
                                    <div class="large-2 small-6 medium-3 columns">
                                        <div class="follower">
                                            <div class="follower-img">
                                                <a href="<?php echo site_url();?>/user/view_profile/<?php echo $follower['int_artist_id'];?>">    <img src="<?php echo base_url().$follower['txt_profile_image']; ?>" alt="followers"></a>
                                            </div>
                                            <span><?php echo $follower['txt_fname']." ".$follower['txt_lname'];?></span>
                                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Comments -->
                    <section class="content comments">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="main-heading borderBottom">
                                    <div class="row padding-14">
                                        <div class="medium-12 small-12 columns">
                                            <div class="head-title">
                                                <i class="fa fa-comments"></i>
                                                <h4>Comments <span>(<?php echo count($pro['comment']); ?>)</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-box thumb-border">
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "<?php echo base_url().$pro['artist']['txt_profile_image']; ?>" alt="">
                                            </div>
                                            <h6><a href="#"><?php echo $pro['artist']['txt_fname']; ?></a></h6>
                                        </div>
                                        <div class="media-object-section comment-textarea">
                                            <form method="post" action="<?php echo site_url(); ?>/User/addcomment" >
                                                <textarea name="commentText" placeholder="Add a comment here.."></textarea>
												<input type='hidden' name='parent_id' value="0" id='parent_id' />
												
                                                <input type="submit" name="submit" value="send">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-sort text-right">
                                    <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                                </div>

                                <!-- main comment -->
                                <div class="main-comment showmore_one">
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "<?php echo base_url(); ?>assets/images/fav-guit.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#"></a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p><?php echo $comment[0]['txt_comments'] ?></p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>

                                            <!--sub comment-->
                                            <div class="media-object stack-for-small reply-comment">
                                                <div class="media-object-section comment-img text-center">
                                                    <div class="comment-box-img">
                                                        <img src= "images/blog-post-author-img.png" alt="comment">
                                                    </div>
                                                </div>
                                                <div class="media-object-section comment-desc">
                                                    <div class="comment-title">
                                                        <span class="name"><a href="#">Nancy John</a> Said:</span>
                                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                                    </div>
                                                    <div class="comment-btns">
                                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                        <span class='reply float-right hide-reply'></span>
                                                    </div>
                                                </div>
                                            </div><!-- end sub comment -->

                                            <!--sub comment-->
                                            <div class="media-object stack-for-small reply-comment">
                                                <div class="media-object-section comment-img text-center">
                                                    <div class="comment-box-img">
                                                        <img src= "images/follower4.png" alt="comment">
                                                    </div>
                                                </div>
                                                <div class="media-object-section comment-desc">
                                                    <div class="comment-title">
                                                        <span class="name"><a href="#">frank</a> Said:</span>
                                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                                    </div>
                                                    <div class="comment-btns">
                                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                        <span class='reply float-right hide-reply'></span>
                                                    </div>

                                                </div>
                                            </div><!-- end sub comment -->

                                        </div>
                                    </div>

                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "images/author1.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "images/follower5.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#">Nancy John</a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>
                                            <!--sub comment-->
                                            <div class="media-object stack-for-small reply-comment">
                                                <div class="media-object-section comment-img text-center">
                                                    <div class="comment-box-img">
                                                        <img src= "images/post-author-post.png" alt="comment">
                                                    </div>
                                                </div>
                                                <div class="media-object-section comment-desc">
                                                    <div class="comment-title">
                                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                                    </div>
                                                    <div class="comment-btns">
                                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                        <span class='reply float-right hide-reply'></span>
                                                    </div>
                                                    <!--sub comment-->
                                                    <div class="media-object stack-for-small reply-comment">
                                                        <div class="media-object-section comment-img text-center">
                                                            <div class="comment-box-img">
                                                                <img src= "images/post-author-post.png" alt="comment">
                                                            </div>
                                                        </div>
                                                        <div class="media-object-section comment-desc">
                                                            <div class="comment-title">
                                                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                            </div>
                                                            <div class="comment-text">
                                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                                            </div>
                                                            <div class="comment-btns">
                                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                                <span class='reply float-right hide-reply'></span>
                                                            </div>
                                                        </div>
                                                    </div><!-- end sub comment -->
                                                </div>
                                            </div><!-- end sub comment -->
                                        </div>
                                    </div>
                                </div><!-- End main comment -->

                            </div>
                        </div>
                    </section>
                </div><!-- end left side content area -->
                <!-- sidebar -->
                <div class="large-4 columns">
                    <aside class="secBg sidebar">
                        <div class="row">
                            <!-- profile overview -->
                            <div class="large-12 medium-7 medium-centered columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>Profile Overview</h5>
                                    </div>
                                    <div class="widgetContent">
                                        <ul class="profile-overview">
                                            <!--<li class="clearfix"><a href="profile-about-me.html"><i class="fa fa-user"></i>about me</a></li>-->
                                            <li class="clearfix"><a href="profile-video.html"><i class="fa fa-video-camera"></i>Videos <span class="float-right"><?php echo count($pro['video']); ?></span></a></li>
                                            <li class="clearfix"><a href="profile-favorite.html"><i class="fa fa-heart"></i>Favorite Videos<span class="float-right">50</span></a></li>
                                            <li class="clearfix"><a href="#"><i class="fa fa-users"></i>Followers<span class="float-right no_follower"><?php echo $pro['followers']['followers']?></span></a></li>
                                            <li class="clearfix"><a href="profile-comments.html"><i class="fa fa-comments-o"></i>comments<span class="float-right"><?php echo count($pro['comment']); ?></span></a></li>
                                            
                                            
                                        </ul>
                                       <!-- <a href="submit-post.html" class="button"><i class="fa fa-plus-circle"></i>Submit Video</a>-->
                                    </div>
                                </div>
                            </div><!-- End profile overview -->
                            <!-- search Widget -->
                            <div class="large-12 medium-7 medium-centered columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>Search Videos</h5>
                                    </div>
                                    <form id="searchform" method="get" role="search">
                                        <div class="input-group">
                                            <input class="input-group-field" type="text" placeholder="Enter your keyword">
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
                                        <h5>Most View Videos</h5>
                                    </div>
                                    <div class="widgetContent">
                                        <?php foreach($pro['most_view_video'] as $most_view) { ?>
                                        <div class="video-box thumb-border">
                                            <div class="video-img-thumb">
                                                <img src="<?php echo base_url().$most_view['txt_filepath'];?>" alt="most viewed videos">
                                                <a href="#" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                            </div>
                                            <div class="video-box-content">
                                                <h6><a href="#"><?php echo $most_view['txt_description']; ?> </a></h6>
                                                <p>
                                                    <span><i class="fa fa-user"></i><a href="#"><?php echo $most_view['txt_fname'];?></a></span>
                                                    <span><i class="fa fa-clock-o"></i><?php echo $most_view['dt_created_on'];?></span>
                                                    <span><i class="fa fa-eye"></i><?php echo $most_view['int_views']?></span>
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
                                    <div class="widgetContent">
                                        <ul>
                                            <?php foreach($pro['category'] as $category ) { ?>
                                            <li class="cat-item"><a href="#"><?php echo $category['txt_title'];?></a></li>
                                            <?php  } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- social Fans Widget -->
                     <!--       <div class="large-12 medium-7 medium-centered columns">
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
                            </div>--><!-- End social Fans Widget -->

                            <!-- ad banner widget -->
                            <!-- end ad banner widget -->

                            <!-- Recent post videos -->
                            <div class="large-12 medium-7 medium-centered columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>Recent post videos</h5>
                                    </div>
                                    <div class="widgetContent">
                                        <?php foreach($pro['rec_video'] as $recent) { ?>
                                        <div class="media-object stack-for-small">
                                            <div class="media-object-section">
                                                <div class="recent-img">
                                                    <video src= "<?php echo base_url().$recent['txt_filepath'];?>" alt="recent" autoplay></video>
                                                   <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-object-section">
                                                <div class="media-content">
                                                    <h6><a href="#"></a></h6>
                                                    <p><i class="fa fa-user"></i><span><?php echo $recent['txt_fname'];?></span><br/><i class="fa fa-clock-o"></i><span><?php echo $recent['dt_created_on'];?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div><!-- End Recent post videos -->

                            <!-- tags -->
                            <div class="large-12 medium-7 medium-centered columns">
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

            <script>
                
               function follow(id)
                {
                    $.ajax({
                     url: "<?php echo site_url().'/user/follow/'?>"+id,
                    // datatype:json,
                     success:function(response){
                        // alert(response);
                        var follow=response;
                       if(response.trim()=="success")
                       {
                        $("#btn_follow").hide();
                        $("#btn_unfollow").show();
                        $(".no_follower").html(parseInt($(".no_follower").html())+1);
                       // a= ($(".no_follower1").html()).trim();
                       // var b=a+1;
                       // alert(b);
                       }
                       else{
                           alert("followewrtewtre");
                       }
                            
                               // alert(follow.followers);
                     },
                             error:function(response){
                                 
                                 alert("bakwas");
                             }
              });
                }
                 
                 function unfollow(id)
                {
                    $.ajax({
                     url: "<?php echo site_url().'/user/unfollow/'?>"+id,
                     success:function(response){
                       if(response.trim()=="success")
                       {
                         
                         $("#btn_follow").show();
                         $("#btn_unfollow").hide();
                      $(".no_follower").html(parseInt($(".no_follower").html())-1);
                       }
                        
                     },
                             error:function(response){
                                 
                                 alert("bakwas");
                             }
              });
                }
             /* $("#btn_follower").toggle(function() {
                  $("#btn_follower").html('Unfollow');},
                  function() {
                       $("#btn_follower").html('follow')
                  }
              });*/
             /*  $("#btn_follower").click(function() {
                  $("#btn_follower").html('follow');
              });*/
              
          /*  $("#btn_follower").click(function() {
                  $("#btn_follower").val("unfollow");
              }, function() {
                  $("#btn_follower").val("follow");
              });*/
                
                
                
                
               /*  $.ajax({
                url: "test.html",
                context: document.body
              }).done(function() {
                $( this ).addClass( "done" );
              });
              $("#btn_follower").click(function() {
                  $("#btn_follower").html('Unfollow');
              });
              
             /* $("#btn_follower").toggle(function() {
                  $("#btn_follower").val("unfollow");
              }, function() {
                  $("#btn_follower").val("follow");
              });*/
            </script>
