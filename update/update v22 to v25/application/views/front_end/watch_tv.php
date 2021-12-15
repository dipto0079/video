<div id="movie-details">
    <div class="container">
        <div class="row">
        <?php if($this->common_model->get_ads_status('player_sidebar')=='1'): ?>
            <div class="col-md-9 col-sm-8">
            <?php else: ?>
                <div class="col-md-12 col-sm-12">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12 text-center m-b-10">
                            <?php echo $this->common_model->get_ads('player_top'); ?>
                        </div>
                    </div>                   
                    <div class="movie-payer">
                        <div class="btn-group">
                            <a href="<?php echo base_url('live-tv/').$watch_tv->slug.'.html';?>" class="btn btn-sm btn-default"><?php echo $watch_tv->stream_label;?></a>
                            <?php
                              if($this->live_tv_model->get_stream_url($watch_tv->live_tv_id,'opt1') !=''): 
                            ?>
                            <a href="<?php echo base_url('live-tv/').$this->live_tv_model->get_slug_by_live_tv_id($watch_tv->live_tv_id).'.html?key='.$this->live_tv_model->get_stream_key($watch_tv->live_tv_id,'opt1');?>" class="btn btn-sm btn-default"><?php echo $this->live_tv_model->get_stream_label($watch_tv->live_tv_id,'opt1');?></a>
                            <?php endif; ?>
                            <?php
                              if($this->live_tv_model->get_stream_url($watch_tv->live_tv_id,'opt2') !=''): 
                            ?>
                            <a href="<?php echo base_url('live-tv/').$this->live_tv_model->get_slug_by_live_tv_id($watch_tv->live_tv_id).'.html?key='.$this->live_tv_model->get_stream_key($watch_tv->live_tv_id,'opt2');?>" class="btn btn-sm btn-default"><?php echo $this->live_tv_model->get_stream_label($watch_tv->live_tv_id,'opt2');?></a>
                            <?php endif; ?>
                        </div>

                        <?php
                            // player configuration
                            $player_color_skin          =   $this->db->get_where('config' , array('title'=>'player_color_skin'))->row()->value;
                            $player_watermark           =   $this->db->get_where('config' , array('title'=>'player_watermark'))->row()->value;   
                            $player_watermark_logo      =   $this->db->get_where('config' , array('title'=>'player_watermark_logo'))->row()->value;   
                            $player_watermark_url       =   $this->db->get_where('config' , array('title'=>'player_watermark_url'))->row()->value;   
                            $player_share               =   $this->db->get_where('config' , array('title'=>'player_share'))->row()->value;   
                            $player_share_fb_id         =   $this->db->get_where('config' , array('title'=>'player_share_fb_id'))->row()->value;   
                            $player_seek_button         =   $this->db->get_where('config' , array('title'=>'player_seek_button'))->row()->value;   
                            $player_seek_forward        =   $this->db->get_where('config' , array('title'=>'player_seek_forward'))->row()->value;   
                            $player_seek_back           =   $this->db->get_where('config' , array('title'=>'player_seek_back'))->row()->value;   
                            $player_volume_remember     =   $this->db->get_where('config' , array('title'=>'player_volume_remember'))->row()->value;
                            if(isset($_GET['key'])){
                                $query = $this->db->get_where('live_tv_url', array('stream_key'=>$_GET['key']),1);
                                $num_rows = $query->num_rows();
                                if($num_rows > 0):
                                    $video_file     = $query->row();
                                    $file_source    = $video_file->source;
                                    $file_url       = $video_file->url;
                                else:
                                    $file_source    = $watch_tv->stream_from;
                                    $file_url       = $watch_tv->stream_url;
                                endif;                            
                            }else{
                                $file_source    = $watch_tv->stream_from;
                                $file_url       = $watch_tv->stream_url;                            
                            }
                            ?>
                            <?php  if($file_source=='hls' || $file_source=='rtmp' || $file_source=='mpeg-dash'): ?>
                               <?php  if($file_source=='hls'): ?>
                                    <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>
                                    <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>" data-setup="{}">                            <!-- video source -->
                                        <source src="<?php echo $file_url; ?>" type='application/x-mpegURL' label='HD' res='720'/>                                                                
                                        <!-- worning text if needed -->
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                    <script>
                                        var ovoo_player = videojs("play", { 
                                        "controls": true, 
                                        "autoplay": true, 
                                        "preload": "auto" ,
                                        "playbackRates": [0.5, 1, 1.5, 2],
                                        "width": 640,
                                        "height": 265
                                        });
                                    </script>
                            <?php  elseif($file_source=='rtmp'): ?>
                                    <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
                                    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
                                    <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>" data-setup="{}">                            <!-- video source -->
                                        <source src="<?php echo $file_url; ?>" type='rtmp/mp4' label='HD' res='720'/>                                                                
                                        <!-- worning text if needed -->
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                    <script>
                                        var ovoo_player = videojs("play", { 
                                        "controls": true, 
                                        "autoplay": true, 
                                        "preload": "auto" ,
                                        "playbackRates": [0.5, 1, 1.5, 2],
                                        "width": 640,
                                        "height": 265
                                        });
                                    </script>
                                <?php  elseif($file_source=='mpeg-dash'): ?>
                                    <script src="<?php echo base_url(); ?>assets/player/plugins/dash-js/dash.all.min.js"></script>
                                    <script src="https://github.com/videojs/videojs-contrib-dash/releases/download/v2.9.1/videojs-dash.min.js"></script>
                                    <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
                                    <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>" data-setup="{}">                            <!-- video source -->
                                        <source src="<?php echo $file_url; ?>" type='application/dash+xml' label='HD' res='720'/>                                                                
                                        <!-- worning text if needed -->
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                    <script>
                                        var ovoo_player = videojs("play", { 
                                        "controls": true, 
                                        "autoplay": true, 
                                        "preload": "auto" ,
                                        "playbackRates": [0.5, 1, 1.5, 2],
                                        "width": 640,
                                        "height": 265
                                        });
                                    </script>
                                <?php endif; ?>                             
                                <?php if($player_watermark =='1' ): ?>
                                <!-- Logo/watermark -->
                                <script src="<?php echo base_url(); ?>assets/player/plugins/watermark/videojs-logo.min.js"></script>
                                <script>
                                  ovoo_player.videoLogo({
                                    watermark: ' ',
                                    logo: '<?php echo base_url().$player_watermark_logo; ?>',       // default 'logo.png'
                                    homepage: '<?php echo $player_watermark_url; ?>',
                                  });
                                </script>
                                <!-- End Logo/watermark -->
                            <?php endif; if($player_share =='1' ): ?>
                                <!-- Social Share -->
                                <script src="<?php echo base_url(); ?>assets/player/plugins/videojs-share/videojs-share.js"></script>
                                <script>
                                    ovoo_player.share({
                                        appId: 11231434324
                                    });
                                </script>
                                <!-- End Social Share -->
                            <?php endif; ?>
                                <!-- hotkeys -->
                                <script src="<?php echo base_url(); ?>assets/player/plugins/hotkeys/videojs.hotkeys.min.js"></script>
                                <script>    
                                  ovoo_player.ready(function() {
                                    this.hotkeys({
                                      seekStep: 5
                                    });
                                  });
                                </script>
                                <!-- End hotkeys -->
                                <?php if($player_volume_remember =='1' ): ?>
                                <!-- persistvolume -->
                                <script src="<?php echo base_url(); ?>assets/player/plugins/videojs.persistvolume/videojs.persistvolume.js"></script>
                                <script>    
                                  ovoo_player.ready(function() {
                                    this.persistvolume({
                                      namespace: "ovoo_player-previus-volume"
                                    });
                                  });
                                </script>
                                <!-- End persistvolume -->                        
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($file_source=='youtube'): ?>
                            <!-- play from youtube file -->
                           <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>">
                               
                           </video>
                            <!-- youtube -->
                            <script src="<?php echo base_url(); ?>assets/player/plugins/videojs-youtube/Youtube.min.js"></script>
                           
                            <script>
                                videojs("play", { 
                                "controls": true, 
                                "autoplay": true, 
                                "preload": "auto" ,
                                "playbackRates": [0.5, 1, 1.5, 2],
                                "width": 640,
                                "height": 265,
                                 techOrder:  ["youtube"],
                                 sources: [{ "type": "video/youtube", "src": "<?php echo $file_url; ?>"}],
                                 });
                            </script>
                        <?php endif; ?>
                            <?php if($file_source=='embed'): ?>
                                <!-- play from embed url  -->
                                <style type="text/css">
                                    .video-embed-container {
                                        position: relative;
                                        padding-bottom: 56.25%;
                                        padding-top: 30px; height: 0; overflow: hidden;
                                        }
                                        .video-embed-container iframe,
                                        .video-embed-container object,
                                        .video-embed-container embed {
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                        }
                                </style>
                               <div class="video-embed-container"><iframe class="responsive-embed-item" src="<?php echo $file_url; ?>" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                            <?php endif; ?>

                    </div>
                    <?php if($this->common_model->get_ads_status('player_bottom')=='1'): ?>
                    <div id="ads" style="padding: 20px 0px;text-align: center;">
                        <?php echo $this->common_model->get_ads('player_bottom'); ?>
                    </div>
                    <?php endif; ?>  
                </div>
                <?php if($this->common_model->get_ads_status('player_sidebar')=='1'): ?>
                <div class="col-md-3 col-sm-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ad_300x250 m-b-10">
                                 <?php echo $this->common_model->get_ads('player_sidebar'); ?>    
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
</div>
<?php if($this->live_tv_model->get_tv_status()): ?>
    <!-- live tv section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <!-- Upcomming Movies -->
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
                        // autoplay: true,
                        // autoplayTimeout: 8500,
                        // smartSpeed: 450,
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
