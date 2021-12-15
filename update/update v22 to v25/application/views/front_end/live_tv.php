<?php if($this->common_model->get_ads_status('home_header')=='1'): ?>
<!-- header ads -->
<div id="ads" style="padding: 20px 0px;text-align: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $this->common_model->get_ads('home_header'); ?>
            </div>
        </div>
    </div>
</div>
<!-- header ads -->
<?php endif; ?>
<!-- Secondary Section -->
  
<?php if($this->live_tv_model->get_featured_tv_status()): ?>
    <!-- live tv section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <!-- Upcomming Movies -->
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="movie-heading overflow-hidden"> <span>Featured TV Channels</span>
                        <div class="disable-bottom-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-md-12 col-sm-12">
                <div class="owl-carousel live_tv_owl">
                    <?php 
                        $featured_tvs =$this->live_tv_model->get_featured_live_tv();
                        foreach ($featured_tvs as $tv):
                     ?>
                    <div class="item">
                        <figure class="figure">
                            <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                                <img class="owl-lazy" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="" />                            
                                <figcaption class="figure-caption "><?php echo $tv['tv_name']; ?></figcaption>
                            </a>
                        </figure>
                    </div>
                <?php endforeach; ?>
                </div>                
                <script type="text/javascript">
                $('.live_tv_owl').owlCarousel({
                        stagePadding: 0,/*the little visible images at the end of the carousel*/
                        loop:true,
                        rtl: false,
                        lazyLoad:true,
                        margin:15,
                        center: true,
                        // autoplay: true,
                        // autoplayTimeout: 8500,
                        // smartSpeed: 450,
                        nav:true,
                        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                        dots:false,
                        responsive:{
                            0:{
                                items:2
                            },
                            600:{
                                items:3
                            },
                            800:{
                                items: 4
                            },
                            1000:{
                                items:4
                            },
                          1200:{
                              items: 5
                          }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($this->live_tv_model->get_tv_status()): ?>
    <!-- live tv section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <!-- All tv section -->
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="movie-heading overflow-hidden"> <span>All TV Channels</span>
                        <div class="disable-bottom-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-md-12 col-sm-12">
                <div class="owl-carousel live_tv_owl">
                    <?php 
                        $all_tvs =$this->live_tv_model->get_all_live_tv();
                        foreach ($all_tvs as $tv):
                     ?>
                    <div class="item">
                        <figure class="figure">
                            <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                                <img class="owl-lazy" data-src="<?php echo $this->live_tv_model->get_tv_thumbnail($tv['thumbnail']); ?>" alt="" />                            
                                <figcaption class="figure-caption "><?php echo $tv['tv_name']; ?></figcaption>
                            </a>
                        </figure>
                    </div>
                <?php endforeach; ?>
                </div>                
                <script type="text/javascript">
                $('.live_tv_owl').owlCarousel({
                        stagePadding: 0,/*the little visible images at the end of the carousel*/
                        loop:true,
                        rtl: false,
                        lazyLoad:true,
                        margin:15,
                        center: true,
                        nav:true,
                        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                        dots:false,
                        responsive:{
                            0:{
                                items:4
                            },
                            600:{
                                items:6
                            },
                            800:{
                                items: 8
                            },
                            1000:{
                                items:10
                            },
                          1200:{
                              items: 12
                          }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="section-opt">
    <div class="container">
        <div class="row">
            <!-- Latest Movies -->
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="movie-heading overflow-hidden"> <span>Latest Movies</span>
                        <div class="disable-bottom-line"></div>
                        <a href="<?php echo base_url();?>movies.html" class="btn btn-success btn-sm pull-right">More<i class="fa fa-angle-double-right m-l-10" aria-hidden="true"></i></a>
                    </div>
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php foreach ($latest_videos as $videos) :?>
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
            <!-- End Latest Movies -->
 <?php 
    $tv_series_publish = $this->db->get_where('config',array('title'=>'tv_series_publish'))->row()->value;
    if($tv_series_publish =='1'):
 ?>
            <!-- Latest TV Series -->
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="movie-heading overflow-hidden"> <span>Latest TV-Series</span>
                        <div class="disable-bottom-line"></div>
                        <a href="<?php echo base_url();?>tv-series.html" class="btn btn-success btn-sm pull-right">More<i class="fa fa-angle-double-right m-l-10" aria-hidden="true"></i></a>
                    </div>
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php foreach ($latest_tv_series as $videos) :?>
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
            <!-- End Latest TV Series -->
        <?php endif; ?>
        </div>
    </div>
</div>

<!-- Secondary Section -->
