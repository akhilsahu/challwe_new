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
                        <div class="blog-post">
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="blog-post-heading">
                                        <h3><a href="#"><?php echo $blog_single[0]['txt_title']; ?></a></h3>
                                        <p>
                                            <span><i class="fa fa-user"></i><a href="#"><?php echo $blog_single[0]['txt_fname'].' '.$blog_single[0]['txt_lname'] ; ?></a></span>
                                            <span><i class="fa fa-clock-o"></i><?php echo $blog_single[0]['dt_created_on']; ?></span>
                                            <span><i class="fa fa-eye"></i><?php echo $blog_single[0]['int_views']; ?></span>
                                            <span><i class="fa fa-commenting"></i><?php echo $blog_single[0]['t_comments']; ?></span>
                                        </p>
                                    </div>
                                    <div class="blog-post-content">
									<?php if($blog_single[0]['int_media_type']=='2') {?>
                                        <div class="blog-post-img">
										<video width="100%" height="100%" controls>
													<source src="<?php echo base_url().$blog_single[0]['txt_media_url']; ?>" type="video/mp4">
												</video>
									</div><?php } else {?>
									<div class="blog-post-img">
                                            <img src="<?php echo base_url().$blog_single[0]['txt_media_url'];?>" alt="blog image">
									</div><?php }?>
                                        <p><?php echo $blog_single[0]['txt_description'];?></p>
                                        <!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p>
                                        <ul>
                                            <li><h6>Bullets List :</h6></li>
                                            <li><i class="fa fa-caret-right"></i>Sed ut perspiciatis unde omnis</li>
                                            <li><i class="fa fa-caret-right"></i>But I must explain to you how</li>
                                            <li><i class="fa fa-caret-right"></i>At vero eos et accusamus et iusto</li>
                                            <li><i class="fa fa-caret-right"></i>On the other hand, we denounce</li>
                                            <li><i class="fa fa-caret-right"></i>There are many variations of passages</li>

                                        </ul>
                                        <blockquote>
                                            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                        </blockquote>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p>-->
                                        <div class="blog-post-extras">
                                            <div class="categories extras">
                                                <button><i class="fa fa-folder-open"></i>categories</button>
                                                <a href="#">entertainment</a>
                                            </div>
                                            <div class="tags extras">
                                                <button><i class="fa fa-tags"></i>tags</button>
                                                <a href="#">3d movies</a>
                                                <a href="#">videos</a>
                                                <a href="#">HD</a>
                                                <a href="#">Movies</a>
                                            </div>
                                            <div class="social-share extras">
                                                <div class="post-like-btn clearfix">
                                                    <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com">

                                                        <button class="float-left"><i class="fa fa-share-alt"></i>share</button>
                                                        <!-- Facebook -->
                                                        <button class="removeBorder" data-easyshare-button="facebook">
                                                            <span class="fa fa-facebook"></span>
                                                        </button>

                                                        <!-- Twitter -->
                                                        <button class="removeBorder" data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                                            <span class="fa fa-twitter"></span>
                                                        </button>

                                                        <!-- Google+ -->
                                                        <button class="removeBorder" data-easyshare-button="google">
                                                            <span class="fa fa-google-plus"></span>
                                                        </button>

                                                        <div data-easyshare-loader>Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-pagination text-center">
                                            <a href="#"><i class="fa fa-long-arrow-left left-arrow"></i>previous post</a>
                                            <a href="#">next post<i class="fa fa-long-arrow-right right-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end blog post -->
                        <!-- post written by -->
                        <div class="blog-post-written">
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="media-object">
                                        <div class="media-object-section">
										<?php if($blog_single[0]['txt_user_pro_image']==''){ ?>
                                            <div class="blog-post-author-img">
                                                <img src="<?php echo base_url()?>artist_media/profile/blank-profile.jpg" alt="blog post author">
                                            </div>
										<?php }else{?>
										<div class="blog-post-author-img">
                                                <img src="<?php echo base_url().$blog_single[0]['txt_user_pro_image']?>" alt="blog post author">
										</div><?php } ?>
                                        </div>
                                        <div class="media-object-section">
                                            <div class="blog-post-author-des">
                                                <h5>Written by <?php echo $blog_single[0]['txt_fname'].' '.$blog_single[0]['txt_lname']; ?></h5>
                                                <p> <?php echo $blog_single[0]['txt_user_description']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Comments -->
                        <section class="content comments">
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="main-heading borderBottom">
                                        <div class="row padding-14">
                                            <div class="medium-12 small-12 columns">
                                                <div class="head-title">
                                                    <i class="fa fa-comments"></i>
                                                    <h4>Comments <span><?php echo $blog_single[0]['t_comments']; ?></span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="comment-box thumb-border">
                                        <div class="media-object stack-for-small">
                                            <div class="media-object-section comment-img text-center">
											<?php if($get['txt_profile_image']==''){  ?>
                                                <div class="comment-box-img">
                                                    <img src= "<?php echo base_url()?>artist_media/profile/blank-profile.jpg" alt="comment">
											</div><?php } else { ?>
											 <div class="comment-box-img">
                                                    <img src= "<?php echo base_url().$get['txt_profile_image']?>" alt="comment">
											</div><?php } ?>
                                                <h6><a href="#">Joseph John</a></h6>
                                            </div>
                                            <div class="media-object-section comment-textarea">
                                                <form method="post" action="<?php echo site_url()?>/Blog/add_comment">
												<input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="blog_id">
                                                    <textarea name="commentText" placeholder="Add a comment here.."></textarea>
                                                    <input type="submit" name="submit" value="send">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="comment-sort text-right">
                                        <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                                    </div>

                                    <!-- main comment -->
									<?php foreach($comments as $comment){ ?>
                                    <div class="main-comment showmore_one">
                                        <div class="media-object stack-for-small">
                                            <div class="media-object-section comment-img text-center">
                                                <div class="comment-box-img">
                                                    <img src= "images/post-author-post.png" alt="comment">
                                                </div>
                                            </div>
                                            
                                            <div class="media-object-section comment-desc">
                                                <div class="comment-title">
                                                    <span class="name"><a href="#"><?php //echo $ ?></a> Said:</span>
                                                    <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                </div>
                                                <div class="comment-text">
                                                    <p><?php echo $comment['txt_comment']; ?></p>
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
                                        </div>

                                        <div class="media-object stack-for-small">
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
                                        </div>

                                        <div class="media-object stack-for-small">
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
                                    </div>
									<?php } ?><!-- End main comment -->

                                </div>
                            </div>
                        </section><!-- End Comments -->
                        <!-- ad Section -->
                        <div class="googleAdv">
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
                                                    <h6><a href="#"><?php echo $view['txt_title']?> </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><?php echo $view['txt_fname'].' '.$view['txt_lname'] ?><a href="#">admin</a></span>
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
                                                <li class="cat-item"><a href="#">Entertainment &nbsp; (6)</a></li>
                                                <li class="cat-item"><a href="#">Historical &amp; Archival &nbsp;(8)</a></li>
                                                <li class="cat-item"><a href="#">Technology&nbsp;(4)</a></li>
                                                <li class="cat-item"><a href="#">People&nbsp;(3)</a></li>
                                                <li class="cat-item"><a href="#">Fashion &amp; Beauty&nbsp;(2)</a></li>
                                                <li class="cat-item"><a href="#">Nature&nbsp;(1)</a></li>
                                                <li class="cat-item"><a href="#">Automotive&nbsp;(5)</a></li>
                                                <li class="cat-item"><a href="">Foods &amp; Drinks&nbsp;(5)</a></li>
                                                <li class="cat-item"><a href="#">Foods &amp; Drinks&nbsp;(10)</a></li>
                                                <li class="cat-item"><a href="#">Animals&nbsp;(12)</a></li>
                                                <li class="cat-item"><a href="#">Sports &amp; Recreation&nbsp;(14)</a></li>
                                                <li class="cat-item"><a href="">Places &amp; Landmarks&nbsp;(16)</a></li>
                                                <li class="cat-item"><a href="">Places &amp; Landmarks&nbsp;(1)</a></li>
                                                <li class="cat-item"><a href="#">Travel&nbsp;(2)</a></li>
                                                <li class="cat-item"><a href="#">Transportation&nbsp;(3)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- social Fans Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
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
                                <div class="large-12 medium-7 medium-centered columns">
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
                                            <h5>Recent post videos</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <div class="media-object stack-for-small">
                                                <div class="media-object-section">
                                                    <div class="recent-img">
                                                        <img src= "images/category/category4.png" alt="recent">
                                                        <a href="#" class="hover-posts">
                                                            <span><i class="fa fa-play"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-object-section">
                                                    <div class="media-content">
                                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-object stack-for-small">
                                                <div class="media-object-section">
                                                    <div class="recent-img">
                                                        <img src= "images/category/category2.png" alt="recent">
                                                        <a href="#" class="hover-posts">
                                                            <span><i class="fa fa-play"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-object-section">
                                                    <div class="media-content">
                                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-object stack-for-small">
                                                <div class="media-object-section">
                                                    <div class="recent-img">
                                                        <img src= "images/sidebar-recent1.png" alt="recent">
                                                        <a href="#" class="hover-posts">
                                                            <span><i class="fa fa-play"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-object-section">
                                                    <div class="media-content">
                                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-object stack-for-small">
                                                <div class="media-object-section">
                                                    <div class="recent-img">
                                                        <img src= "images/sidebar-recent2.png" alt="recent">
                                                        <a href="#" class="hover-posts">
                                                            <span><i class="fa fa-play"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-object-section">
                                                    <div class="media-content">
                                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                                    </div>
                                                </div>
                                            </div>
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
            </section><!-- End Category Content-->