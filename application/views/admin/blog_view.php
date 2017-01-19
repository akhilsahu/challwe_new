<?php 

$fname=($blog['txt_fname'])?$blog['txt_fname']:"Admin";
$lname=($blog['txt_lname'])?$blog['txt_lname']:"";
$profile_img=($blog['txt_profile_image'])?$blog['txt_profile_image']:"uploads/no-image.png";
$date=date_create($blog['dt_created_on']);
?>
<div class="content-wrapper">      
     <section class="content">        
     <div class="row">
    	<div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class='box-header with-border'>
              <div class='user-block'>
                <img class='img-circle' src='<?php echo base_url().$profile_img;?>' alt='user image'>
                <span class='username'><a href="#"><?php echo $fname." ".$lname;?></a></span>
                <span class='description'><?php echo date_format($date,"M d, y");?></span>
              </div><!-- /.user-block -->
            </div><!-- /.box-header -->
            <?php if($blog['txt_media_url']){?>  
              <!-- Attachment -->
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="<?php echo base_url().$blog['txt_media_url']?>" alt="attachment image">
              </div><!-- /.attachment-block -->
              <?php } ?>
            <div class='box-body'>
              <!-- post text -->
              <?php echo $blog['txt_description'];?>
              <span class='pull-right text-muted'> <?php echo count($comments)?> comments</span>
            </div><!-- /.box-body -->
            <div class='box-footer box-comments'>

            <?php foreach($comments as $val){

              $c_fname=($val['txt_fname'])?$val['txt_fname']:"Admin";
              $c_lname=($val['txt_lname'])?$val['txt_lname']:"";
              $c_profile_img=($val['txt_profile_image'])?$val['txt_profile_image']:"uploads/no-image.png";
              $c_date=date_create($val['dt_created_on']);
              ?>
              <div class='box-comment'>
                <!-- User image -->
                <img class='img-circle img-sm' src='<?php echo base_url().$c_profile_img;?>' alt='user image'>
                <div class='comment-text'>
                  <span class="username">
                    <?php echo $c_fname." ".$c_lname?>
                    <span class='text-muted pull-right'><?php echo date_format($c_date,"M d, y");?></span>
                  </span><!-- /.username -->
                  <?php echo $val['txt_comment'];?>
                </div><!-- /.comment-text -->
              </div><!-- /.box-comment -->
            <?php } ?>  

            </div><!-- /.box-footer -->
            <div class="box-footer">
              <!-- <form action="#" method="post"> -->
                <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog['int_blog_id'];?>">
                <img class="img-responsive img-circle img-sm" src="<?php echo base_url();?>uploads/no-image.png" alt="alt text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input class="form-control input-sm" id="input-comment" type="text" placeholder="Type a comment">
                <input type="button" value="Save" id="btn-comment" class="btn-comment btn-primary" style="margin:5 0 10">
                </div>
              <!-- </form> -->
            </div><!-- /.box-footer -->
          </div><!-- /.box -->
        </div><!-- /.col -->
        </div>
    </section>
</div>

<script>
  $(document).ready(function(){
      $("#btn-comment").click(function(){
          id=$("#blog_id").val();
          var msg=$("#input-comment").val();
          if(msg!=''){
            $.ajax({
                    url: '<?php echo site_url()."/admin/addComment"?>',
                    type: "POST",
                    data:{int_blog_id:id,txt_message:msg},
                    success: function(result){
                        $("#input-comment").val('');
                        var html='';
                        if(result=="success"){  
                        html+="<div class='box-comment'>";
                        html+="<img class='img-circle img-sm' src='<?php echo base_url()?>uploads/no-image.png' alt='user image'>";
                        html+="<div class='comment-text'>";
                        html+="<span class='username'>You<span class='text-muted pull-right'>[ Just Now ]</span></span>"+msg+"</div>";
                        html+="</div>";
                        // alert(html);
                          $(".box-comments").append(html);  
                      }
                    }
                });   
          }
      });
  });
</script>