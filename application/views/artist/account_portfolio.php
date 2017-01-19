<link href="<?php echo base_url();?>plugins/jQuery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>plugins/jQuery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
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

.pattern-overlay {

    background-color: rgba(89, 171, 2, 0.75);

}



</style>



<section id="main">

    <div class="breadcrumb-wrapper">

        <div class="pattern-overlay">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">

                        <h2 class="title">My Portfolio</h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Main Content -->

    <div class="content margin-top60 margin-bottom60">

        <div class="container">

            <div clasjFiler-items jFiler-rows="row">

                <!-- Left Section -->

                <div class="col-sm-9 col-md-9 col-lg-9">

                    <input type="file" name="files[]" id="filer_input2" >
                    <div class="btn-block text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#create-album">Create Album</button>
                    </div>
					
					
					<div class="jFiler-items jFiler-row">
						<h3>Albums</h3>
                        <ul class="jFiler-items-list jFiler-items-grid">
                            <?php foreach($album_details as $val){
								//if($val['txt_path']=='' && $val['no_of_photos']==1){
								//	$no_of_photos=$val['no_of_photos']-1;
								//}else{
									$no_of_photos=$val['no_of_photos'];
								//}
								?>
                            <li class="jFiler-item" data-jfiler-index="1" style="">                        
                                <div class="jFiler-item-container">                            
                                <div class="jFiler-item-inner">                                
                                <div class="jFiler-item-thumb">                                    
                                <div class="jFiler-item-status"></div>                                    
                                <div class="jFiler-item-info">                                        
                                <!-- <span class="jFiler-item-title"><b title="city_1 (1).jpg">city_1 (1).jpg</b></span>                                                                         -->
                                </div>                                    
                                <div class="jFiler-item-thumb-image">
                                    <a href="<?php echo site_url()."/artist/myAlbum/".$val['slug'];?>">
										<img src="<?php echo ($val['txt_path'])?base_url().$val['txt_path']:base_url()."uploads/folder.jpg";?>" draggable="false"></div>                                
									</a>
								</div>                                
                                <div class="jFiler-item-assets jFiler-row">                                    
                                <ul class="list-inline pull-left">                                        
                                    <li>
										<div class="">
											<div class="bar" style="width: 100%;"><?php echo $val['txt_name'];?><br> <?php echo $no_of_photos." photos"?></div>
										</div>
                                        <div class="jFiler-item-others"><input type="button" id="btn_album_<?php echo $val['int_album_id']?>" class="btn del_album_btn" value="Delete" ></div>
                                    </li>                                    
                                </ul>                                    
                                <ul class="list-inline pull-right">                                        
                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>                                    
                                </ul>                                
								</div>                            
                                </div>                        
                                </div>                    
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
					
					<hr>
					
                    <div class="jFiler-items jFiler-row">
                        <ul class="jFiler-items-list jFiler-items-grid">
                            <?php foreach($media_details as $val){?>
                            <li class="jFiler-item" data-jfiler-index="1" style="">                        
                                <div class="jFiler-item-container">                            
                                <div class="jFiler-item-inner">                                
                                <div class="jFiler-item-thumb">                                    
                                <div class="jFiler-item-status"></div>                                    
                                <div class="jFiler-item-info">                                        
                                <!-- <span class="jFiler-item-title"><b title="city_1 (1).jpg">city_1 (1).jpg</b></span>                                                                         -->
                                </div>                                    
                                <div class="jFiler-item-thumb-image">
                                    <img src="<?php echo base_url().$val['txt_path']?>" draggable="false"></div>                                
                                </div>                                
                                <div class="jFiler-item-assets jFiler-row">                                    
                                <ul class="list-inline pull-left">                                        
                                    <li><div class="jFiler-jProgressBar" style="display: none;">
                                        <div class="bar" style="width: 100%;"></div></div>
                                        <div class="jFiler-item-others"><input type="button" id="btn_media_<?php echo $val['int_media_id']?>" class="btn del_btn" value="Delete" ></div>
                                    </li>                                    
                                </ul>                                    
                                <ul class="list-inline pull-right">                                        
                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>                                    
                                </ul>                                </div>                            
                                </div>                        
                                </div>                    
                            </li>
                            <?php } ?>
                        </ul>
                        </div>





                </div>

                <!-- /Left Section -->

                <!-- Sidebar -->

                <div id="sidebar" class="sidebar col-sm-3 col-md-3 col-lg-3">

                    <div class="widget">

                        <h3>My Account</h3>

                        <!-- menu-->

                        <div id="sidebar-nav">

                            <ul class="sidebar-nav">

                                <li>

                                    <a href="<?php echo site_url();?>/artist/dashboard"><i class="fa fa-gears item-icon"></i> My Dashboard</a>

                                </li>

                                <li>

                                    <a href="<?php echo site_url();?>/artist/accountDetails"><i class="fa fa-user item-icon"></i> Account Details</a>

                                </li>

                                <li class="active">

                                    <a href="#" style="color:#fff"><i class="fa fa-pencil-square-o item-icon"></i> Portfolio</a>

                                </li>

                                <li>

                                    <a href="<?php echo site_url();?>/artist/accountStatistics"><i class="fa fa-bar-chart item-icon"></i> Statistics</a>

                                </li>

                                <li>

                                    <a href="<?php echo site_url();?>/artist/accountSocial"><i class="fa fa-link item-icon"></i> Social Availabilty</a>

                                </li>

                            </ul>

                        </div>

                        <!-- /menu-->

                    </div>

                </div>

                <!-- /Sidebar -->

            </div>

        </div>

    </div>

    <!-- /Main Content -->

</section>

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

<script>

    $(document).ready(function(){

        $(".del_btn").click(function(){
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
                    $("#btn_media_"+id[2]).parent().parent().parent().parent().parent().parent().parent().remove();
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
                    $("#btn_album_"+id[2]).parent().parent().parent().parent().parent().parent().parent().remove();
                    $("#fade").hide();
                    $("#preloader").hide();
                },
                error: function(result) {
                    $("#fade").hide();
                    $("#preloader").hide();
                }
            });
        });
		
    });

</script>
