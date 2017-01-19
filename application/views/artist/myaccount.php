<link href="<?php echo base_url();?>plugins/jQuery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>plugins/jQuery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url();?>plugins/jQuery.filer/js/jquery.filer.min.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/jQuery.filer/js/custom.js?v=1.0.5"></script>
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
    /*
    .pattern-overlay {
    
        background-color: rgba(89, 171, 2, 0.75);
    
    }*/
    header{
        background-color: #333; 
    }
    .blur-bg{
        width: 100%;
        height: 200px;
        position: relative;
    }
    .blur-bg:before {
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.4);
        content: "";
        width: 100%;
        height: 100%;
    }
    .personal-detail, .challwe-profile{
        background: #f2f2f2;
    }
    .user-small-profile{
        width: 50px;
        display: inline-block;
        vertical-align: top;
        margin-right: 10px;
    }
    .post-head #post-close{
        color: #ccc;
        cursor: pointer;
    }
	
	
	
	
	.comment textarea{
        border-radius: 12px;
        resize: none;
        height: 80px;
    }
    .comment .btn-default{
        background-color: #58ba2b;
        color: #fff;
        margin-top: 20px;
    }
    .row-small{
        margin-left:-5px;
        margin-right:-5px;
        margin-bottom: 0;
    }
    .row-small > div{
        padding-left:5px;
        padding-right:5px;
    }
    .comment-profile{
        font-size: 10px;
        line-height: 15px;
    }
    .user-comment{
        display: inline-block;
        width: 100%;
        padding: 10px;
        background-color: #f0f0f0;
        margin-bottom: 10px;
    }
    .pd-0{
        padding: 0 !important;
    }
    .mr-btm{
        margin-bottom: 0 !important;
    }
    .comment-btn{
        background: transparent;
        border: none;
        text-decoration: underline;
    }
    .comment-btn:focus, .comment-btn:hover, .comment-btn:active{
        box-shadow: none;
        border: none;
        outline: none;
    }
</style>

<div id="show-post-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body display-full">
                <div class="col-sm-12">
                   <img id="album-image-preview" src="" style="width:100%;" /> 
                </div>
				<div class="col-sm-11">&nbsp;</div>
				<div class="col-sm-11">
					<input type="hidden" name="hd_media_id" id="hd_media_id">
					<div id="media-comments">
						
					</div>
					<div class="loader h5 text-center collapse" id="photo-comment-loader" ><span class="fa fa-refresh fa-spin fa-2x fa-fw" style="color: #58ba2b;">&nbsp;</span></div>
				</div>	
				<?php  if ($user['int_artist_id']) {?>
				<div class="col-sm-12">
					<div class="comment">
						<textarea placeholder="your comment..." name="txt_media_comment" id="txt_media_comment" class="cl-comment-box"></textarea>
						<div class="text-right">
							<button class="btn btn-default cl-comment-btn" id="btn_mdeia_comment">Submit</button>
						</div>
					</div>
				</div>
				<?php }?>
            </div>
        </div>		 
    </div>
</div>

<section id="main" style="margin-top: 90px;">

    <!-- Main Content -->
    <div class="content margin-bottom60">
        <div class="blur-bg" style="background: url('<?php echo ($user_details['txt_cover_image'])?base_url().$user_details['txt_cover_image']:base_url()."assets/images/watermarked_cover.png"; ?>') no-repeat center;background-size: cover;">

        </div>
        <div class="container">

            <!--profile page start-->

            <div class="row profile-detail">
                <div class="col-sm-3" style="width: 30%;">&nbsp;</div>
                <div class="col-sm-9" style="width: 70%;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#post"><span class="fa fa-plus">&nbsp;</span>Post</a></li>
						<li><a data-toggle="tab" href="#album"><span class="fa fa-picture-o">&nbsp;</span>Album</a></li>
                        <li><a data-toggle="tab" href="#follow"><span class="fa fa-user-plus">&nbsp;</span>Followers</a></li>
                        <li><a data-toggle="tab" href="#achievements"><span class="fa fa-trophy">&nbsp;</span>Achievements</a></li>
                        <li><a data-toggle="tab" href="#feeds"><span class="fa fa-feed">&nbsp;</span>Feeds</a></li>
                        <li><a data-toggle="tab" href="#forum"><span class="fa fa-users">&nbsp;</span>Forum</a></li>
                    </ul>
                </div>
                <div class="col-sm-3" style='width: 30%'>
                    <div class='personal-detail'>
                        <div class='img-full text-center'>
                            <img src="<?php echo ($user_details['txt_profile_image']) ? base_url() . $user_details['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="img-thumbnail profile-view" alt="User Image">
                            <div class="profile-info">
                                <!--ul class="list-inline">
                                    <li><a href="#"><span class="fa fa-envelope-o fa-lg"></span></a></li>
                                    <li><a href="#"><span class="fa fa-leaf fa-lg"></span></a></li>
                                </ul-->
                                <h3 class="text-capitalize"><?php echo $user_details['txt_fname']." ".$user_details['txt_lname']?></h3>
                                <ul class="list-inline" style="display: flex;">
                                    <li><a href="#"><span class="fa fa-user-plus fa-lg">&nbsp;<span style="display: block;font-size: 11px;color: #999;margin-top: 5px;"><?php echo count($followers);?> followers</span></span></a></li>
									<li><a href="javascript:vioid(0);"data-toggle="modal" data-target="#edit-profile"><span class="fa fa-edit fa-lg">&nbsp;<span style="display: block;font-size: 11px;color: #999;margin-top: 5px;"> edit</span></span></a></li>	
                                </ul>
                            </div>
                        </div>
                        <div class="right_details_items">
                            <!--Start Details Row  -->
                            <div class="right_details_row">
                                <span class="label-title">Gender</span><?php echo ($user_details['int_gender']==1)?"Female":"Male";?>                                </div>
                            <div class="right_details_row">
                                <span class="label-title">Place Of Birth</span><?php echo $user_details['txt_place_of_birth'];?></div>

                            <div class="right_details_row">
                                <span class="label-title">Location</span><?php echo $user_details['country_name'];?>                                </div>
                            <div class="right_details_row">  
                                <span class="label-title">Phone Number</span><?php echo $user_details['txt_cell_no'];?>                                </div>

                            <div class="right_details_row">
                                <span class="label-title">E-mail</span><?php echo $user_details['txt_email'];?>                               </div>


                            <div class="right_details_row">
							<?php 
								$birthDate = explode("/", date("m/d/Y",strtotime($user_details['dt_dob'])));
								  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")? ((date("Y") - $birthDate[2]) - 1): (date("Y") - $birthDate[2]));
							?>
                                <span class="label-title">Age</span><?php echo ($age)? $age." Years Old":"";?>                                </div>
                            <div class="user_bio right_details_row">

                                <div class='label-title'>Skills &nbsp;</div>
										<?php echo $getskill[0]['skill_name'];?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-9' style='width: 70%;'>
                    <div class='challwe-profile'>
                        <div class="tab-content">
                            <div id="post" class="tab-pane fade in active">
								<form action="<?php echo site_url().'/artist/addPost'?>" method="POST" enctype="multipart/form-data">
                                <div class="submit-post margin-bottom-20" style="display: none;">
                                    <div class="post-head">
                                        <ul class="list-inline layout-row align-center justify-space-between margin-bottom-5">
                                            <li class="custom-file">
                                                <div class="video-open"><span class="fa fa-camera"></span>&nbsp;Image/Audio/Video</div>
                                                <input type="file" value="" name="post_file" id="post_file" />
                                            </li>
                                            <li class="pull-right"><span class="fa fa-times" id="post-close"></span></li>
                                        </ul>
                                    </div>
                                    <div class="layout-row align-center margin-bottom-10 post-body">
                                        <div class="" style="width: 20%;">
                                            <img src="<?php echo ($user_details['txt_profile_image']) ? base_url() . $user_details['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="user-small-profile img-responsive">
                                        </div>
                                        <div  style="width: 80%;padding-left: 15px;">
                                            <textarea id="post_description" name="post_description" placeholder="Your Post Your Mind...?"></textarea>
                                        </div>
                                    </div>
                                    <div class="post-footer">
                                        <div class="pull-right">
                                            <input type="submit" class="button" style="padding: 2px 10px;" value="Post" name="btn_post">
                                        </div>
                                    </div>									
                                </div>
								</form>
                                <ul class="list-inline layout-row align-center justify-space-between margin-bottom-20" style="width: 100%;">
                                    <li></li>
                                    <li class="pull-right"><button id="add-post" class="button" style="padding: 5px 15px;">Add Post</button></li>
                                </ul>
                                
								<?php 
								$i=0;
								foreach($post_list as $val){ $i++;?>
                                <?php if($i%2==0){?><div class="row"><?php }?>
                                    <div class="col-sm-6">
										<a href="<?php echo site_url()."/content/postvideos/".$val['int_post_id'];?>">
                                        <div class="show-post">
										<?php if($val['int_post_type']==1){?>	
                                            <div class="post-img">
                                                <img src="<?php echo ($val['txt_filepath'])?base_url().$val['txt_filepath']:base_url()."/assets/images/watermarked_cover.png"?>">
                                                <div class="post-description">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><?php echo $val['txt_title'];?></a></li>
                                                        <li class="pull-right"><a href="#">By&nbsp;&nbsp;<span><?php echo $val['txt_fname']." ".$val['txt_lname'];?></span></a></li>
                                                    </ul>
                                                    <div class="title"></div>
                                                </div>
                                            </div>
										<?php }else if($val['int_post_type']==1){?>
											<div class="post-img">
                                                <video>
												  <source src="<?php echo base_url().$val['txt_filepath'];?>">
												</video>
												<div class="post-description">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><?php echo $val['txt_title'];?></a></li>
                                                        <li class="pull-right"><a href="#">By&nbsp;&nbsp;<span><?php echo $val['txt_fname']." ".$val['txt_lname'];?></span></a></li>
                                                    </ul>
                                                    <div class="title"></div>
                                                </div>
                                            </div>
										<?php }else{?>
											<div class="post-img">
                                                <div><?php echo $val['txt_description'];?></div>
												<div class="post-description">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><?php echo $val['txt_title'];?></a></li>
                                                        <li class="pull-right"><a href="#">By&nbsp;&nbsp;<span><?php echo $val['txt_fname']." ".$val['txt_lname'];?></span></a></li>
                                                    </ul>
                                                    <div class="title"></div>
                                                </div>
                                            </div>
										<?php }?>
                                            <div class="post-controls">
                                                <ul class="list-inline">
                                                    <li><span class="fa fa-thumbs-up">&nbsp;</span>&nbsp;4</li>
                                                    <li><span class="fa fa-star">&nbsp;</span>&nbsp;2</li>
                                                    <li><span class="fa fa-eye">&nbsp;</span>&nbsp;10</li>
                                                    <li class="pull-right"><span title="<?php echo date('Y-m-d, h:i',strtotime($val['txt_fname']))?>" class="fa fa-calendar">&nbsp;</span></li>
                                                </ul>
                                            </div>
                                        </div>
										</a>
                                    </div>
                                    
                                    
                                <?php if($i%2==0){?></div><?php }?>
                                <?php }?>
                            </div>
							<div id="album" class="tab-pane fade ">
								<input type="file" name="files[]" id="filer_input2" >
								<div class="btn-block text-right">
									<button class="btn btn-primary" data-toggle="modal" data-target="#create-album">Create Album</button>
								</div>
                                <h4>Album</h4>
                                <div class="row">
								<?php 
								$allAlbum_arr=array();
								foreach($album_details as $val){
										if(in_array($val['int_album_id'],$allAlbum_arr)) continue;
										$allAlbum_arr[]=$val['int_album_id'];
										$no_of_photos=$val['no_of_photos'];
										?>

                                    <div class="col-sm-4">
                                        <div class="show-post">
                                            <div class="post-img">
                                                <img src="<?php echo ($val['txt_path'])?base_url().$val['txt_path']:base_url()."uploads/folder.jpg";?>">
                                                <div class="post-description">
                                                    <ul class="list-inline">
                                                        <li><a href="<?php echo site_url()."/artist/myAlbum/".$val['slug'];?>"><?php echo $val['txt_name'];?></a></li>
                                                        <li class="pull-right"><a href="#"><?php echo $no_of_photos." photos"?></a></li>
                                                    </ul>
                                                    <div class="title"></div>
                                                </div>
                                            </div>
                                            <div class="post-controls">
                                                <ul class="list-inline">
                                                    <li><span class="fa fa-thumbs-up">&nbsp;</span>&nbsp;4</li>
                                                    <li><span class="fa fa-star">&nbsp;</span>&nbsp;2</li>
                                                    <li><span class="fa fa-eye">&nbsp;</span>&nbsp;10</li>
                                                    <li class="pull-right">
														<span id="btn_album_<?php echo $val['int_album_id']?>" class="fa fa-trash del_album_btn">&nbsp;</span>
													</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
								<?php }?>
                                </div>
                                <h4>Photo</h4>
                                <div class="row">
								<?php foreach($media_details as $val){?>
                                    <div class="col-sm-4">
                                        <div class="show-post" data-toggle="modal" data-target="#show-post-modal" onclick="showImagePreview(<?php echo $val['int_media_id'];?>)">
                                            <div class="post-img">
                                                <img src="<?php echo base_url().$val['txt_path']?>" id="small-img-<?php echo $val['int_media_id'];?>">
                                                <div class="post-description">
                                                    <!--ul class="list-inline">
                                                        <li><a href="#">Exorsicm</a></li>
                                                        <li class="pull-right"><a href="#">By&nbsp;&nbsp;<span>hadia khoury</span></a></li>
                                                    </ul-->
                                                    <div class="title"></div>
                                                </div>
                                            </div>
                                            <div class="post-controls">
                                                <ul class="list-inline">
                                                    <li><span class="fa fa-thumbs-up">&nbsp;</span>&nbsp;4</li>
                                                    <li><span class="fa fa-star">&nbsp;</span>&nbsp;2</li>
                                                    <li><span class="fa fa-eye">&nbsp;</span>&nbsp;10</li>
                                                    <li class="pull-right"><span id="btn_media_<?php echo $val['int_media_id']?>" class="fa fa-trash del_photo_btn">&nbsp;</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
								<?php }?>
                                </div>
                            </div>
                            <div id="follow" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
										<?php foreach($followers as $val){?>
                                        <div class="col-sm-6">
                                            <a href="<?php echo site_url()."/content/viewProfile/".$val['int_artist_id'];?>">
                                                    <img src="<?php echo ($val['txt_profile_image']) ? base_url() . $val['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="user-small-profile">
                                                    <span><?php echo $val['txt_fname']." ".$val['txt_lname'];?></span>
                                                </a>
                                        </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                    <!--div class="col-sm-6">
                                        <h4 style="margin-bottom: 20px;">Followers</h4>
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#">
                                                    <img src="<?php echo ($user['txt_profile_image']) ? base_url() . $user['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="user-small-profile">
                                                    <span>user name</span>
                                                </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#">
                                                    <img src="<?php echo ($user['txt_profile_image']) ? base_url() . $user['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="user-small-profile">
                                                    <span>user name</span>
                                                </a>
                                        </div>
                                        </div>
                                    </div-->
                                </div>
                            </div>
                            <div id="achievements" class="tab-pane fade">
                                <h3>Achievements</h3>
                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a data-toggle="tab" href="#views">
                                            <span class="h4">55</span><span class="fa fa-eye">&nbsp;</span><p>Total views</p>
                                        </a></li>
                                    <li><a data-toggle="tab" href="#respects">
                                            <span class="h4">32</span><span class="fa fa-user-plus">&nbsp;</span><p>Total respects</p>
                                        </a></li>
                                    <li><a data-toggle="tab" href="#average">
                                            <span class="h4">85%</span><p>Average</p>
                                        </a></li>
                                    <li><a data-toggle="tab" href="#posts">
                                            <span class="h4">13</span><span class="fa fa-plus">&nbsp;</span><p>Total posts</p>
                                        </a></li>
                                    <li><a data-toggle="tab" href="#challenges">
                                            <span class="h4">0</span><span class="fa fa-trophy">&nbsp;</span><p>Total challenges</p>
                                        </a></li>
                                </ul>
                                <div class="tab-content totel-achive">
                                    <div id="views" class="tab-pane fade in active">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="50%">Post Title</th>
                                                        <th width="40%">Views count</th>
                                                        <th width="10%">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Title 1</td>
                                                        <td>15</td>
                                                        <td><span class="fa fa-sort-amount-desc">&nbsp;</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title 2</td>
                                                        <td>22</td>
                                                        <td><span class="fa fa-sort-amount-desc">&nbsp;</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title 3</td>
                                                        <td>3</td>
                                                        <td><span class="fa fa-sort-amount-desc">&nbsp;</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="respects" class="tab-pane fade">
                                        <h3 class="text-capitalize">respects</h3>
                                        <ul class="list-group">
                                            <li class="list-group-item"><a href="#">sad</a></li>
                                            <li class="list-group-item"><a href="#">Great</a></li>
                                            <li class="list-group-item"><a href="#">ok</a></li>
                                        </ul>
                                    </div>
                                    <div id="average" class="tab-pane fade">
                                        <h3 class="text-capitalize">average</h3>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="75%">Post Title</th>
                                                        <th width="25%" class="text-right">Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Title 1</td>
                                                        <td class="text-right">15</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title 2</td>
                                                        <td class="text-right">22</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title 3</td>
                                                        <td class="text-right">3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                    <div id="posts" class="tab-pane fade">
                                        <!--                                        <h3 class="text-capitalize">posts</h3>-->
                                    </div>
                                    <div id="challenges" class="tab-pane">
                                        <h4 class="text-capitalize">Challenge Created</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="empty">Empty</p>
                                                <div class="created-challange"></div>
                                            </div>
                                        </div>
                                        <h4 class="text-capitalize">Challenge Participated</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="empty">Empty</p>
                                                <div class="created-challange"></div>
                                            </div>
                                        </div>
                                        <h4 class="text-capitalize">winner</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="empty">Empty</p>
                                                <div class="created-challange"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="feeds" class="tab-pane fade">
                                <h3>Feeds</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">hadi sharif comment on <a href="#">Post 2</a><span class="badge">26/07/2016</span></li>
                                    <li class="list-group-item">hadi sharif comment on <a href="#">Post 2</a> <span class="badge">26/07/2016</span></li>
                                    <li class="list-group-item">hadi sharif comment on <a href="#">Post 2</a> <span class="badge">26/07/2016</span></li>
                                </ul>
                            </div>
                            <div id="forum" class="tab-pane fade">
                                <h3>Forum</h3>
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="#">comment</a>
                                        <ul class="pull-right list-inline">
                                            <li><span class="fa fa-comment">&nbsp;</span><sub>0</sub></li>
                                            <li><span class="fa fa-hand-rock-o">&nbsp;</span><sub>0</sub></li>
                                            <li><span class="fa fa-calendar">&nbsp;</span><sub>14/09/2016</sub></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item"><a href="#">comment</a>
                                        <ul class="pull-right list-inline">
                                            <li><span class="fa fa-comment">&nbsp;</span><sub>0</sub></li>
                                            <li><span class="fa fa-hand-rock-o">&nbsp;</span><sub>0</sub></li>
                                            <li><span class="fa fa-calendar">&nbsp;</span><sub>14/09/2016</sub></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item"><a href="#">comment</a>
                                        <ul class="pull-right list-inline">
                                            <li><span class="fa fa-comment">&nbsp;</span><sub>0</sub></li>
                                            <li><span class="fa fa-hand-rock-o">&nbsp;</span><sub>0</sub></li>
                                            <li><span class="fa fa-calendar">&nbsp;</span><sub>14/09/2016</sub></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /Main Content -->
	
	
	
	<!--modal-->
<div id="create-album" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 65%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Album</h4>
      </div>
	  <form method="POST" action="<?php echo site_url()."/artist/createAlbum"?>">
      <div class="modal-body">
          <input type="text" placeholder="Album title" class="form-control" name="txt_name" id="txt_name" />
          <div class="margin-top60 btn-block">
              <ul class="list-inline">
			  <?php foreach($media_details as $val){?>
                  <li style="display: inline-flex;">
                      <input type="checkbox" style="margin-right: 10px;" class="check-album" name="int_media_id[]" value="<?php echo $val['int_media_id'];?>" />
                      <img style="max-width:170px;max-height:150px;" src="<?php echo base_url().$val['txt_path'];?>" />
                  </li>
                  
			  <?php } ?>
              </ul>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="btn_create_album" value="Create">
      </div>
	  </form>
    </div>

  </div>
</div>
<!--end modal-->


	<!--modal-->
<div id="edit-profile" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 65%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
	  <form method="POST" action="<?php echo site_url()?>/artist/updateArtistdetails" enctype="multipart/form-data" >
      <div class="modal-body">
          <div id="tabs-1">
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Profile Image.</label>
					  <div class="col-sm-7">
						<input type="file" id="imgInp" name="profile_img" value="" class="form-control">
						<span id="span_img_preview">
							<img src="<?php echo ($user_details['txt_profile_image'])? base_url().$user_details['txt_profile_image']:base_url()."uploads/no-image.png"?>" style="width:150px;height:150px;" id="img_preview">
						</span>
					  </div>
					</div>    
				</div>
				
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Cover Image</label>
					  <div class="col-sm-7">
							<input type="file" id="cover_image" name="cover_image" class="form-control">
							<span id="span_img_preview">
							<img src="<?php echo ($user_details['txt_coveer_image'])? base_url().$user_details['txt_coveer_image']:base_url()."assets/images/watermarked_cover.png"?>" style="width:350px;height:150px;" id="img_preview">
						</span>
					  </div>
					</div>    
				</div>

				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Email</label>
					  <div class="col-sm-7">
						<input type="text" placeholder="Email" id="txt_email" value="<?php echo $user_details['txt_email']?>" disabled class="form-control">
						<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_email'])?"checked":"";?> name="int_email" id="int_email" ></span>
					  </div>
					</div>    
				</div>
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Password</label>
					  <div class="col-sm-7">
						<input type="password" placeholder="Password" id="txt_password" name="txt_password" value="<?php echo $user_details['txt_password']?>" class="form-control">
					  </div>
					</div>    
				</div>

				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">First Name</label>
					  <div class="col-sm-7">
						<input type="text" placeholder="First Name" id="txt_fname" name="txt_fname" value="<?php echo $user_details['txt_fname']?>" class="form-control">
					  </div>
					</div>    
				</div>

				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Last Name</label>
					  <div class="col-sm-7">
						<input type="text" placeholder="Last Name" id="txt_lname" name="txt_lname" value="<?php echo $user_details['txt_lname']?>" class="form-control">
					  </div>
					</div>    
				</div>

				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Gender</label>
					  <div class="col-sm-7">
						<select id="txt_gender" name="int_gender" class="form-last-name form-control require">
							<option value="0" <?php echo ($user_details['int_gender']==0)?"selected":"";?>>Male</option>
							<option value="1" <?php echo ($user_details['int_gender']==1)?"selected":"";?>>Female</option>
						</select>
						<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_gender'])?"checked":"";?> name="int_d_gender" id="int_d_gender" ></span>
					  </div>
					</div>    
				</div>
				
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Date oF Birth</label>
					  <div class="col-sm-7">
						<input type="text" placeholder="DOB" id="dt_dob" name="dt_dob" value="<?php echo date('m/d/Y',strtotime($user_details['dt_dob']))?>" class="form-control">
						<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_dob'])?"checked":"";?> name="int_dob" id="int_dob" ></span>
					  </div>
					</div>    
				</div>
				
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Place oF Birth</label>
					  <div class="col-sm-7">
						<input type="text" placeholder="Place Of Birth" id="txt_place_of_birth" name="txt_place_of_birth" value="<?php echo $user_details['txt_place_of_birth']?>" class="form-control">
						<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_place_of_birth'])?"checked":"";?> name="int_place_of_birth" id="int_place_of_birth" ></span>				
					  </div>
					</div>    
				</div>
				
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Cell No.</label>
					  <div class="col-sm-7">
						<input type="text" placeholder="Cell No" id="txt_cell_no" name="txt_cell_no" value="<?php echo $user_details['txt_cell_no']?>" class="form-control">
						<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_cell_no'])?"checked":"";?> name="int_cell_no" id="int_cell_no" ></span>
					  </div>
					</div>    
				</div>

				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="inputEmail3">Country</label>
						<div class="col-sm-7">
							<select name="int_country_id"  class="form-last-name form-control require" id="int_country_id">
								<option value="0">-Select-</option>
							   <?php foreach ($countries as $country) {  ?>
								<option value="<?php echo $country['id'] ?>" <?php echo ($user_details['int_country_id']==$country['id'])?"selected":"";?> ><?php echo $country['name'] ?></option>
							   <?php } ?>
							</select>
							<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_country'])?"checked":"";?> name="int_country" id="int_country" ></span>
						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Biographic Information</label>
					  <div class="col-sm-7">
							<textarea id="txt_biographic_info" name="txt_biographic_info" class="form-control" placeholder="Biographic Information"><?php echo $user_details['txt_biographic_info']?></textarea>
					  </div>
					</div>    
				</div>
				
				<div class="row">
					<div class="form-group">
					  <label class="col-sm-3 control-label" for="inputEmail3">Skills (Max.5)</label>
					  <div class="col-sm-8">
						<select id="int_directory_id" name="int_directory_id[]"  multiple  style="width:80%;">
						  <option>-Select-</option>
						<?php 
						 $skill_arr = array($user_details['int_skill1'],$user_details['int_skill2'],$user_details['int_skill3'],$user_details['int_skill4'],$user_details['int_skill5']);
						 foreach($directory as $val){?>                                      
						 <option value="<?php echo $val['int_field_id']?>" <?php echo in_array($val['int_field_id'],$skill_arr)?"selected":"";?>><?php echo $val['txt_field_name']?></option>
						<?php } ?>
						</select>
						<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_skills'])?"checked":"";?> name="int_skills" id="int_skills" ></span>	
					  </div>
					</div>    
				</div>

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="btn_create_album" value="Save">
      </div>
	  </form>
    </div>

  </div>
</div>
<!--end modal-->
</section>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                $("#span_img_preview").show();
                $('#img_preview').attr('src', e.target.result);
            }            
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	function getMediaComments(mediaId){
		$("#photo-comment-loader").show();
		$.ajax({
			type: "POST",
			url: '<?php echo site_url();?>/content/getPhotoComments',
			datatype: "json",
			data: {'id':mediaId},
			crossDomain: true,
			success: function(response) {
				$("#photo-comment-loader").hide();
				var data=JSON.parse(response);
				if(data.success){
					var html='';
					$.each(data.result, function(id,result) {
						var d = new Date(result.dt_commented_on);
						var profile_img="<?php echo base_url(); ?>assets/images/profile-placeholder.jpg";
						if(result.txt_profile_image) profile_img="<?php echo base_url(); ?>"+result.txt_profile_image;
						html+='<div class="user-comment">';
						html+='<div class="col-sm-1 pd-0 text-center">';
						html+='<a href="<?php echo site_url()."/content/viewProfile/"?>'+result.int_artist_id+'">';
						html+='<img src="'+profile_img+'" class="img-circle img-responsive" />';
						html+='<div class=""><label class="h5">'+result.txt_fname+' '+result.txt_lname+'</label></div>';
						html+='</a>';
						html+='</div>';
						html+='<div class="col-sm-10">';
						html+='<p>'+result.txt_comment+'</p>';
						html+='</div>';
						html+='<div class="col-sm-1 pd-0">';
						html+='<div class="comment-profile">';
						//html+='<span class="time">'+ d.getHours()+':'+d.getMinutes()+'</span>';
						html+='<span class="date">'+ d.getDate()+'/'+d.getMonth()+'/'+d.getFullYear()+'</span>';
						html+='</div>';
						html+='</div>';
						html+='</div>';
					});
					$("#media-comments").html(html);
				}
			},
			error: function(result) {
				$("#photo-comment-loader").show();
			}
		});
	}
	
	function showImagePreview(mediaId){
		var img=$("#small-img-"+mediaId).attr("src");
		$("#album-image-preview").attr("src",img);
		$("#hd_media_id").val(mediaId);
		getMediaComments(mediaId);
		
	}

    $(document).ready(function(){
		
		$("#int_directory_id").select2();
        $("#dt_dob").datepicker({
			changeYear: true,
			<?php if($user_details['dt_dob']){?>
            minDate: '01/01/<?php echo date('Y',strtotime($user_details['dt_dob']));?>',
            maxDate: '12/31/<?php echo date('Y',strtotime($user_details['dt_dob']));?>',
            defaultDate: <?php echo date('m/d/Y',strtotime($user_details['dt_dob']));?>
			<?php }?>
		});
		$("#imgInp").change(function(){
            readURL(this);
        });

		$(".cl-comment-btn").click(function(){
			id=$("#hd_media_id").val();
			var comment=$("#txt_media_comment").val();
			if(comment!=''){
				$.ajax({
					type: "POST",
					url: "<?php echo site_url(); ?>/artist/addMediaComment",
					data: {'id': id,'comment':comment},
					cache: false,
					success: function (data) {
						$("#txt_media_comment").val('');
						getMediaComments(id);
					}
				});
			}
			
		});
	
	
        $(".del_photo_btn").click(function(){
            var id=this.id.split("_");
            $("#fade").show();
            $("#preloader").show();
            $.ajax({
                type: "POST",
                url: '<?php echo site_url();?>/artist/removeArtistMedia',
                datatype: "json",
                data: {'id':id[2]},
                crossDomain: true,
                success: function(result) {
                    $("#btn_media_"+id[2]).parent().parent().parent().parent().parent().remove();
                    $("#fade").hide();
                    $("#preloader").hide();
                },
                error: function(result) {
                    $("#fade").hide();
                    $("#preloader").hide();
                }
            });
        });
		
		$(".del_album_btn").click(function(){
            var id=this.id.split("_");
            $("#fade").show();
            $("#preloader").show();
            $.ajax({
                type: "POST",
                url: '<?php echo site_url();?>/artist/removeArtistAlbum',
                datatype: "json",
                data: {'id':id[2]},
                crossDomain: true,
                success: function(result) {
                    $("#btn_album_"+id[2]).parent().parent().parent().parent().parent().remove();
                    $("#fade").hide();
                    $("#preloader").hide();
                },
                error: function(result) {
                    $("#fade").hide();
                    $("#preloader").hide();
                }
            });
        });
	
        $("#add-post").click(function(e){
           e.preventDefault();
            $(this).hide(500);
            $(".submit-post").slideDown(1000);
        });
        $("#post-close").click(function(e){
           e.preventDefault();
            $(".submit-post").slideUp(1000);
            $("#add-post").show(500);
        });
        
        
    });

</script>
