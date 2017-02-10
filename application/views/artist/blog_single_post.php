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
                                        <h3><a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $this->uri->segment(3);?>"><?php echo $blog_single[0]['txt_title']; ?></a></h3>
                                        <p>
                                            <span><i class="fa fa-user"></i><a href="<?php echo site_url()?>/user/view_profile/<?php echo $blog_single[0]['int_artist_id']?>"><?php echo $blog_single[0]['txt_fname'].' '.$blog_single[0]['txt_lname'] ; ?></a></span>
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
                                                <a href="#"><?php echo $get_cat[0]['txt_title'];?></a>
                                            </div>
                                            <!--<div class="tags extras">
                                                <button><i class="fa fa-tags"></i>tags</button>
                                                <a href="#">3d movies</a>
                                                <a href="#">videos</a>
                                                <a href="#">HD</a>
                                                <a href="#">Movies</a>
                                            </div>-->
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
											<?php if($get[0]['txt_profile_image']==''){  ?>
                                                <div class="comment-box-img">
                                                    <img src= "<?php echo base_url()?>artist_media/profile/blank-profile.jpg" alt="comment">
											</div><?php } else { ?>
											 <div class="comment-box-img">
                                                    <img src= "<?php echo base_url().$get[0]['txt_profile_image']?>" alt="comment">
											</div><?php } ?>
                                                <h6><a href="#"><?php echo $get[0]['txt_fname'].' '.$get[0]['txt_lname']?></a></h6>
                                            </div>
                                            <div class="media-object-section comment-textarea">
                                                <form method="">
												<input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="blog_id">
                                                    <textarea name="commentText" id="commentText" placeholder="Add a comment here.."></textarea>
                                                    <input type="button" name="submit" value="send" onclick="addcomment(<?php echo $this->uri->segment(3)?>);">
                                                </form>
                                            </div>
											
                                        </div>
                                    </div>
                                        <div class="comment-sort text-right">
                                        <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                                    </div>

                                    <!-- main comment -->
									
                                    <div class="main-comment showmore_one">
									<?php foreach($comments as $comment){ ?>
                                        <div class="media-object stack-for-small">
                                            <div class="media-object-section comment-img text-center">
											<?php if($comment['txt_user_pro_image']==''){?>
                                                <div class="comment-box-img">
                                                    <img src= "<?php echo base_url()?>artist_media/profile/blank-profile.jpg" alt="comment">
											</div><?php } else {?>
											<div class="comment-box-img">
                                                    <img src= "<?php echo base_url().$comment['txt_user_pro_image'];?>" alt="comment">
											</div><?php }?>
                                            </div>
                                            
                                            <div class="media-object-section comment-desc">
                                                <div class="comment-title">
                                                    <span class="name"><a href="#"><?php echo $comment['txt_fname'].' '.$comment['txt_lname']; ?></a> Said:</span>
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
                                                <!--<div class="media-object stack-for-small reply-comment">
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
                                                <!--<div class="media-object stack-for-small reply-comment">
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
									<?php } ?>
                                    </div><!-- End main comment -->
									<div class="main-comment showmore_one" id="id_comments">
									</div>
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
												<a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $view['int_blog_id'];?>"><video width="100%" height="100%" controls>
													<source src="<?php echo base_url().$view['txt_media_url']; ?>" type="video/mp4">
												</video></a>
                                                   <!-- <img src= alt="most viewed videos">-->
                                                    <a href="<?php echo base_url().$view['txt_media_url']; ?>" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div>
											<?php } 
                                                else
												{?><div class="video-img-thumb">
                                                    <a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $view['int_blog_id'];?>"><img src="<?php echo base_url().$view['txt_media_url']?>" alt="most viewed videos"></a>
                                                    <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div><?php } ?>
                                                <div class="video-box-content">
                                                    <h6><a href="<?php echo site_url()?>/Blog/single_blog_post/<?php echo $view['int_blog_id'];?>"><?php echo $view['txt_title']?> </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="<?php echo site_url()?>/User/view_profile/<?php echo $view['int_artist_id'];?>"><?php echo $view['txt_fname'].' '.$view['txt_lname'] ?></a></span>
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
                                                        <h6><a href="#"><?php echo $recent['txt_title'] ?></a></h6>
                                                        <p><i class="fa fa-user"></i><span><a href="<?php echo site_url()?>/User/view_profile/<?php echo $view['int_blog_id'];?>"><?php echo $recent['txt_fname'].' '.$recent['txt_lname'] ?></span><i class="fa fa-clock-o"></a></i><span><?php echo $recent['dt_created_on']; ?></span></p>
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
				<script src="<?php echo base_url();?>js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript">
	
	function addcomment(id){
		//console.log(id);
  if($("#commentText").val()!=''){
  //$("#commentText").val('');	
  var subject=$('#commentText').val().trim();
  $("#commentText").val('');	
		//alert(subject);	
			$.ajax({
				type:'POST',
				url:"<?php echo site_url().'/Blog/add_comment/'?>"+id,
				data:
				{	  
				    'comment':subject
					
				},
				//dataType: 'json',
				success:function(response)
				{
					getUserComments(id);
				},
				error:function(response)
				{
					alert("failure");
				},
			});
  }else{
	  alert();
  }
}
  function getUserComments(id){
	$.ajax({
	type:'POST',
	url:"<?php echo site_url().'/Blog/get_comment/'?>"+id,
	dataType: 'json',
	success:function(response)
    {
		
		//alert(value.txt_comment);
		html='';
				if(response)
				{$("#id_comments").html('');
					$.each(response, function(key, value) { 
					html+= '<div class="media-object stack-for-small">';
				html+='<div class="media-object-section comment-img text-center">';
				html+='<div class="comment-box-img">';
				if(value.txt_user_pro_image!='') html+='<img src= "<?php echo base_url(); ?>'+value.txt_user_pro_image+'" alt="comment">';
				else html+='<img src= "<?php echo base_url(); ?>artist_media/profile/blank-profile.jpg" alt="comment">';
				html+='</div>';
				html+='</div>';
				html+='<div class="media-object-section comment-desc">';
				 html+='<div class="comment-title">';
				html+='<span class="name"><a href="#"></a> Said:'+value.txt_fname+'</span>';
			    html+='<span class="time float-right"><i class="fa fa-clock-o"></i>'+value.dt_created_on+'</span></div>';
				html+='<div class="comment-text">';
				html+='<p>'+value.txt_comment+'</p></div>';
				html+='<div class="comment-btns">';
				html+='<span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#">';
				html+='<i class="fa fa-thumbs-o-down"></i></a></span>';
				html+='<span><a href="#"><i class="fa fa-share"></i>Reply</a></span>';
				html+='<span class="reply float-right hide-reply"></span></div></div></div>';
					});
					$("#id_comments").append(html);
				}
				else
				{
					alert("Data not Recieved");
				}
		
			},
	
	error:function(response)
   {
		alert("failure");
   },  });
}	
$(document).ready(function(){
	getUserComments(id);
});
</script>