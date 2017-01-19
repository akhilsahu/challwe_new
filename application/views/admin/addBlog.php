
 
<div class="content-wrapper">
<div class="row">
    <div class="col-md-12">
      <form method="post" action="<?php echo site_url();?>/admin/addBlog" enctype="multipart/form-data">
      <div class="box box-info">      		
                <div class="box-header with-border">
                  <h3 class="box-title">Add Blog</h3>
                </div><!-- /.box-header -->
                <!-- form start -->     
                	<div class="row">           
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="inputEmail3">Title</label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="Name" id="txt_title" name="txt_title" value="" class="form-control">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="inputEmail3">Cover Image</label>
                      <div class="col-sm-10">
                        <input type="file" id="cover_image" name="cover_image" value="" class="form-control">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="inputEmail3">Publish</label>
                      <div class="col-sm-10">
                        <input type="checkbox" id="int_is_publish" name="int_is_publish" value="1" checked>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <label class="col-sm-1 control-label" for="inputEmail3">Body</label>
                      <div class="col-sm-11">
                        <textarea id="editor1" name="txt_description" rows="10" cols="80"></textarea>
                      </div>
                    </div>           
                    </div>                                                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="save_contact" class="btn btn-info pull-right" type="submit">Save</button>
                  </div><!-- /.box-footer -->
            </form>
              </div>
          </div>
      </div>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
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