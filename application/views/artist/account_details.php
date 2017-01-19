<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

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



.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {

    border: 1px solid rgba(89, 171, 2, 0.75);;

    background: rgba(89, 171, 2, 0.75);

    color: #ffffff;

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

                        <h2 class="title">Account Details</h2>

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
                <?php 
                  


                ?>

                <div class="col-sm-9 col-md-9 col-lg-9">

                    <div class="title-box">

                      <form method="POST" action="<?php echo site_url()?>/artist/updateArtistdetails" enctype="multipart/form-data" >  
                      <input type="hidden" id="hid_int_artist_id" name="hid_int_artist_id" value="<?php echo $user_details['int_artist_id']; ?>" />

                        <div id="tabs">

                          <ul>

                            <li><a href="#tabs-1">Basic Details</a></li>

                            <li><a href="#tabs-2">Professional Details</a></li>

                            <li><a href="#tabs-3">Business Information</a></li>

                          </ul>

                          <div id="tabs-1">

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

                        <?php /*        <div class="row">

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="inputEmail3">State</label>

                                        <div class="col-sm-7">

                                            <select name="int_state_id" placeholder="State" class="form-last-name form-control require" id="int_state_id">

                                                <option value="0">-Select-</option>

                                               <?php foreach ($states as $state) {  ?>

                                                <option value="<?php echo $state['id'] ?>" <?php echo ($user_details['int_state_id']==$state['id'])?"selected":"";?> ><?php echo $state['name'] ?></option>

                                               <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="inputEmail3">City</label>

                                        <div class="col-sm-7">

                                            <select type="text" name="int_city_id" class="form-last-name form-control require" id="int_city_id">

                                               <option value="0">-Select-</option>

                                               <?php foreach ($cities as $city) {  ?>

                                                <option value="<?php echo $city['id'] ?>" <?php echo ($user_details['int_city_id']==$city['id'])?"selected":"";?> ><?php echo $city['name'] ?></option>

                                               <?php } ?> 

                                            </select>

                                        </div>

                                    </div>

                                </div>
																                                
								<div class="row">

                                    <div class="form-group">

                                      <label class="col-sm-3 control-label" for="inputEmail3">Office Phone No.</label>

                                      <div class="col-sm-7">

                                        <input type="text" placeholder="Phone No" id="txt_office_no" name="txt_office_no" value="<?php echo $user_details['txt_office_no']?>" class="form-control">

                                      </div>

                                    </div>    

                                </div>
								*/ ?>
								
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

                                      <label class="col-sm-3 control-label" for="inputEmail3">Office Address</label>

                                      <div class="col-sm-7">

                                        <textarea placeholder="Office Address" id="txt_office_address" name="txt_office_address" class="form-control"><?php echo $user_details['txt_office_address']?></textarea>
										<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_office_address'])?"checked":"";?> name="int_office_address" id="int_office_address" ></span>	
                                      </div>

                                    </div>    

                                </div>
								
                                

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

                                <input type="submit" name="btn_submit" id="btn_submit" value="Save" class="btn" style="background:#59ab02;color:#ffffff;">

                          </div>

                          <div id="tabs-2">

                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Skills (Max.5)</label>

                                          <div class="col-sm-7">

                                            <select id="int_directory_id" name="int_directory_id[]"  multiple >

                                              <option>-Select-</option>

                                            <?php 
											 $skill_arr = array($user_details['int_skill1'],$user_details['int_skill2'],$user_details['int_skill3'],$user_details['int_skill4'],$user_details['int_skill5']);
											 foreach($directory as $val){?>

                                       
                                             <option value="<?php echo $val['int_field_id']?>" <?php echo in_array($val['int_field_id'],$skill_arr)?"selected":"";?>><?php echo $val['txt_field_name']?></option>


                                            <?php } ?>
                                            <!-- <option value="<?php //echo $val['int_field_id']?>" <?php //echo ($user_details['int_directory_id']==$val['int_field_id'])?"selected":"";?>><?php //echo $val['txt_field_name']?></option> -->



                                            </select>
											<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_skills'])?"checked":"";?> name="int_skills" id="int_skills" ></span>	
                                          </div>

                                        </div>    

                                    </div>

                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Experience (Year)</label>

                                          <div class="col-sm-7">

                                            <input type="text" placeholder="Experience" id="txt_experience" name="txt_experience" value="<?php echo $user_details['txt_experience']?>" class="form-control">
											<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_experience'])?"checked":"";?> name="int_experience" id="int_experience" ></span>
                                          </div>

                                        </div>    

                                    </div>

                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Description</label>

                                          <div class="col-sm-7">

                                                <textarea placeholder="Description" id="txt_description" name="txt_description" class="form-control"><?php echo $user_details['txt_description']?></textarea>

                                          </div>

                                        </div>    

                                    </div>

                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Tagline</label>

                                          <div class="col-sm-7">

                                                <input type="text" placeholder="Tagline" id="txt_tagline" name="txt_tagline" value="<?php echo $user_details['txt_tagline']?>" class="form-control">
												<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_tag_line'])?"checked":"";?> name="int_tag_line" id="int_tag_line" ></span>
                                          </div>

                                        </div>    

                                    </div>                              

                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Hourly Charges</label>

                                          <div class="col-sm-7">

                                                <input type="text" id="txt_hourly_charge" name="txt_hourly_charge" value="<?php echo $user_details['txt_hourly_charge']?>" class="form-control">
												<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_hourly_charge'])?"checked":"";?> name="int_hourly_charge" id="int_hourly_charge" ></span>
                                          </div>

                                        </div>    

                                    </div>

                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Roles</label>

                                          <div class="col-sm-7">

                                                <input type="text" id="txt_fashion_community_roles" name="txt_fashion_community_roles" value="<?php echo $user_details['txt_fashion_community_roles']?>" class="form-control">
												<span class="cl-show-field"><input type="checkbox" value="1" <?php echo ($display_details['int_roles'])?"checked":"";?> name="int_roles" id="int_roles" ></span>
                                          </div>

                                        </div>    

                                    </div>
                                    
                                    <div class="row">

                                        <div class="form-group">

                                          <label class="col-sm-3 control-label" for="inputEmail3">Cover Image</label>

                                          <div class="col-sm-7">

                                                <input type="file" id="cover_image" name="cover_image" class="form-control">

                                          </div>

                                        </div>    

                                    </div>

                                    <input type="submit" name="btn_submit" id="btn_submit" value="Save" class="btn" style="background:#59ab02;color:#ffffff;">

                          </div>

                          <div id="tabs-3">



                              <div style="float:right;"><input type="button" id="btn_add_business" name="btn_add_business" class="btn" value="Add Business" style="background:#59ab02;color:#ffffff;"></div>

                              <table class="table " id="business_table">

                                  <tr>

                                      <th>Name</th><th>Description</th><th>Reg. Date</th><th>Reg City</th><th>Website URL</th><th>Action</th>

                                  </tr>                                 

                                  <?php 

                                  $i=1;

                                  foreach($business_details as $val){?>

                                       <tr><td><?php echo $val['txt_name'];?></td><td><?php echo $val['txt_description'];?></td><td><?php echo $val['int_registered_year'];?></td><td><?php echo $val['reg_city'];?></td><td><?php echo $val['txt_website'];?></td><td><a href="javascript:void(0);" id="a-bus-delete-<?php echo $val['int_business_id'];?>" class="a-bus-delete" >Delete</a></td></tr>

                                  <?php } ?>                                  

                              </table>

                          </div>

                        </div>

                      </form>  



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

                                <li class="active">

                                    <a href="#" style="color:#fff"><i class="fa fa-user item-icon"></i> Account Details</a>

                                </li>

                                <li>

                                    <a href="<?php echo site_url();?>/artist/accountPortfolio"><i class="fa fa-pencil-square-o item-icon"></i> Portfolio</a>

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



    <div class="modal" id="mymodel">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="$('#mymodel').toggle();" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h4 class="modal-title">Add Business Details</h4>

          </div>

          <div class="modal-body">        

              <div class="row">

                  <div class="form-group">

                    <label class="col-sm-3 control-label" for="inputEmail3">Name</label>

                    <div class="col-sm-7">

                          <input type="text" id="b_txt_name" name="b_txt_name" value="" class="form-control">

                    </div>

                  </div>    

              </div>

              <div class="row">

                  <div class="form-group">

                    <label class="col-sm-3 control-label" for="inputEmail3">Description</label>

                    <div class="col-sm-7">

                          <input type="text" id="b_txt_description" name="b_txt_description" value="" class="form-control">

                    </div>

                  </div>    

              </div>

              <div class="row">

                  <div class="form-group">

                    <label class="col-sm-3 control-label" for="inputEmail3">Registration City</label>

                    <div class="col-sm-7">

                          <select type="text" name="b_txt_reg_city" class="form-last-name form-control require" id="b_txt_reg_city">

                             <option value="0">-Select-</option>

                             <?php foreach ($cities as $city) {  ?>

                              <option value="<?php echo $city['id'] ?>" ><?php echo $city['name'] ?></option>

                             <?php } ?> 

                          </select>

                    </div>

                  </div>    

              </div>

              <div class="row">

                  <div class="form-group">

                    <label class="col-sm-3 control-label" for="inputEmail3">Registration Year</label>

                    <div class="col-sm-7">

                          <input type="text" id="b_txt_registered_year" name="b_txt_registered_year" value="" class="form-control">

                    </div>

                  </div>    

              </div>

              <div class="row">

                  <div class="form-group">

                    <label class="col-sm-3 control-label" for="inputEmail3">Website</label>

                    <div class="col-sm-7">

                          <input type="text" id="b_txt_website" name="b_txt_website" value="" class="form-control">

                    </div>

                  </div>    

              </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="$('#mymodel').toggle();">Close</button>

            <input type="button" value="Submit" id="btn_submit_business" class="btn btn-primary" >

          </div>

          </form>

        </div><!-- /.modal-content -->

      </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->



</section>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<script>

  var cityoptions='';

  

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

        $(document).on("click",".a-bus-delete",function(){

              var id=this.id.split("-");

              $("#fade").show();

              $("#preloader").show();   

              $.ajax({

                    url: '<?php echo site_url()."/artist/removeBusinessDetails"?>',

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

          $("#btn_submit_business").click(function(){

              var txt_name = $("#b_txt_name").val();

              var txt_description = $("#b_txt_description").val();

              var txt_reg_city = $("#b_txt_reg_city").val();

              var txt_reg_city_name = $("#b_txt_reg_city option:selected").text();

              var txt_registered_year = $("#b_txt_registered_year").val();

              var txt_website = $("#b_txt_website").val();

              if(txt_name!=''){

                $("#mymodel").toggle();

                $("#fade").show();

                $("#preloader").show();

                $.ajax({

                        url: '<?php echo site_url()."/artist/saveBusinessDetails"?>',

                        type: "POST",

                        data:{txt_name:txt_name,txt_description:txt_description,txt_reg_city:txt_reg_city,txt_registered_year:txt_registered_year,txt_website:txt_website},

                        success: function(result){

                            $("#b_txt_name").val('');

                            $("#b_txt_description").val('');

                            $("#b_txt_reg_city").val('');

                            $("#b_txt_registered_year").val('');

                            $("#b_txt_website").val('');  

                            if(result!=''){

                                var html='';

                                html+='<tr><td>'+txt_name+'</td><td>'+txt_description+'</td><td>'+txt_registered_year+'</td><td>'+txt_reg_city_name+'</td><td>'+txt_website+'</td><td><a href="javascript:void(0);" id="a-bus-delete-'+result+'" class="a-bus-delete" >Delete</a></td></tr>';

                                $("#business_table").append(html);

                            }  

                            $("#fade").hide();

                            $("#preloader").hide();                                                   

                          }

                    });   

              }else{

                  alert("Business Name cannot be left blank!");

              }

        });

        });

        $("#btn_add_business").click(function(){

            $("#mymodel").toggle();

        });

        $( "#tabs" ).tabs();

        $("#span-plus").click(function(){

            var html='<tr><td><input type="file" name="image_file[]" ></td>';

            html+='<td><span class="span-minus"><img class="removeBusiness" src="<?php echo base_url()?>/uploads/minus.png"></td></tr>';

            $("#image-table").append(html); 

            $(".span-minus").bind('click',function(){

                $(this).parent().parent().remove();

            });

        });  

        $("#addBusiness").click(function(){

            var html='<div class="row"><div class="form-group"><div class="col-sm-2"><label class="control-label" for="inputEmail3">Name</label><input type="text" class="b_txt_name" name="b_txt_name[]" class="form-control"></div><div class="col-sm-2"><label class="control-label" for="inputEmail3">Description</label><textarea class="b_txt_description" name="b_txt_description[]" class="form-control"></textarea></div><div class="col-sm-2"><label class="control-label" for="inputEmail3">Registration City</label><select class="b_txt_reg_city" name="b_txt_reg_city[]" class="form-control" style="width:150px">'+cityoptions+'</select></div><div class="col-sm-2"><label class="control-label" for="inputEmail3">Registration Year</label><input type="text" class="b_int_registered_year" name="b_int_registered_year[]" class="form-control"></div><div class="col-sm-2"><label class="control-label" for="inputEmail3">Website</label><input type="text" class="b_txt_website" name="b_txt_website[]" class="form-control"></div><div class="col-sm-2"><span><img class="removeBusiness" src="<?php echo base_url()?>/uploads/minus.png"></span></div></div></div>';           

            $("#div-business").append(html);    

        });

        $(document).on("click",".removeBusiness",function(){

            $(this).parent().parent().parent().parent().remove();

        });

        //$('#int_country_id').change(function(){

          //  var country=$('#int_country_id').val();

            //getState(country,'int_state_id');

        //});

        $('#int_state_id').change(function(){

            var state=$('#int_state_id').val();

            getCity(state,'int_city_id');

        });     

        $("#imgInp").change(function(){

            readURL(this);

        });

     });

    

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



    function getState(country,tagId){

        $.ajax({

            url:"<?php echo site_url()?>/location/get_states",

            data:{'cunt_id':country},

            type:"POST",

            dataType:"json",

            success: function(result) {

                $('#'+tagId).html(result.html);

            }

        });

        }

    function getCity(state,tagId){

        $.ajax({

            url:"<?php echo site_url()?>/location/get_city",

            data:{'state_id':state},

            type:"POST",

            dataType:"json",

            success: function(result) {                

            $('#'+tagId).html(result.html);

            cityoptions=result.html;

            $("#b_txt_reg_city").html(cityoptions);

          }

        });

    }

</script>