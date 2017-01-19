      <div class="content-wrapper">      
         <section class="content">
            
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">Frames in Template</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th width="3%">SNo.</th>
                      <th width="20%">Name</th> 
                      <th width="20%">Email</th>
                      <th width="20%">Phone</th>
                      <th width="10%">Status</th>
                      <th width="8%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    $statusClass=array("bg-blue","bg-red");
                    foreach ($list as $val) {?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $val['txt_fname']." ".$val['txt_lname'];?></td>
                      <td><?php echo $val['txt_email'];?></td>
                      <td><?php echo $val['txt_cell_no'];?></td>
                      <td>
                          <select class="form-control txt_status <?php echo $statusClass[$val['int_is_blocked']]?>" id="status_<?php echo $val['int_artist_id']?>">
                                <option value="0" <?php echo ($val['int_is_blocked']==0)?"Selected":"";?>>Active</option>
                                <option value="1" <?php echo ($val['int_is_blocked']==1)?"Selected":"";?>>Blocked</option>                                
                          </select>
                      </td>
                      <td>
                        <a href="<?php echo site_url().'/admin/deleteArtist/'.$val['int_artist_id']?>" class="btn btn-primary">Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                  <
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

          
<script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
      $(".txt_status").change(function(){
          var idname=this.id;
          id=idname.split("_");
          var int_status=$(this).val();
          $.ajax({
              url: '<?php echo site_url()."/admin/blockArtist"?>',
              type: "POST",
              data:{int_artist_id:id[1],int_status:int_status},
              success: function(result){
                if(result=="Success"){
                    $("#"+idname).removeClass("bg-blue bg-red ");
                    if(int_status==0) $("#"+idname).addClass("bg-blue");
                    if(int_status==1) $("#"+idname).addClass("bg-red");
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