<?php
    $show_star_image    =   $this->db->get_where('config' , array('title'=>'show_star_image'))->row()->value;
    $theme_dir          =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir         =   'assets/theme/'.ovoo_config('active_theme').'/';
?>

<section class="sg-section">
    <div class="section-content watch-video">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="video">


                        <div class="movie-payer">

                            <?php
                                if(($total_video_files >0)):
                                    $player_color_skin          =   $this->db->get_where('config' , array('title'=>'player_color_skin'))->row()->value;
                                    if(isset($_GET['key'])):
                                        $video_file     = $this->common_model->get_single_video_file_details_by_key($_GET['key']);
                                        $video_file_id  = $video_file->video_file_id;
                                        $source_type    = $video_file->source_type;
                                        $file_source    = $video_file->file_source;
                                        $file_url       = $video_file->file_url;                            
                                        
                                    else:
                                        $video_file     = $this->common_model->get_first_video_details_videos_id($videos_id);
                                        $video_file_id  = $video_file->video_file_id;
                                        $source_type    = $video_file->source_type;
                                        $file_source    = $video_file->file_source;
                                        $file_url       = $video_file->file_url;                            
                                    endif;
                                    $subtitles = $this->db->get_where('subtitle', array('video_file_id'=>$video_file_id))->result_array();
                                    if($file_source=='mp4' || $file_source=='webm' || $file_source=='flv' || $file_source=='m3u8' || $file_source=='gdrive' || $file_source=='amazone'):
                            ?>
                            <!-- script -->


                            <?php  if($file_source=='m3u8' || $file_source=='flv'): ?>
                                <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>
                            <?php endif; ?>


                                <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>" data-setup="{}">                            <!-- video source -->
                                        <?php
                                            foreach ($subtitles as $subtitle):
                                        ?>
                                        <!-- subtitle source -->
                                        <track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                        <?php endforeach; ?>                         
                                    <!-- worning text if needed -->
                                    <p class="vjs-no-js"><?php echo trans('to_view_this_video_please_enable_JavaScript,_and_consider_upgrading_to_a_web_browser_that'); ?> <a href="http://videojs.com/html5-video-support/" target="_blank"><?php echo trans('supports_html5_video'); ?></a></p>
                                </video>


                                <script>
                                  var options;
                                  options = {
                                    "controls": true, 
                                    "autoplay": false, 
                                    "preload": "auto" ,
                                    "playbackRates": [0.5, 1, 1.5, 2, 3, 4],
                                    techOrder: [ 'chromecast', 'html5' ],
                                    sources: [
                                        { src: '<?php echo $file_url; ?>', type: '<?php if($file_source =='mp4' || $file_source =='gdrive' || $file_source =='amazone'){echo 'video/mp4';}else if($file_source =='flv'){echo 'video/x-flv';}else if($file_source =='webm' || $file_source =='mkv'){echo 'video/webm';}else if($file_source =='m3u8'){echo 'application/x-mpegURL';} ?>'}
                                    ],
                                    chromecast: {               
                                          requestTitleFn: function(source) { // Not required
                                             return '<?php echo str_replace('"','',str_replace("'", "", $watch_videos->title)); ?>';
                                          },
                                          requestSubtitleFn: function(source) { // Not required
                                             return 'Watching Movie';
                                          },
                                          requestCustomDataFn: function(source) { // Not required
                                             return {
                                                'live': false,
                                            }
                                          },
                                          requestPosterFn: function () {
                                            return [
                                                {
                                                    'url': '<?php echo $this->common_model->get_video_thumb_url($watch_videos->videos_id); ?>'
                                                }
                                            ];
                                        }
                                    },
                                    plugins: {
                                      chromecast: {
                                         customData: {
                                                live: false
                                            }
                                      },
                                    }
                                  };
                                  var ovoo_player = videojs('play', options);
                               </script>

                               <!-- Start Continue watching -->
                               <!-- seek remember -->
                                <script src="<?php echo base_url(); ?>assets/player/plugins/seek-remember/videojs-remember.js"></script>
                                <script>
                                  ovoo_player.remember({"localStorageKey": "videojs.remember.<?php echo "mv".$video_file->video_file_id; ?>"});
                                </script>
                                <script>
                                    ovoo_player.on('timeupdate', onVideoTimeupdate );
                                    function onVideoTimeupdate() {
                                        var percentage = ( ovoo_player.currentTime() / ovoo_player.duration() ) * 100;
                                        localStorage.setItem("cfv.<?php echo $watch_videos->videos_id; ?>", percentage);
                                    };
                                </script>
                                <!-- End Continue watching -->


                                <?php endif; ?>

                                <?php if($file_source=='youtube'): ?>
                                    <!-- play from youtube file -->
                                   <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>">
                                       <?php
                                            foreach ($subtitles as $subtitle):
                                        ?>
                                        <!-- subtitle source -->
                                        <track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                        <?php endforeach; ?>
                                   </video>
                                    <!-- youtube -->
                                    <script src="<?php echo base_url(); ?>assets/player/plugins/videojs-youtube/Youtube.min.js"></script>
                                   
                                    <script>
                                        videojs("play", { 
                                                        "controls": true, 
                                                        "autoplay": true, 
                                                        "preload": "auto" ,
                                                        "width": 640,
                                                        "height": 265,
                                                        "techOrder":  ["youtube"],
                                                        "sources": [{ "type": "video/youtube", "src": "<?php echo $file_url; ?>"}],
                                                });
                                    </script>                                    
                                <?php endif; ?>

                                <!-- mkv file -->
                                <?php if($file_source=='mkv'): ?>
                                    <link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css"/>
                                    <script src="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.js"></script>
                                    <video id="video-id"> <source src="<?php echo $file_url; ?>" type="video/mp4"/>
                                        <?php
                                            foreach ($subtitles as $subtitle):
                                        ?>
                                        <!-- subtitle source -->
                                        <track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                        <?php endforeach; ?>
                                    </video>
                                    <script>
                                        fluidPlayer("video-id",{
                                            layoutControls: {
                                                fillToContainer: true, // Default true
                                                posterImage: '<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>',
                                                doubleclickFullscreen: true, // Default true
                                            }
                                        });
                                    </script>
                                <?php endif; ?>
                                <!-- END mkv -->

                                <?php if($file_source=='vimeo'): ?>
                                    <!--  play from vimeo file -->                            
                                      <script src="<?php echo base_url(); ?>assets/player/video-js-5/video.min.js"></script>
                                      <script src="<?php echo base_url(); ?>assets/player/plugins/videojs-vimeo/vimeo.js"></script>
                                       <video id="playerjs" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls autoplay width="960" height="400"
                                          data-setup='{}'
                                        >
                                        </video>
                                        </center>
                                        <script>
                                            videojs("playerjs", { 
                                            "controls": true, 
                                            "autoplay": true, 
                                            "preload": "auto" ,
                                            "width": 640,
                                            "height": 265,
                                             "techOrder":  ["vimeo"],
                                             "sources": [{ "type": "video/vimeo", "src": "<?php echo $file_url; ?>"}],
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


                            <?php else: ?>
                                <!-- play trailler from youtube -->
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
                                <div class="video-embed-container"><iframe width="853" height="480" src="https://www.youtube.com/embed?listType=search&list=<?php echo $watch_videos->title; ?>" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                            <?php endif; ?>

                            <!-- END server -->
                        </div>   
                    </div>
                    <div class="video-meta">
                        <ul class="global-list">
                            <?php
                                $sources = $this->common_model->get_video_file_by_videos_id($watch_videos->videos_id);
                                $i=0;
                                if(isset($_GET['key'])){
                                    $current_file_id = $_GET['key'];
                                }else{
                                    $current_file_id = '000000';
                                }
                                foreach($sources as $source):
                                    $i++;
                            ?>
                            <li class=" <?php if($source['stream_key']==$current_file_id){ echo 'active';}else if($current_file_id=='000000' && $i=='1'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url().'watch/'.$watch_videos->slug.'.html?key='.$source['stream_key']; ?>"><?php echo $source['label']; ?></a></li>

                            <?php endforeach; ?>

                        </ul>
                        <div class="buttons">
                            <ul class="global-list">
                                <!-- Trailler See -->
                                <?php if($watch_videos->trailler_youtube_source !=NULL && $watch_videos->trailler_youtube_source !=''): ?>
                                <li><a href="<?php echo $watch_videos->trailler_youtube_source; ?>" class="popup-youtube btn btn-primary"><span class="mdi mdi-name mdi-play"></span> <?php echo trans('trailler'); ?></a></li>
                                <?php endif; ?>
                                <!-- End Trailler See -->

                                <?php if($total_download_links >0 && $watch_videos->enable_download =='1'): ?>
                                <li class="sg-dropdown">
                                    <a href="#" class="btn btn-primary"> <?php echo trans('download');?> <span class="mdi mdi-name mdi-arrow-down"></span></a>
                                    <ul class="sg-dropdown-menu">
                                        <?php foreach($download_links as $dw_link): $season_title =''; if($watch_videos->is_tvseries): $season_title = $this->common_model->get__seasons_name_by_id($dw_link['season_id']); endif;?>

                                        <li><a href="<?php echo urldecode($dw_link['download_url']); ?>"><?php echo $season_title.'-'.$dw_link['link_title'].'-'.$dw_link['resolution'].'-'.$dw_link['file_size'] ?></a></li>
                                         <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php if($this->common_model->get_ads_status('player_bottom')=='1'): ?>
                    <!-- header ads -->
                        <div class="sg-section mb-5">
                            <div class="section-content text-center">
                                <div class="container">
                                    <?php echo $this->common_model->get_ads('player_bottom'); ?>
                                </div><!-- /.container -->
                            </div><!-- /.section-content -->
                        </div><!-- /.sg-section -->
                    <!-- header ads -->
                    <?php endif; ?>
                    <div class="movie-details">
                        <div class="top-cpntent">
                            <h2><?php echo $watch_videos->title;?></h2>
                            <div class="icons">
                                <ul class="global-list">
                                    <?php $movie_report_enable =   $this->db->get_where('config' , array('title' =>'movie_report_enable'))->row()->value;?>
                                    <?php if($movie_report_enable == '1'): ?>    
                                    <li class="">
                                        <a href="javascript:void(0);" data-toggle="modal" id="menu" class="" data-target="#report-modal" data-id="<?php echo base_url('home/view_modal/report/'.$watch_videos->videos_id) ?>">
                                            <span class="mdi mdi-name mdi-flag-outline"></span>
                                        </a>
                                    </li>
                                    <?php $this->load->view($theme_dir.'report'); ?>
                                    <?php endif; ?>
                                    

                                    <li><a href="javascript:void(0);" onclick="wish_list_add('fav','<?php echo $watch_videos->videos_id;?>')"><span class="mdi mdi-name mdi-heart-outline"></span></a></li>
                                    <li><a href="javascript:void(0);" onclick="wish_list_add('wl','<?php echo $watch_videos->videos_id;?>')"><i class="fa fa-clock-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="description">
                            <p><span>Description:</span><?php echo $watch_videos->description;?> </p>
                            
                        </div><!-- /.description -->
                        <div class="short-list">
                            <ul class="global-list">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('genre'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->genre !='' && $watch_videos->genre !=NULL):
                                                    $i = 0;
                                                    $genres =explode(',', $watch_videos->genre);                                                
                                                    foreach ($genres as $genre_id):
                                                    if($i>0){ echo ','.'&nbsp;' ;} $i++;                                           ?>
                                                <a href="<?php echo $this->genre_model->get_genre_url_by_id($genre_id);?>"><?php echo $this->genre_model->get_genre_name_by_id($genre_id);?></a>
                                    <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('actor'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->stars !='' && $watch_videos->stars !=NULL):
                                                    $i = 0;
                                                    $stars =explode(',', $watch_videos->stars);                                                
                                                    foreach ($stars as $star_id):
                                                    if($i>0){ echo ',';} $i++;                                           ?>
                                                <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('director'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->director !='' && $watch_videos->director !=NULL):
                                                    $i = 0;
                                                    $stars =explode(',', $watch_videos->director);                                                
                                                    foreach ($stars as $star_id):
                                                    if($i>0){ echo ',';} $i++;                                           ?>
                                                <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('writer'); ?>: 
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->writer !='' && $watch_videos->writer !=NULL):
                                                    $i = 0;
                                                    $stars =explode(',', $watch_videos->writer);                                                
                                                    foreach ($stars as $star_id):
                                                    if($i>0){ echo ',';} $i++;                                           ?>
                                                <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('release'); ?>: 
                                        </div>
                                        <div class="col-sm-10">
                                            <?php echo $watch_videos->release;?>
                                        </div>
                                    </div>
                                </li>
                                
                               
                            </ul>
                        </div>
                    </div><!-- /.movie-details -->
                </div>
                <div class="col-lg-5">
                    <div class="sg-sidbar">
                        <div class="sg-widget">
                            <h3 class="widget-title">Recommended for you</h3>
                            <ul class="global-list">

                                <?php
                                if($watch_videos->is_tvseries == '1'):
                                    $related_videos = $this->common_model->get_related_tvseries($watch_videos->videos_id,$watch_videos->genre);
                                else:   
                                    $related_videos = $this->common_model->get_related_movie($watch_videos->videos_id,$watch_videos->genre);
                                endif;
                                //var_dump($related_videos);     


                                foreach ($related_videos as $videos):  ?>
                                <li>
                                    <div class="sg-post">
                                        <div class="entry-header">
                                            <a href="<?php echo base_url('watch/'.$videos['slug']).'.html';?>"><img src="<?php echo base_url('uploads/default_image_flix/image_336X190.png'); ?>" data-src="<?php echo $this->common_model->get_video_poster_url($videos['videos_id']); ?>" alt="<?php echo $videos['title'];?>" class="lazy img-fluid"></a>
                                        </div>
                                        <div class="entry-content">
                                            <h4><a href="<?php echo base_url('watch/'.$videos['slug']).'.html';?>"><?php echo $videos['title'];?></a></h4>
                                            <p><?php echo substr(strip_tags($videos['description']),0,120);?></p>
                                        </div>
                                    </div>
                                </li>

                                <?php endforeach; ?>

                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.sg-sidbar -->
                </div>
            </div><!-- /.row -->

        </div><!-- ./container -->
    </div>
</section><!-- /.watch-video -->