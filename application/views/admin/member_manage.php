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
                      <th width="8%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach ($list as $val) {?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $val['txt_fname']." ".$val['txt_lname'];?></td>
                      <td><?php echo $val['txt_email'];?></td>
                      <td><?php echo $val['txt_cell_no'];?></td>
                      <td>
                        <a href="<?php echo site_url().'/admin/deleteMember/'.$val['int_user_id']?>" class="btn btn-primary">Delete</a>
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