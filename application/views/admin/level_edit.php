<style>

.form-group{

      margin-top: 10px;

}

</style>

<div class="content-wrapper">

<div class="row">

    <div class="col-md-8">

      <div class="box box-info">

                <div class="box-header with-border">

                  <h3 class="box-title">Edit Level</h3>

                </div><!-- /.box-header -->

                <!-- form start -->

                <form method="post" action="<?php echo site_url();?>/admin/editlevel" enctype="multipart/form-data">

                    <div class="row">

                      <div class="form-group">

                        <label class="col-sm-4 control-label" for="inputEmail3">Title</label>

                        <div class="col-sm-8">

                        <input type="hidden" name="int_level_id" id="int_level_id" value="<?php echo $field_detail['int_level_id']?>">

                          <input type="text" placeholder="Title" id="txt_name" name="txt_field_name" value="<?php echo $field_detail['txt_title']?>" class="form-control">

                        </div>

                      </div>

                    </div> 

                     <div class="row">

                      <div class="form-group">

                        <label class="col-sm-4 control-label" for="inputEmail3">Challwecoins Min</label>

                        <div class="col-sm-8">

                          <input type="text" placeholder="Challwecoins" id="txt_challwecoins_min" name="txt_challwecoins_min"  value="<?php echo $field_detail['txt_challwecoins_min']?>" class="form-control">

                        </div>

                      </div>

                    </div> 
                    

                      <div class="row">

                      <div class="form-group">

                        <label class="col-sm-4 control-label" for="inputEmail3">Challwecoins Max</label>

                        <div class="col-sm-8">

                          <input type="text" placeholder="Challwecoins Max" id="txt_challwecoins_max" name="txt_challwecoins_max"  value="<?php echo $field_detail['txt_challwecoins_max']?>" class="form-control">

                        </div>

                      </div>

                    </div>  

                     <!--  <div class="row">

                      <div class="form-group">

                        <label class="col-sm-4 control-label" for="inputEmail3">File Name</label>

                        <div class="col-sm-8">

                          <input type="text" placeholder="File Name" id="txt_filename" name="txt_filename"  value="<?php echo $field_detail['txt_filename']?>" class="form-control">

                        </div>

                      </div>

                    </div>    -->

                     <div class="row">

                  <div class="form-group">

                    <label class="col-sm-4 control-label" for="inputEmail3">Cover Image</label>

                    <div class="col-sm-8">

                      <input type="file" name="file_image" id="file_image">

                      <?php if($field_detail['txt_filename']){?><span><img src="<?php echo base_url().$field_detail['txt_filename']?>" style="width:200px;"></span><?php }?>

                    </div>

                  </div>

                </div> 

                    

              

                <div class="row">

                  <div class="form-group">

                    <div class="col-sm-12">

                      <button id="save_contact" class="btn btn-info pull-right" type="submit">Edit</button>

                    </div>

                  </div>

                </div>                                                          

                  </div><!-- /.box-body -->

          

                </form>

              </div>

          </div>

      </div>

</div>

<script>

$(document).ready(function(){





  $("#save_contact").click(function(){

    if($("#txt_name").val()=="")

    {

      alert("Please enter Name");

      $("#contact_name").focus();

      return false;

    }

  });

});

</script>