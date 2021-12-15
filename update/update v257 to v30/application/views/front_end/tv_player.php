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
		$player_color_skin          =   $this->db->get_where('config' , array('title'=>'player_color_skin'))->row()->value;
		if(isset($_GET['key'])):
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
        else:
        	$file_source    = $watch_tv->stream_from;
        	$file_url       = $watch_tv->stream_url;
        endif;
	    if($file_source=='hls' || $file_source=='rtmp' || $file_source=='mpeg-dash'):
    ?>
    <!-- script -->
    <?php  if($file_source=='hls' || $file_source=='rtmp'): ?>
        <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>

    <?php endif; ?>
    <?php  if($file_source=='mpeg-dash'): ?>
    	<script src="<?php echo base_url(); ?>assets/player/plugins/dash-js/dash.all.min.js"></script>
        <script src="https://github.com/videojs/videojs-contrib-dash/releases/download/v2.9.1/videojs-dash.min.js"></script>
        <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
    <?php endif; ?>
        <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>" data-setup="{}">                            <!-- video source -->
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
	        									"height": 265,
										         sources: [
										        { src: '<?php echo $file_url; ?>', type: '<?php if($file_source =='hls'){echo 'application/x-mpegURL';}else if($file_source =='rtmp'){echo 'rtmp/flv';}else if($file_source =='mpeg-dash'){echo 'application/dash+xml';} ?>'}
										        ],
										    });
	    </script>
    <?php $this->load->view('front_end/player_plugin') ?>
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