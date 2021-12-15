<!-- Breadcrumb -->
	<div id="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="page-title">
						<h1 class="text-uppercase">Star: <?php echo $star_name; ?></h1>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 text-right">
					<ul class="breadcrumb">
					    <li>
					    	<a href="<?php echo base_url();?>"><i class="fi ion-ios-home"></i>Home</a>
					    </li>
					    <li class="">Stars</li>
					    <li class="active"><?php echo $star_name; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb -->
	
	<!-- Secondary Section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <!-- All Movies -->
			<?php if($total_rows > 0){  ?>
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php foreach ($all_published_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-4">
                                <div class="latest-movie-img-container">
                                    <div class="movie-img"> <img class="img-responsive lazy" src="<?php echo base_url('uploads/default_image/blank_thumbnail.jpg');?>" data-src="<?php echo $this->common_model->get_video_thumb_url($videos['videos_id']); ?>" alt="<?php echo $videos['title'];?>"> 
                                    	<a href="<?php echo base_url('watch/'.$videos['slug']).'.html';?>" class="ico-play ico-play-sm"> <img class="img-responsive play-svg svg" src="<?php echo base_url(); ?>assets/front_end/images/play-button.svg" alt="play" onerror="this.src='<?php echo base_url(); ?>assets/front_end/images/play-button.png'"> </a>
                                        <div class="overlay-div"></div>
                                        <div class="video_quality">
                                        	<span class="label label-primary">
                                        		<?php if($videos['is_tvseries']=='1'): echo $this->common_model->get_num_episodes_by_id($videos['videos_id']).' EPISODES'; else: echo $videos['video_quality']; endif; ?>                                        		                                      			
                                        	</span>
                                        </div> 
                                        <div class="movie-title">
                                        	<h3>
                                        		<a href="<?php echo base_url('watch/'.$videos['slug']).'.html';?>"><?php echo $videos['title'];?></a>                                        		
                                        	</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End All Movies -->
        </div>
<?php if($total_rows > 24){ echo $links; } }else{ echo '<center><h3> Opps!! No Movie Found</h3></center>'; } ?>		
								
    </div>
</div>

<!-- Secondary Section -->