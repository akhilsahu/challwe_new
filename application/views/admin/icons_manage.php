<?php

$user=$this->session->userdata('user');

?>

      <div class="content-wrapper">      

         <section class="">         

            <div>

              <div class="box">

                <div class="box-header">                

                  <h3 class="box-title">Icons</h3>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">

                  <table id="example1" class="table table-bordered table-hover">

                    <thead>

                    <tr>

                      <th width="10%"></th>
                      <th width="20%">Name</th>
					  <th width="20%">Code</th>
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
                      <td><?php echo $val['txt_title'];?></td>
                      <td><?php echo $val['txt_code'];?></td>
                      <td><?php if($val['txt_filepath']){?><img src="<?php echo base_url()."".$val['txt_filepath'];?>" alt="Smiley face" height="42" width="42"><?php }?></td>                      
                        <td>
                          <a href='javascript:void()' data-toggle="modal" data-target="#login" onclick="fileupload(<?php echo $val['int_unique_id']?>,'<?php echo $val['txt_filepath']?>');" class="btn btn-primary">Edit</a>
                      </td>                      
                    </tr>
                    <?php }?>

                    </tbody>

                  </table>

                  

                </div><!-- /.box-body -->

              </div><!-- /.box -->

            </div>

	<div id="login" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<form method="POST" action="<?php echo site_url()."/admin/manageIcons";?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Change Icon</h4>
				</div>
				<div class="modal-body">
					<div class="cell-xs-12">
						<div class="form-group">
							<img src="" alt="No Image" id="filesrc" style="width:100px;height:auto;">	
						</div>
					</div>
					<div class="cell-xs-12">
						<div class="form-group">
							<input type="hidden" name="int_unique_id" id="int_unique_id" >	
							<label for="contact-email" class="form-label-outside">Upload</label>
							<input type="file" name="file_image" id="file_image" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success"  value="Upload">
				</div>
			</div>
			</form>
		</div>
	</div>

<style>

.datepicker{

  z-index:9999 !important;

}

</style>

          

<script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>

	function fileupload(id,filepath){
		$("#int_unique_id").val(id);
		var filepath='<?php echo base_url();?>'+filepath;
		$("#filesrc").attr("src",filepath);
	}

  $(document).ready(function(){

      $(".txt_status").change(function(){

          var idname=this.id;

          id=idname.split("_");

          var int_status=$(this).val();

          $.ajax({

              url: '<?php echo site_url()."/admin/changeDirectoryStatus"?>',

              type: "POST",

              data:{int_field_id:id[1],int_status:int_status},

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