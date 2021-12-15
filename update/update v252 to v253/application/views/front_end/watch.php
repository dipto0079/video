<div id="movie-details">
    <div class="container"><div class="row">
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
                    
                    <?php if(($total_video_files >0 && $watch_videos->is_tvseries !='1') || ($watch_videos->is_tvseries =='1' && $total_episodes >0)):
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
                    //$subtitles = $this->db->get_where('subtitle', array('videos_id'=>$watch_videos->videos_id,'status'=>'1'))->result_array();
                    if(isset($_GET['key'])){
                            $this->db->order_by('source_type', "DESC");
                            if($watch_videos->is_tvseries =='1'):
                                $video_file = $this->db->get_where('episodes', array('stream_key'=>$_GET['key']),1)->row();
                                $video_file_id  = $video_file->episodes_id;
                            else:
                                $video_file = $this->db->get_where('video_file', array('stream_key'=>$_GET['key']),1)->row();
                                $video_file_id  = $video_file->video_file_id;
                            endif;
                            $source_type    = $video_file->source_type;
                            $file_source    = $video_file->file_source;
                            $file_url       = $video_file->file_url;                            
                            
                        }else{
                            $this->db->order_by('source_type', "DESC");
                            if($watch_videos->is_tvseries =='1'):
                                $video_file = $this->db->get_where('episodes', array('videos_id'=>$videos_id),1)->row();
                                $video_file_id  = $video_file->episodes_id;
                            else:
                                $video_file = $this->db->get_where('video_file', array('videos_id'=>$videos_id),1)->row();
                                $video_file_id  = $video_file->video_file_id;
                            endif;
                            $source_type    = $video_file->source_type;
                            $file_source    = $video_file->file_source;
                            $file_url       = $video_file->file_url;                            
                        }
                        $subtitles = $this->db->get_where('subtitle', array('video_file_id'=>$video_file_id))->result_array();
                        ?>
                        <!-- From uploads file example mp4,mkv,flv,webm,etc -->
                        <?php if($file_source=='mp4' || $file_source=='webm' || $file_source=='mkv' || $file_source=='flv' || $file_source=='m3u8' || $file_source=='gdrive' || $file_source=='amazone'): ?>
                           <?php  if($file_source=='m3u8'): ?>
                                <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>
                                <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>" data-setup="{}">                            <!-- video source -->
                                    <source src="<?php echo $file_url; ?>" type='application/x-mpegURL' label='HD' res='720'/>
                                        <?php
                                            foreach ($subtitles as $subtitle):
                                        ?>
                                        <!-- subtitle source -->
                                        <track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                        <?php endforeach; ?>                         
                                    <!-- worning text if needed -->
                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                </video>
                                <script>
                                    var ovoo_player = videojs("play", { 
                                    "controls": true, 
                                    "autoplay": false, 
                                    "preload": "auto" ,
                                    "playbackRates": [0.5, 1, 1.5, 2],
                                    "width": 640,
                                    "height": 265
                                    });
                                </script>
                             <?php  elseif($file_source=='flv'): ?>
                                <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
                                <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
                                <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>" data-setup="{}">                            <!-- video source -->
                                    <source src="<?php echo $file_url; ?>" type='video/x-flv' label='HD' res='720'/>
                                        <?php
                                            foreach ($subtitles as $subtitle):
                                        ?>
                                        <!-- subtitle source -->
                                        <track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                        <?php endforeach; ?>                         
                                    <!-- worning text if needed -->
                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                </video>
                                <script>
                                    var ovoo_player = videojs("play", { 
                                    "controls": true, 
                                    "autoplay": false, 
                                    "preload": "auto" ,
                                    "playbackRates": [0.5, 1, 1.5, 2],
                                    "width": 640,
                                    "height": 265
                                    });
                                </script>
                            <?php else: ?>
                            <!-- play video from upload file -->
                            <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>">
                                <?php
                                    foreach ($subtitles as $subtitle):
                                ?>
                                <!-- subtitle source -->
                                <track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                <?php endforeach; ?>  
                            </video>
                           
                            <script>
                                var ovoo_player = videojs("play", { 
                                "controls": true, 
                                "autoplay": false, 
                                "preload": "auto" ,
                                "playbackRates": [0.5, 1, 1.5, 2],
                                "width": 640,
                                "height": 265,
                                 sources: [
                                { src: '<?php echo $file_url; ?>', type: 'video/<?php if($file_source =='mp4' || $file_source =='gdrive' || $file_source =='amazone'){echo 'mp4';}else if($file_source =='flv'){echo 'x-flv';}else if($file_source =='webm' || $file_source =='mkv'){echo 'webm';}else if($file_source =='m3u8'){echo 'application/x-mpegURL';} ?>'}
                                ],
                                });
                            </script>
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
                        <?php endif; if($player_seek_button =='1' ): ?>
                            <!--  seek button -->
                            <script src="<?php echo base_url(); ?>assets/player/plugins/videojs-seek-buttons/videojs-seek-buttons.min.js"></script>
                            <script>
                            ovoo_player.seekButtons({
                                forward: <?php echo $player_seek_forward; ?>,
                                back: <?php echo $player_seek_back; ?>
                              });
                            </script>
                            <!--  END seek button -->
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
                        <?php endif; ?>
                        <!-- END from uploads file example mp4,mkv,flv,webm,etc -->                                
                        
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
                                "autoplay": false, 
                                "preload": "auto" ,
                                "playbackRates": [0.5, 1, 1.5, 2],
                                "width": 640,
                                "height": 265,
                                 techOrder:  ["youtube"],
                                 sources: [{ "type": "video/youtube", "src": "<?php echo $file_url; ?>"}],
                                 });
                            </script>                                    
                        <?php endif; ?>                        
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
                                    "autoplay": false, 
                                    "preload": "auto" ,
                                    "playbackRates": [0.5, 1, 1.5, 2],
                                    "width": 640,
                                    "height": 265,
                                     techOrder:  ["vimeo"],
                                     sources: [{ "type": "video/vimeo", "src": "https://vimeo.com/257776764"}],
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

                    <?php if($watch_videos->is_tvseries !='1'): ?>
                        <!-- server -->
                        <div class="row">
                            <div class="col-md-12  m-t-10 m-b-10">                               
                                <div class="season">
                                    <?php
                                        $this->db->order_by('video_file_id', "ASC");
                                        $sources = $this->db->get_where('video_file',array('videos_id'=>$watch_videos->videos_id))->result_array();
                                        $i=0;
                                        if(isset($_GET['key'])){
                                            $current_file_id = $_GET['key'];
                                        }else{
                                            $current_file_id = '000000';
                                        }
                                        foreach($sources as $source):
                                            $i++;
                                    ?>
                                    <a href="<?php echo base_url().'watch/'.$watch_videos->slug.'.html?key='.$source['stream_key']; ?>" class="btn btn-sm btn-inline <?php if($source['stream_key']==$current_file_id){ echo 'btn-success';}else if($current_file_id=='000000' && $i=='1'){ echo 'btn-success';}else{ echo 'btn-default';} ?>"><?php echo 'Server#'.$i; ?></a>
                                    <?php endforeach; ?>                                        
                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            .season{
                                padding: 10px;
                                background-color: rgba(255,255,255, 0.04);
                            }
                        </style>
                        <!-- END server -->
                    <?php endif; ?>


                    <?php if($watch_videos->is_tvseries =='1'): ?>
                        <div class="row">
                            <div class="col-md-12  m-t-10 m-b-10">
                                <?php
                                    $this->db->order_by('seasons_name', "ASC");
                                    $seasons = $this->db->get_where('seasons',array('videos_id'=>$watch_videos->videos_id))->result_array();
                                    foreach ($seasons as $season):                                       
                                 ?>

                                 <?php if($this->common_model->get_num_episodes_by_seasons_id($season['seasons_id']) > 0): ?>
                                <div class="season">                                        
                                    <p class="btn btn-inline text-uppercase" style="font-size: 14px;color: #055b86">Seasons:: <?php echo $season['seasons_name']; ?> | Ep:: </p>
                                        <?php
                                            $this->db->group_by('seasons_id');
                                            $this->db->order_by('seasons_id', "ASC");
                                            $this->db->group_by('episodes_id');
                                            $this->db->order_by('episodes_name', "ASC");
                                            $episodes = $this->db->get_where('episodes',array('videos_id'=>$watch_videos->videos_id,'seasons_id'=> $season['seasons_id']))->result_array();
                                            $i=0;
                                            $current_key = '000000';
                                            if(isset($_GET['key']))
                                                $current_key = $_GET['key'];
                                            foreach($episodes as $episode):
                                                $i++;
                                         ?>
                                        <a href="<?php echo base_url().'watch/'.$watch_videos->slug.'.html?key='.$episode['stream_key']; ?>" class="btn btn-sm btn-inline <?php if($episode['stream_key']==$current_key){ echo 'btn-success';}else if($current_key=='000000' && $i=='1'){ echo 'btn-success';}else{ echo 'btn-default';} ?>"><?php echo $episode['episodes_name']; ?></a>
                                        <?php endforeach; ?>                                        
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?> 
                            </div>
                            <style type="text/css">
                                .season{
                                    padding: 10px;
                                    background-color: rgba(255,255,255, 0.04);
                                }
                            </style>
                        </div>
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
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <ul class="nav nav-tabs m-t-10">
                    <li style="display: none;"><a data-toggle="tab" href="#in" style="display: none;">Info</a></li>
                    <li class="active"><a data-toggle="tab" href="#info">Info</a></li>
                    <li><a data-toggle="tab" href="#actor_tab">Actor</a></li>
                    <li><a data-toggle="tab" href="#director_tab">Director</a></li>
                    <li><a data-toggle="tab" href="#writer_tab">Writer</a></li>
                    <?php if($total_download_links >0 && $watch_videos->enable_download =='1'): ?>
                    <li><a data-toggle="tab" href="#download">Download</a></li>
                    <?php endif; ?>
                    <li><a data-toggle="tab" href="#trailler">Trailler</a></li>
                </ul>
                <div class="tab-content">
                    <div id="info" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-3 m-t-10"><img class="img-responsive" style="min-width: 183px;" src="<?php echo $this->common_model->get_video_thumb_url($watch_videos->videos_id); ?>" alt="<?php echo $watch_videos->title;?>"></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>
                                            <?php echo $watch_videos->title;?>
                                        </h1>
                                        <button class="btn btn-sm btn-default" onclick="wish_list_add('fav','<?php echo $watch_videos->videos_id;?>')"><span class="btn-label"><i class="fa fa-heart-o"></i></span>Favorite</button>
                                        <button class="btn btn-sm btn-default" onclick="wish_list_add('wl','<?php echo $watch_videos->videos_id;?>')"><span class="btn-label"><i class="fa fa-clock-o"></i></span>Later</button>
                                        
                                        <?php  if($this->db->get_where('config' , array('title' =>'social_share_enable'))->row()->value =='1'):?>
                                        
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox_yl99 m-t-30 m-b-10" data-url="<?php echo base_url().'watch/'.$watch_videos->slug.'.html';?>" data-title="Watch & Download <?php echo $watch_videos->title;?>"></div>
                                        <!-- Addthis Social tool -->
                                    <?php endif; ?>
                                        <p>
                                            <?php echo $watch_videos->description;?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <p> <strong>Genre: </strong>
                                            <?php if($watch_videos->genre !='' && $watch_videos->genre !=NULL):
                                                $i = 0;
                                                $genres =explode(',', $watch_videos->genre);                                                
                                                foreach ($genres as $genre_id):
                                                if($i>0){ echo ',';} $i++;                                           ?>
                                            <a href="<?php echo $this->genre_model->get_genre_url_by_id($genre_id);?>"><?php echo $this->genre_model->get_genre_name_by_id($genre_id);?></a>
                                        <?php endforeach; endif;?>
                                        </p>
                                        <p> <strong>Actor: </strong>
                                            <?php if($watch_videos->stars !='' && $watch_videos->stars !=NULL):
                                                $i = 0;
                                                $stars =explode(',', $watch_videos->stars);                                                
                                                foreach ($stars as $star_id):
                                                if($i>0){ echo ',';} $i++;                                           ?>
                                            <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                        <?php endforeach; endif;?>
                                        </p>

                                        <p> <strong>Director: </strong>
                                            <?php if($watch_videos->director !='' && $watch_videos->director !=NULL):
                                                $i = 0;
                                                $stars =explode(',', $watch_videos->director);                                                
                                                foreach ($stars as $star_id):
                                                if($i>0){ echo ',';} $i++;                                           ?>
                                            <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                        <?php endforeach; endif;?>
                                        </p>

                                        <p> <strong>Writer: </strong>
                                            <?php if($watch_videos->writer !='' && $watch_videos->writer !=NULL):
                                                $i = 0;
                                                $stars =explode(',', $watch_videos->writer);                                                
                                                foreach ($stars as $star_id):
                                                if($i>0){ echo ',';} $i++;                                           ?>
                                            <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                        <?php endforeach; endif;?>
                                        </p>
                                        <p> <strong>Country: </strong>
                                            <?php if($watch_videos->country !='' && $watch_videos->country !=NULL):
                                                $i = 0;
                                                $countries =explode(',', $watch_videos->country);                                                
                                                foreach ($countries as $country_id):
                                                if($i>0){ echo ',';} $i++;
                                                ?>
                                            <a href="<?php echo $this->country_model->get_country_url_by_id($country_id);?>"><?php echo $this->country_model->get_country_name_by_id($country_id);?></a>
                                        <?php endforeach; endif;?>
                                        </p>
                                        <p><strong>Release: </strong>
                                            <?php echo $watch_videos->release;?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <p><strong>Duration:</strong>
                                            <?php echo $watch_videos->runtime;?>
                                        </p>
                                        <p><strong>Quality:</strong>  <span class="label label-primary"><?php echo $watch_videos->video_quality; ?></span></p>
                                        <p><strong>Rating:</strong>
                                            <?php echo $watch_videos->rating;?>
                                        </p>
                                        <?php if($watch_videos->imdb_rating !='' && $watch_videos->imdb_rating !=NULL): ?>
                                        <p><strong><img src="<?php echo base_url();?>assets/front_end/images/imdb-logo.png"></strong>
                                            <?php echo $watch_videos->imdb_rating;?>
                                        </p>
                                    <?php endif; ?>
                                        <div class='rating_selection pull-left'> <strong id="rated">Rating(<?php echo $watch_videos->total_rating;?>)</strong><br>
                                            <input checked id='rating_0' class="rate_now" name='rating' type='radio' value='0'>
                                            <label for='rating_0'> <span>Unrated</span> </label>
                                            <input id='rating_1' class="rate_now" name='rating' type='radio' value='1'>
                                            <label for='rating_1'> <span>Rate 1 Star</span> </label>
                                            <input id='rating_2' class="rate_now" name='rating' type='radio' value='2'>
                                            <label for='rating_2'> <span>Rate 2 Stars</span> </label>
                                            <input id='rating_3' class="rate_now" name='rating' type='radio' value='3' checked>
                                            <label for='rating_3'> <span>Rate 3 Stars</span> </label>
                                            <input id='rating_4' class="rate_now" name='rating' type='radio' value='4'>
                                            <label for='rating_4'> <span>Rate 4 Stars</span> </label>
                                            <input id='rating_5' class="rate_now" name='rating' type='radio' value='5'>
                                            <label for='rating_5'> <span>Rate 5 Stars</span> </label>
                                            <br>
                                        </div><br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php if($total_download_links >0 && $watch_videos->enable_download =='1'): ?>
                    <div id="download" class="tab-pane fade m-t-10">
                      <?php foreach($download_links as $dw_link): ?>
                            <a class='btn btn-default btn-inline btn-sm' href="<?php echo urldecode($dw_link['download_url']); ?>"><span class="btn-label"><i class="fa fa-download"></i></span><?php echo $dw_link['link_title'] ?></a>
                      <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                    <div id="actor_tab" class="tab-pane fade m-t-10">
                        <?php if($watch_videos->stars !='' && $watch_videos->stars !=NULL):
                                $stars =explode(',', $watch_videos->stars);                                                
                                foreach ($stars as $star_id):
                                                                           ?>
                            <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>">
                                <img class="img-thumbnail img-responsive col-sm-2 m-r-20" max-width="50" src="<?php echo $this->common_model->get_image_url('star',$star_id) ?>" alt="<?php echo $this->common_model->get_star_name_by_id($star_id); ?>" title="<?php echo $this->common_model->get_star_name_by_id($star_id); ?>">
                            </a>
                        <?php endforeach; endif;?>
                    </div>
                    <div id="director_tab" class="tab-pane fade m-t-10">

                        <?php if($watch_videos->director !='' && $watch_videos->director !=NULL):
                                $stars =explode(',', $watch_videos->director);                                                
                                foreach ($stars as $star_id):
                                                                           ?>
                            <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>">
                                <img class="img-thumbnail img-responsive col-sm-2 m-r-20" max-width="50" src="<?php echo $this->common_model->get_image_url('star',$star_id) ?>" alt="<?php echo $this->common_model->get_star_name_by_id($star_id); ?>" title="<?php echo $this->common_model->get_star_name_by_id($star_id); ?>">
                            </a>
                        <?php endforeach; endif;?>
                    </div>
                    <div id="writer_tab" class="tab-pane fade m-t-10">
                        <?php if($watch_videos->writer !='' && $watch_videos->writer !=NULL):
                                $stars =explode(',', $watch_videos->writer);                                                
                                foreach ($stars as $star_id):
                                                                           ?>
                            <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>">
                                <img class="img-thumbnail img-responsive col-sm-2 m-r-20" max-width="50" src="<?php echo $this->common_model->get_image_url('star',$star_id) ?>" alt="<?php echo $this->common_model->get_star_name_by_id($star_id); ?>" title="<?php echo $this->common_model->get_star_name_by_id($star_id); ?>">
                            </a>
                        <?php endforeach; endif;?>
                    </div>
                    <div id="trailler" class="tab-pane fade m-t-10">
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
                    </div>
                </div>

                <div class="movie-details-container">
                    <?php   
                        $comments_method = $this->db->get_where('config' , array('title' =>'comments_method'))->row()->value;
                        $facebook_comment_appid = $this->db->get_where('config' , array('title' =>'facebook_comment_appid'))->row()->value;
                        if(($comments_method =='both' || $comments_method =='facebook') && $facebook_comment_appid !='') :
                    ?>
                    <!-- facebook comments -->
                    <div class="row">
                        <div class="col-md-12">                        
                        <h2 class="border">Facebook Comments</h2>
                        <div class="fb-comments" data-href="<?php echo base_url();?>/watch/<?php echo $watch_videos->slug;?>.html" data-width="800" data-numposts="30"></div>
                        <div id="fb-root"></div>
                        <script>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=<?php echo $this->db->get_where('config' , array('title' =>'facebook_comment_appid'))->row()->value; ?>";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>                        
                        </div>
                    </div>
                    <!-- END facebook comments -->
                <?php endif; ?>
                    <?php $total_comments = count($this->db->get_where('comments', array('video_id' =>$watch_videos->videos_id , 'comment_type'=>'1'))->result_array());
                    if ($total_comments >0) :
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-sidebar">
                                <!--Comments Area-->
                                <div class="comments-section">
                                    <div class="section-title">
                                        <h4 class="text-left title-bottom text-uppercase tp-mb30 tp-pb5">
                                            <?php echo $total_comments; ?> Comments found</h4>
                                    </div>
                                    <div class="comment-box">
                                        <?php   $this->db->order_by('comments_id','DESC');
                                            $comments =   $this->db->get_where('comments', array('video_id' =>$watch_videos->videos_id , 'comment_type'=>'1','publication'=>'1'))->result_array();
                                        foreach ($comments as $comment):
                                     ?>
                                        <div class="comment" id="comment<?php echo $comment['user_id']; ?>">
                                            <div class="author-thumbnail"><img src="<?php echo $this->common_model->get_image_url('user',$comment['user_id']); ?>" alt="<?php echo $this->common_model->get_name_by_id($comment['user_id']); ?>"></div>
                                            <div class="comment-text"><strong><?php echo $this->common_model->get_name_by_id($comment['user_id']); ?></strong> - posted
                                                <?php echo $this->common_model->time_ago($comment['comment_at'], false); ?>
                                            </div>
                                            <div class="text">
                                                <?php echo $comment['comment']; ?>
                                            </div>
                                        </div>

                                        <?php   $this->db->order_by('comments_id','ASC');
                                                $comment_replays =   $this->db->get_where('comments', array('video_id' =>$watch_videos->videos_id , 'comment_type'=>'2', 'replay_for'=>$comment['comments_id'],'publication'=>'1'))->result_array();
                                        foreach ($comment_replays as $comment_replay):
                                     ?>
                                        <div class="comment coment-replay">
                                            <div class="author-thumbnail"><img src="<?php echo $this->common_model->get_image_url('user',$comment_replay['user_id']); ?>" alt="<?php echo $this->common_model->get_name_by_id($comment_replay['user_id']); ?>"></div>
                                            <div class="comment-text"><strong><?php echo $this->common_model->get_name_by_id($comment_replay['user_id']); ?></strong> - posted
                                                <?php echo $this->common_model->time_ago($comment_replay['comment_at'], false); ?>
                                            </div>
                                            <div class="text">
                                                <?php echo $comment_replay['comment']; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php   
                                            if(($comments_method =='both' || $comments_method =='ovoo')) :
                                        ?>
                                        <div class="comment coment-replay">
                                            <form class="custom-form" method="post" action="<?php echo base_url('comments/replay'); ?>">
                                                <textarea name="comment" id="comment" class="form-control" rows="2" placeholder="Repay" required></textarea>
                                                <input type="hidden" name="video_id" value="<?php echo $watch_videos->videos_id; ?>">
                                                <input type="hidden" name="replay_for" value="<?php echo $comment['comments_id']; ?>">
                                                <input type="hidden" name="url" value="<?php echo base_url(uri_string());; ?>">
                                                <div>
                                                    <?php if($this->session->userdata('login_status') == 1){ ?>
                                                    <button type="submit" value="submit" class="btn btn-success btn-sm pull-right m-t-20"> <span class="btn-label"><i class="fi ion-ios-undo-outline"></i></span>Replay </button>
                                                    <?php }else{ ?>
                                                    <a class="btn btn-success btn-sm pull-right m-t-20" href="<?php echo base_url('login'); ?>"> <span class="btn-label"><i class="fi ion-log-in"></i></span>Login to Replay </a>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>
                                        <?php endif; endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php   
                                if(($comments_method =='both' || $comments_method =='ovoo')) :
                            ?>
                            <div id="comment-container">
                                <div class="movie-heading overflow-hidden"> <span class="wow fadeInUp" data-wow-duration="0.8s">Leave a comment</span>
                                    <div class="disable-bottom-line wow zoomIn" data-wow-duration="0.8s"></div>
                                </div>
                                <form class="comment-form" method="post" action="<?php echo base_url('comments/comment'); ?>">
                                <input type="hidden" name="video_id" value="<?php echo $watch_videos->videos_id; ?>">
                                <input type="hidden" name="url" value="<?php echo base_url(uri_string()); ?>">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="comment" id="cmnt-user-msg" rows="4" class="form-control" placeholder="MESSAGE" required></textarea>
                                                <div class="input-top-line"></div>
                                                <div class="input-bottom-line"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <?php if($this->session->userdata('login_status') == 1){ ?>
                                            <button type="submit" value="submit" class="btn btn-success"> <span class="btn-label"><i class="fi ion-ios-compose-outline"></i></span>Post Comments </button>
                                            <?php }else{ ?>
                                            <a class="btn btn-success" href="<?php echo base_url('login'); ?>"> <span class="btn-label"><i class="fi ion-log-in"></i></span>Login to Comments </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                            <div class="similler-movie">
                                <div class="movie-heading overflow-hidden"> <span class="fadeInUp" data-wow-duration="0.8s"> You May Like </span>
                                    <div class="disable-bottom-line" data-wow-duration="0.8s"> </div>
                                </div>
                                <div class="row">
                                    <div class="movie-container">
                                        <?php 
                                            $i=0;
                                            $this->db->where('videos_id !=',$watch_videos->videos_id);
                                            $this->db->where('is_tvseries','0');
                                            $this->db->like('genre',$watch_videos->genre);
                                            $this->db->limit(4);   
                                            $related_videos = $this->db->get('videos')->result();         
                                            foreach ($related_videos as $v):
                                            $i++;
                                        ?>
                                        <div class="col-md-3 col-sm-3 col-xs-2">
                                            <div class="latest-movie-img-container">
                                                <div class="movie-img"> <img class="img-responsive lazy" src="<?php echo base_url('uploads/default_image/blank_thumbnail.jpg');?>" data-src="<?php echo $this->common_model->get_video_thumb_url($v->videos_id); ?>" alt="<?php echo $v->title;?>"> <a href="<?php echo base_url('watch/'.$v->slug).'.html';?>" class="ico-play ico-play-sm"> <img class="img-responsive play-svg svg" src="<?php echo base_url(); ?>assets/front_end/images/play-button.svg" alt="play" onerror="this.src='<?php echo base_url(); ?>assets/front_end/images/play-button.png'"> </a>
                                                    <div class="overlay-div"></div>
                                                    <div class="video_quality"><span class="label label-primary"><?php echo $v->video_quality ?></span></div>
                                                    <div class="movie-title"><h3><a href="<?php echo base_url('watch/'.$v->slug).'.html';?>"><?php echo $v->title;?></a></h3></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($i%4==0){ echo "</div></div><div class='row'><div class='movie-container'>";} ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 m-t-10">                
                <div class="sidebar">
                    <div class="sidebar-movie most-liked">
                        <h1 class="sidebar-title">Most Rated</h1>
                        <?php   $this->db->order_by('total_rating','ASC');
                                $most_rated_videos =   $this->db->get_where('videos', array('publication'=> '1'), 5)->result();         
                                    foreach ($most_rated_videos as $most_rated_video):
                        ?>

                        <div class="media">
                            <div class="media-left"> <img src="<?php echo $this->common_model->get_video_thumb_url($most_rated_video->videos_id); ?>" alt="<?php echo $most_rated_video->title;?>" width="40"> </div>
                            <div class="media-body">
                                <h1><a href="<?php echo base_url('watch/'.$most_rated_video->slug).'.html';?>"><?php echo $most_rated_video->title;?></a></h1>
                                <p> <span><i class="fa fa-star"></i> <?php echo $most_rated_video->total_rating;?></span> <span><i class="fa fa-eye"></i> <?php echo $most_rated_video->total_view;?></span> </p>
                            </div>
                        </div>
                            
                        <?php endforeach ?>
                    </div>
                    <div class="sidebar-movie most-viewed">
                        <h1 class="sidebar-title">Most Viewed</h1>
                        <?php   $this->db->order_by('total_view','ASC');
                            $most_rated_videos =   $this->db->get_where('videos', array('publication'=> '1'), 5)->result();         
                            foreach ($most_rated_videos as $most_rated_video):
                        ?>
                        <div class="media">
                            <div class="media-left"> <img src="<?php echo $this->common_model->get_video_thumb_url($most_rated_video->videos_id); ?>" alt="<?php echo $most_rated_video->title;?>" width="40"> </div>
                            <div class="media-body">
                                <h1><a href="<?php echo base_url('watch/'.$most_rated_video->slug).'.html';?>"><?php echo $most_rated_video->title;?></a></h1>
                                <p> <span><i class="fa fa-star"></i> <?php echo $most_rated_video->total_rating;?></span> <span><i class="fa fa-eye"></i> <?php echo $most_rated_video->total_view;?></span> </p>
                            </div>
                        </div>
                            
                        <?php endforeach ?>
                    </div>
                    <?php if ($watch_videos->tags !='' && $watch_videos->tags !=NULL): ?>
                    <div class="tags">
                        <h1 class="sidebar-title">Tags</h1>
                        <ul class="list-inline list-unstyled">
                        <?php $tags=explode(',', $watch_videos->tags);
                        foreach ($tags as $tag):
                        ?>
                            <li><h2><a href="<?php echo base_url().'tags/'.$tag.'.html'; ?>"><?php echo $tag; ?></a></h2></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--sweet alert2 JS -->
<script src="<?php echo base_url(); ?>assets/plugins/swal2/sweetalert2.min.js"></script>
<!-- ajax add to wish-list -->
<script type="text/javascript">
    function wish_list_add(list_type = '', videos_id = '') {
        if (list_type == 'fav') {
            list_name = 'Favorite';
        } else {
            list_name = 'Wish';
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>user/add_to_wish_list',
            data: "list_type=" + list_type + "&videos_id=" + videos_id,
            dataType: 'json',
            beforeSend: function() {},
            success: function(response) {
                var status = response.status;
                if (status == "success") {
                    swal('Good job!', 'Added to your ' + list_name + ' List.', 'success');
                } else if (status == "login_fail") {
                    swal('OPPS!', 'Please login to add your ' + list_name + ' list.', 'error');
                } else {
                    swal('OPPS!', 'Already exist on your ' + list_name + ' list.', 'error');
                }
            }
        });
    }
</script>
<!-- End ajax add to wish-list -->
<!-- Ajax Rating -->
<script>
    $('.rate_now').click(function() {
        rate = $(this).val();
        video_id = "<?php echo $watch_videos->videos_id;?>";
        current_rating = "<?php echo $watch_videos->total_rating;?>";
        total_rating = Number(current_rating) + Number(1);
        if (parseInt(rate) && parseInt(video_id)) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url().'admin/rating';?>",
                data: "rate=" + rate + "&video_id=" + video_id,
                dataType: 'json',
                success: function(response) {
                    var post_status = response.post_status;
                    var rate = response.rate;
                    var video_id = response.video_id;
                    if (post_status == "success") {
                        $('#rated').html('Rating(' + total_rating + ')');
                    } else {
                        alert('Fail to submit rating'); 
                    }
                }
            });
        }
    });
</script>
<!-- End ajax Rating -->


