<style>
.form-group{
      margin-top: 10px;
}
</style>
<div class="content-wrapper">
<div class="row">
    <div class="col-md-10">
    <form method="post" action="<?php echo site_url();?>/admin/addDirectory"  enctype="multipart/form-data">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Skills</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            
                <div class="row">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputEmail3">Name</label>
                    <div class="col-sm-8">
                      <input type="text" placeholder="Name" id="txt_name" name="txt_field_name" value="" class="form-control">
                    </div>
                  </div>
                </div>   
                <div class="row">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputEmail3">Description</label>
                    <div class="col-sm-8">
                      <textarea placeholder="Description" id="txt_description" name="txt_description" value="" class="form-control"></textarea>
                    </div>
                  </div>
                </div>  
                <!-- <div class="row">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputEmail3">Cover Image</label>
                    <div class="col-sm-8">
                      <input type="file" name="cover_image" id="cover_image">
                    </div>
                  </div>
                </div>  -->
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button id="save_contact" class="btn btn-info pull-right" type="submit">Add</button>
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