<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
  <div class="container">

    <div class="sixteen columns">
      <!-- <h2>Login</h2>       -->
    </div>

  </div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

  <div class="my-account">

    <ul class="tabs-nav">
      <li class=""><a href="#tab1">Login</a></li>
      <li><a href="#tab2">Register</a></li>
    </ul>

    <div class="tabs-container">
      <!-- Login -->
      <div class="tab-content" id="tab1" style="display: none;">

        <h3 class="margin-bottom-10 margin-top-10">Login</h3>

        <form method="post" class="login" action="<?php echo site_url()?>/user/loginSub">

          
          <p class="form-row form-row-wide">
            <label for="username">Email Address:</label>
            <input type="text" class="input-text" name="txt_email" id="txt_email" value="" />
          </p>

          <p class="form-row form-row-wide">
            <label for="password">Password:</label>
            <input class="input-text" type="password" name="txt_password" id="txt_password" />
          </p>

          <p class="form-row">
            <input type="submit" class="button" name="login" value="Login" />

            <label for="rememberme" class="rememberme">
            <!-- <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label> -->
          </p>

          <p class="lost_password">
            <a href="#" >Lost Your Password?</a>
          </p>

          
        </form>
      </div>

        <!-- Register -->
        <div class="tab-content" id="tab2" style="display: none;">

          <h3 class="margin-bottom-10 margin-top-10">Register</h3>

          <form method="post" class="register" action="<?php echo site_url()?>/user/registerSub">
            
            <p class="form-row form-row-wide">
              <label for="reg_email">Email Address:</label>
              <input type="email" class="input-text" name="txt_email" id="reg_email" value="" />
            </p>

            
            <p class="form-row form-row-wide">
              <label for="reg_password">Password:</label>
              <input type="password" class="input-text" name="txt_password" id="reg_password" />
            </p>

            <p class="form-row form-row-wide">
              <label for="reg_password2">Repeat Password:</label>
              <input type="password" class="input-text" name="con_password" id="reg_password2" />
            </p>

            <p class="form-row form-row-wide">
              <label for="reg_email">Name:</label>
              <input type="text" class="input-text" name="txt_fname" id="txt_name" value="" />
            </p>
                  
            <p class="form-row">
              <input type="submit" class="button" name="register" value="Register" />
            </p>
            
          </form>
        </div>
    </div>
  </div>
</div>
<script>
  <?php if($this->uri->segment(3)=="register"){?>
        $(document).ready(function(){
            $("#tab2").show();
            $("#tab1").hide();         
        });
  <?php }
  if($this->uri->segment(3)=="1"){
      echo "alert('Validation Failed');";
  }
  if($this->uri->segment(3)=="2"){
      echo "alert('Password Mismatch');";
  }

  ?>
</script>