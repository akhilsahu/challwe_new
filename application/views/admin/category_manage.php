<?php

$user=$this->session->userdata('user');

?>

      <div class="content-wrapper">      

         <section class="">         

            <div>

              <div class="box">

                <div class="box-header">                

                  <h3 class="box-title">Category</h3>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">

                  <table id="example1" class="table table-bordered table-hover">

                    <thead>

                    <tr>

                      <th width="10%"></th>

                      <th width="20%">Name</th>

                      <th width="20%">File Name</th>

                      <th width="20%">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php 

                    $i=1;

                    $statusClass=array("bg-red","bg-blue");

                    foreach ($list as $val) {?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $val['txt_name'];?></td>
                      <td><img src="<?php echo base_url()."".$val['txt_filepath'];?>" alt="Smiley face" height="42" width="42"></td>                      
                        <td>
                          <a href="<?php echo site_url().'/admin/editcategory/'.$val['int_category_id']?>" class="btn btn-primary">Edit</a>
                          <a href="<?php echo site_url().'/admin/deletedcategory/'.$val['int_category_id']?>" class="btn btn-danger">Delete</a>
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