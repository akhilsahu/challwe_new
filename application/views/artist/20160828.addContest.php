<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Add Contest</h2>
		</div>

	</div>
</div>

<?php if($user['logged_in']){?>
	<span style="float:right;padding-right:5%;">
		<a href="<?php echo site_url();?>/artist/myContest" class=" button">My Contest</a>
	</span>
<?php }?>

<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
	<form method="POST" action="<?php echo site_url()."/artist/addContest";?>" enctype="multipart/form-data">
		<div class="submit-page">

			<!-- Title -->
			<div class="form">
				<h5>Title</h5>
				<input class="search-field" type="text" name="txt_contest_name" placeholder="" value=""/>
			</div>
			
			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea class="WYSIWYG" name="txt_description" id="txt_description" cols="35" rows="3" id="summary" spellcheck="true"></textarea>
			</div>

			<!-- Location -->
			<div class="form">
				<h5>Skills <span>(5 skills max)</span></h5>
				<select class="" id="int_skills" name="int_skills[]" multiple>
					<option value="">-Select-</option>
				<?php foreach($skills as $val){?>
						<option value="<?php echo $val['int_field_id'];?>"><?php echo $val['txt_field_name'];?></option>	
				<?php }?>
				</select>
			</div>

			<!-- Job Type -->
			<div class="form">
				<h5>Price <span id="span-price"></span></h5>
				<div id="slider"></div>
				<input type="hidden" name="txt_budget" id="txt_budget">
			</div> 
			
			<div class="form">
				<h5>Start Date</h5>
				<input data-role="date" type="text" name="dt_start_date" id="dt_start_date" placeholder="Start Date">
			</div>			
			
			<div class="form">
				<h5>End Date</h5>
				<input data-role="date" type="text" name="dt_end_date" id="dt_end_date" placeholder="End Date">
			</div>			


			<!-- Logo -->
			<div class="form">
				<h5>Attachments <span>(optional)</span></h5>
				<label class="upload-btn">
				    <input type="file" multiple name="image_file[]" id="image_file" />
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>
			</div>


			<div class="divider margin-top-0"></div>
			<button type="submit" class="button big margin-top-5">Create <i class="fa fa-arrow-circle-right"></i></button>


		</div>
		</form>
	</div>

</div>
<!-- WYSIWYG Editor -->
<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace( 'txt_description' );
</script>
<script>
	$(document).ready(function(){
		$("#int_skills").select2();
		$("#dt_start_date").datepicker();
		$("#dt_end_date").datepicker();
		$( "#slider" ).slider({
		  value:50,
		  max:99999,
		  min:10,
		  stop: function( event, ui ) {
			  val=$( "#slider" ).slider( "value");
			  $( "#span-price" ).html( "$" + val );			
			  $("#txt_budget").val(val);	
		  }
		});			
		$( "#span-price" ).html( "$ 50" );
		$("#txt_budget").val(50);
	});
</script>
