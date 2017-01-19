<?php
$user=$this->session->userdata('user');
?>
      <div class="content-wrapper">      
         <section class="">         
            <div>
              <div class="box">
                <div class="box-header">                
                  <h3 class="box-title">Blog</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th width="20%">Title</th>
                      <th width="55%">Content</th>
                      <th width="10%">Status</th>
                      <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    $statusClass=array("bg-red","bg-blue");
                    foreach ($list as $val) {?>
                    <tr>
                      <td><?php echo $val['txt_title'];?></td>
                      <td><?php echo substr($val['txt_description'],0,250);?>...<a href="<?php echo site_url().'/admin/viewBlog/'.$val['int_blog_id']?>">Read More</a></td>
                      <td>
                            <select class="form-control txt_status <?php echo $statusClass[$val['int_is_publish']]?>" id="status_<?php echo $val['int_blog_id']?>">
                                <option value="0" <?php echo ($val['int_is_publish']==0)?"Selected":"";?>>Unpublish</option>
                                <option value="1" <?php echo ($val['int_is_publish']==1)?"Selected":"";?>>Publish</option>
                            </select>
                        </td> 
                        <td>
                          <a href="<?php echo site_url().'/admin/editBlog/'.$val['int_blog_id']?>" class="btn btn-primary">Edit</a>
                          <a href="<?php echo site_url().'/admin/deleteBLog/'.$val['int_blog_id']?>" class="btn btn-danger">Delete</a>
                      </td>                      
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

<style>
.datepicker{
  z-index:9999 !important;
}
</style>
          
<script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
      $(".txt_status").change(function(){
          var idname=this.id;
          id=idname.split("_");
          var int_status=$(this).val();
          $.ajax({
              url: '<?php echo site_url()."/admin/changeBlogStatus"?>',
              type: "POST",
              data:{int_blog_id:id[1],int_status:int_status},
              success: function(result){
                if(result=="Success"){
                    $("#"+idname).removeClass("bg-blue bg-red ");
                    if(int_status==1) $("#"+idname).addClass("bg-blue");
                    if(int_status==0) $("#"+idname).addClass("bg-red");
                    alert("Status Updated");  
                }                
              }
          });
      });

      $('#example1').DataTable({
          // "paging": true,
          // "lengthChange": false,
          // "searching": false,
          // "ordering": true,
          // "info": true,
          // "autoWidth": false
        });
  });
  </script>


        </section> 
      </div>
