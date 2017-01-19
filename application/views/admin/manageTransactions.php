		<style>.form-group{      margin-top: 10px;}</style>    <div class="content-wrapper"> 	   		 <section class="content">			<div class="row">					<div class="col-md-12">				  <div class="box box-solid">					<div class="box-header with-border">					  <h3 class="box-title">User Trasection History</h3>					</div><!-- /.box-header -->					<div class="box-body">					<form method="POST" action="<?php echo site_url()?>/admin/manageTransactions">						  <div class="box-group" id="accordion">						<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->						<div class="panel box box-primary">						  <div class="box-header with-border">							<h4 class="box-title">							  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">								Search							  </a>							</h4>						  </div>						  <div id="collapseOne" class="panel-collapse collapse in">							<div class="box-body">																<div class="row">									<div class="form-group">									  <label class="col-sm-3 control-label" for="inputEmail3">Member</label>									  <div class="col-sm-7">										<select id="int_user_id" name="int_user_id" class="form-control">											<option value="">-Select-</option>											<?php foreach($users as $val){?>												<option value="<?php echo $val['int_artist_id'];?>"><?php echo $val['txt_fname']." ".$val['txt_lname'];?></option>											<?php }?>										</select>									  </div>									</div>    								</div>								<div class="row">									<div class="form-group">									  <div class="col-sm-12">											<input type="submit" id="btn_submit" name="btn_submit" class="btn btn-primary" value="Save" >									  </div>									</div>    								</div>							</div>						  </div>						</div>						</div>					</form>					</div>					</div>				</div>			</div>		</section>	  
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
                      <th width="20%">Transection Id</th> 
                      <th width="20%">Email</th>
                      <th width="20%">Amount</th>					  <th width="20%">Date</th>
                      <th width="8%">Status</th>
                    </tr>
                    </thead>
                    <tbody>					<?php 					$i=1;					foreach($list as $val){?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $val['txn_id'];?></td>
                      <td><?php echo $val['payer_email'];?></td>
                      <td><?php echo $val['payment_gross']." ".$val['currency_code'];?></td>					  <td width="20%"><?php echo $val['dt_payment_date'];?></td>
                      <td>
                       <span class="btn "><?php echo $val['payment_status'];?></span>
                      </td>
                    </tr>					<?php }?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){			$("#int_user_id").select2();
      
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