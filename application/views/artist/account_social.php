<script src="<?php echo base_url();?>plugins/highchart/highcharts.js"></script>
<script src="<?php echo base_url();?>plugins/highchart/exporting.js"></script>
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

.form-group{
      margin-top: 10px;
}
</style>

<section id="main">
    <div class="breadcrumb-wrapper">
        <div class="pattern-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                        <h2 class="title">My Statistics</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="content margin-top60 margin-bottom60">
        <div class="container">
            <div class="row">
                <!-- Left Section -->
                    <div class="col-sm-9 col-md-9 col-lg-9">
                    <div class="title-box">
                        
                        <div style="float:right;"><input type="button" id="btn_add_business" name="btn_add_business" class="btn" value="Add Social Links" style="background:#59ab02;color:#ffffff;"></div>
                              <table class="table " id="business_table">
                                  <tr>
                                      <th>Social Site</th><th>URL</th><th>Action</th>
                                  </tr>                                 
                                  <?php 
                                  $i=1;
                                  foreach($media_details as $val){?>
                                       <tr>
                                            <td><?php echo $val['txt_title'];?></td>
                                            <td><?php echo $val['txt_url'];?></td>
                                            <td><a href="javascript:void(0);" id="a-bus-delete-<?php echo $val['int_unique_id'];?>" class="a-bus-delete" >Delete</a></td>
                                        </tr>
                                  <?php } ?>                                  
                              </table>

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
                                <li>
                                    <a href="<?php echo site_url();?>/artist/accountPortfolio"><i class="fa fa-pencil-square-o item-icon"></i> Portfolio</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url();?>/artist/accountStatistics"><i class="fa fa-bar-chart item-icon"></i> Statistics</a>
                                </li>
                                <li class="active">
                                    <a href="#" style="color:#fff"><i class="fa fa-link item-icon"></i> Social Availabilty</a>
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

<div class="modal" id="mymodel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="$('#mymodel').toggle();$('#fade').hide();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Socail Links</h4>
          </div>
          <div class="modal-body">        
              <div class="row">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputEmail3">Name</label>
                    <div class="col-sm-7">
                          <input type="text" id="txt_title" name="txt_title" value="" class="form-control">
                    </div>
                  </div>    
              </div>
              <div class="row">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputEmail3">Url</label>
                    <div class="col-sm-7">
                          <input type="text" id="txt_url" name="txt_url" value="" class="form-control">
                    </div>
                  </div>    
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="$('#mymodel').toggle();$('#fade').hide();">Close</button>
            <input type="button" value="Submit" id="btn_submit_business" class="btn btn-primary" >
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
    $(function () {
        $("#btn_add_business").click(function(){
            $("#mymodel").toggle();
            $("#fade").show();
        });
        $(document).on("click",".a-bus-delete",function(){
              var id=this.id.split("-");
              $("#fade").show();
              $("#preloader").show();   
              $.ajax({
                    url: '<?php echo site_url()."/artist/removeSocialLinks"?>',
                    type: "POST",
                    data:{id:id[3]},
                    success: function(result){
                        if(result=="success"){
                           $("#a-bus-delete-"+id[3]).parent().parent().remove(); 
                        }  
                        $("#fade").hide();
                        $("#preloader").hide();                                                   
                      }
                });   
            });
          $("#btn_submit_business").click(function(){
              var txt_title = $("#txt_title").val();
              var txt_url = $("#txt_url").val();
              if(txt_title!='' && txt_url!=''){
                $("#mymodel").toggle();
                $("#fade").show();
                $("#preloader").show();
                $.ajax({
                        url: '<?php echo site_url()."/artist/saveSocialLinks"?>',
                        type: "POST",
                        data:{txt_title:txt_title,txt_url:txt_url},
                        success: function(result){
                            $("#txt_title").val('');
                            $("#txt_url").val('');
                            if(result!=''){
                                var html='';
                                html+='<tr><td>'+txt_title+'</td><td>'+txt_url+'</td><td><a href="javascript:void(0);" id="a-bus-delete-'+result+'" class="a-bus-delete" >Delete</a></td></tr>';
                                $("#business_table").append(html);
                            }  
                            $("#fade").hide();
                            $("#preloader").hide();                                                   
                          }
                    });   
              }else{
                  alert("Fields cannot be left blank!");
              }
        });
    });
</script>