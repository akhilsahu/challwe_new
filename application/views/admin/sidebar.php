<?php



$user=$this->session->userdata('user');



?>



<aside class="main-sidebar">



        <!-- sidebar: style can be found in sidebar.less -->



        <section class="sidebar">



          <!-- Sidebar user panel -->



          <div class="user-panel">



            <div class="pull-left image">



            <?php if(isset($user['txt_profile_image']) && $user['txt_profile_image']!=''){ ?>



              <img src="<?php echo base_url()."uploads/".$user['txt_profile_image'];?>" class="img-circle" alt="User Image">



            <?php }else{?>



              <img src="<?php echo base_url();?>uploads/no-image.png" class="img-circle" alt="User Image">



            <?php }?>              



            </div>



            <div class="pull-left info">



              <p><?php echo $user['txt_fname'] ?></p>



            </div>



          </div>



          <!-- /.search form -->



          <!-- sidebar menu: : style can be found in sidebar.less -->



          <ul class="sidebar-menu">



            <li class="header">MAIN NAVIGATION</li>



            <li>



              <a href="<?php echo site_url();?>/user/dashboard">



                <i class="fa fa-th"></i> <span>Dashboard</span>



              </a>



            </li>



            <li class="treeview">

              <a href="">

                <i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                <li><a href="<?php echo site_url();?>/admin/addArtist"><i class="fa fa-circle-o"></i> Add</a></li>

                <li><a href="<?php echo site_url();?>/admin/manageArtist"><i class="fa fa-circle-o"></i> Manage</a></li>

              </ul>

            </li>



            <li class="treeview">



              <a href="">



                <i class="fa fa-dashboard"></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i>



              </a>



              <ul class="treeview-menu">



                <li><a href="<?php echo site_url();?>/admin/addBlog"><i class="fa fa-circle-o"></i> Add</a></li>



                <li><a href="<?php echo site_url();?>/admin/manageBlog"><i class="fa fa-circle-o"></i> Manage</a></li>



              </ul>



            </li> 
             

            <li class="treeview">



              <a href="">



                <i class="fa fa-dashboard"></i> <span>Skills</span> <i class="fa fa-angle-left pull-right"></i>



              </a>



              <ul class="treeview-menu">



                <li><a href="<?php echo site_url()."/admin/addDirectory";?>"><i class="fa fa-circle-o"></i> Add</a></li>



                <li><a href="<?php echo site_url()."/admin/manageDirectory";?>"><i class="fa fa-circle-o"></i> Manage</a></li>



              </ul>



            </li>

              <li class="treeview">



              <a href="">



                <i class="fa fa-dashboard"></i> <span>Items</span> <i class="fa fa-angle-left pull-right"></i>



              </a>



              <ul class="treeview-menu">



                <li><a href="<?php echo site_url()."/admin/additems";?>"><i class="fa fa-circle-o"></i> Add</a></li>



                <li><a href="<?php echo site_url()."/admin/manageditems";?>"><i class="fa fa-circle-o"></i> Manage</a></li>



              </ul>



            </li>

            </li>

              <li class="treeview">



              <a href="">



                <i class="fa fa-dashboard"></i> <span>Levels</span> <i class="fa fa-angle-left pull-right"></i>



              </a>



              <ul class="treeview-menu">



                <li><a href="<?php echo site_url()."/admin/addlevels";?>"><i class="fa fa-circle-o"></i> Add</a></li>



                <li><a href="<?php echo site_url()."/admin/managedlevels";?>"><i class="fa fa-circle-o"></i> Manage</a></li>



              </ul>



            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-dashboard"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url()."/admin/addcategory";?>"><i class="fa fa-circle-o"></i> Add</a></li>
                <li><a href="<?php echo site_url()."/admin/managecategory";?>"><i class="fa fa-circle-o"></i> Manage</a></li>
              </ul>
            </li>
	
		<li class="treeview">
          <a href="<?php echo site_url()."/admin/manageIcons";?>">
          <i class="fa fa-dashboard"></i> <span>Icon List</span>
          </a>
		</li>
      <li class="treeview">
          <a href="<?php echo site_url()."/admin/manageTransactions";?>">
          <i class="fa fa-history"></i> <span>Transaction History</span>
          </a>
      </li>
        
       <li class="treeview">
          <a href="<?php echo site_url()."/admin/manageSettings";?>">
          <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>



            <!-- <li>



              <a href="#">



                 <span>Tracking</span> 



              </a>



            </li> -->

        



          </ul>



        </section>



        <!-- /.sidebar -->



      </aside>