<style>
 .search-result{
	     min-height: 400px;
 }
</style>

<div class="container">
            <div class="cube-masonry">

                <div id="filters-container" class="cbp-l-filters-alignCenter">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                        All <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".identity" class="cbp-filter-item">
                        Identity <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".web-design" class="cbp-filter-item">
                        Web Design <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".graphic" class="cbp-filter-item">
                        Graphic <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".graphic, .identity" class="cbp-filter-item">
                        Web Design & Identity <div class="cbp-filter-counter"></div>
                    </div>
                </div>

                <div id="masnory-container" class="cbp search-result">
                <?php foreach($artists as $val){
                	$profile_path=($val['txt_profile_image'])?base_url().$val['txt_profile_image']:base_url().'assets/img/mas-1.jpg';
                	?>
                    <div class="cbp-item identity">
                        <!-- <a class="cbp-caption cbp-lightbox" data-title="Easy Note<br>by Cosmin Capitanu" href="<?php echo base_url().'assets/'?>img/mas-1.jpg"> -->
                        <a href="<?php echo site_url().'/content/viewProfile/'.$val['int_artist_id']?>">
                            <div class="cbp-caption-defaultWrap">
                                <img src="<?php echo $profile_path;?>" alt="">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title"><?php echo $val['txt_fname']." ".$val['txt_lname']?></div>
                                        <div class="cbp-l-caption-desc">Experiance: <?php echo $val['txt_experience'];?> Years</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                   <?php } ?> 
                </div>
            </div><!--.cube masonry-->
        </div>