<style>
.form-group{
      margin-top: 10px;
}
</style>
<div class="content-wrapper">      
     <section class="content">
     	<div class="row">	
     		<div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Member</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form method="POST" action="<?php echo site_url()?>/admin/addArtist" enctype="multipart/form-data">	
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Basic Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">                          	
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Email</label>
			                      <div class="col-sm-7">
			                        <input type="text" placeholder="Email" id="txt_email" name="txt_email" value="" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Password</label>
			                      <div class="col-sm-7">
			                        <input type="password" placeholder="Password" id="txt_password" name="txt_password" value="" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">First Name</label>
			                      <div class="col-sm-7">
			                        <input type="text" placeholder="First Name" id="txt_fname" name="txt_fname" value="" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Last Name</label>
			                      <div class="col-sm-7">
			                        <input type="text" placeholder="Last Name" id="txt_lname" name="txt_lname" value="" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Date oF Birth</label>
			                      <div class="col-sm-7">
			                        <input type="text" placeholder="DOB" id="dt_dob" name="dt_dob" value="" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Cell No.</label>
			                      <div class="col-sm-7">
			                        <input type="text" placeholder="Cell No" id="txt_cell_no" name="txt_cell_no" value="" class="form-control">
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
                                            <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
			                      	<label class="col-sm-3 control-label" for="inputEmail3">State</label>
                                    <div class="col-sm-7">
                                        <select name="int_state_id" placeholder="State" class="form-last-name form-control require" id="int_state_id">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
			                      	<label class="col-sm-3 control-label" for="inputEmail3">City</label>
                                    <div class="col-sm-7">
                                        <select type="text" name="int_city_id" class="form-last-name form-control require" id="int_city_id">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Office Address</label>
			                      <div class="col-sm-7">
			                        <textarea placeholder="Office Address" id="txt_office_address" name="txt_office_address"class="form-control"></textarea>
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Office Phone No.</label>
			                      <div class="col-sm-7">
			                        <input type="text" placeholder="Phone No" id="txt_office_no" name="txt_office_no" value="" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Profile Image.</label>
			                      <div class="col-sm-7">
			                        <input type="file" id="imgInp" name="profile_img" value="" class="form-control">
			                        <span id="span_img_preview" style="display:none;">
			                        	<img src="" id="img_preview">
			                        </span>
			                      </div>
			                    </div>    
                          	</div>
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Professional Details 
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body">
                          <div class="row">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label" for="inputEmail3">Skills</label>
                                  <div class="col-sm-7">
                                    <select id="int_directory_id" name="int_directory_id" class="form-control">
                                        <option value="">-Select-</option>
                                        <?php foreach($directory as $val){?>
                                        <option value="<?php echo $val['int_field_id']?>"><?php echo $val['txt_field_name']?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
                              </div>
                          </div>
                        	<div class="row">
                          		<div class="form-group">
    			                      <label class="col-sm-3 control-label" for="inputEmail3">Experience (Year)</label>
    			                      <div class="col-sm-7">
    			                        <input type="text" placeholder="Experience" id="txt_experience" name="txt_experience" value="" class="form-control">
    			                      </div>
    			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Description</label>
			                      <div class="col-sm-7">
			                       		<textarea placeholder="Phone No" id="txt_description" name="txt_description" class="form-control"></textarea>
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Tagline</label>
			                      <div class="col-sm-7">
			                       		<input type="text" placeholder="Tagline" id="txt_tagline" name="txt_tagline" class="form-control">
			                      </div>
			                    </div>    
                          	</div>                          	
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Hourly Charges</label>
			                      <div class="col-sm-7">
			                       		<input type="text" id="txt_hourly_charge" name="txt_hourly_charge" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Roles</label>
			                      <div class="col-sm-7">
			                       		<input type="text" id="txt_fashion_community_roles" name="txt_fashion_community_roles" class="form-control">
			                      </div>
			                    </div>    
                          	</div>
                          	<div class="row">
                          		<div class="form-group">
			                      <label class="col-sm-3 control-label" for="inputEmail3">Biographic Information</label>
			                      <div class="col-sm-7">
			                       		<input type="text" id="txt_biographic_info" name="txt_biographic_info" class="form-control">
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
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Business Information
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body" id="div-business">
                            <div class="row">
                          		<div class="form-group">				                      
			                      <div class="col-sm-2">
			                      		<label class="control-label" for="inputEmail3">Name</label>
			                       		<input type="text" class="b_txt_name" name="b_txt_name[]" class="form-control">
			                      </div>
			                      <div class="col-sm-2">
			                      		<label class="control-label" for="inputEmail3">Description</label>
			                       		<textarea class="b_txt_description" name="b_txt_description[]" class="form-control"></textarea>
			                      </div>
			                      <div class="col-sm-2">
			                      		<label class="control-label" for="inputEmail3">Registration City</label>
			                       		<select id="b_txt_reg_city_1" class="b_txt_reg_city" name="b_txt_reg_city[]" style="width:150px;" class="form-control">
			                       		</select>
			                      </div>
			                      <div class="col-sm-2">
			                      		<label class="control-label" for="inputEmail3">Registration Year</label>
			                       		<input type="text" class="b_int_registered_year" name="b_int_registered_year[]" class="form-control">
			                      </div>
			                      <div class="col-sm-2">
			                      		<label class="control-label" for="inputEmail3">Website</label>
			                       		<input type="text" class="b_txt_website" name="b_txt_website[]" class="form-control">
			                      </div>
			                      <div class="col-sm-2">
			                      		<span><img id="addBusiness" src="<?php echo base_url()?>/uploads/plus.png"></span>
			                      </div>
			                    </div>    
                          	</div>                          	
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Portfolio
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="box-body">
                    		<table id="image-table" class="table">
			                      <tr id="image-tr-1">
			                          <td><input type="file" id="video_file_1" name="image_file[]" ></td>
			                          <td><span id="span-plus"><img src="<?php echo base_url()?>/uploads/plus.png"></td>
			                      </tr>
		                    </table>	
                        </div>
                      </div>
                    </div>
                  </div>
                  	<div class="row">
	              		<div class="form-group">
	                      <div class="col-sm-12">
	                       		<input type="submit" id="btn_submit" name="btn_submit" class="btn btn-primary" value="Save" >
	                      </div>
	                    </div>    
	              	</div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </div>    
     </section>
</div>

<script>
var cityoptions='';
	 $(document).ready(function(){
    $("#dt_dob").datepicker();
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
		$('#int_country_id').change(function(){
            var country=$('#int_country_id').val();
            getState(country,'int_state_id');
        });
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
 	        $("#b_txt_reg_city_1").html(cityoptions);
          }
        });
    }
</script>