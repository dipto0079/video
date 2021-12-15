<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/'; 

?>



    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2>Continue Wtaching</h2>
            </div>
            
            <ul class="grid-5 global-list">
                <?php 

                foreach($watch as $videos):

                    $key = explode('.', $videos[0]);

                    if($key[0] == 'cfv') {
                        // videos
                        $video_detail      = $this->db->get_where('videos' , array('videos_id' => $key[1]))->row();
                        $url         = base_url().'watch/'.$video_detail->slug.'.html';
                        $image_url   = $this->common_model->get_video_poster_url($video_detail->videos_id);

                    } else {
                    //     // episode
                        $episode     = $this->db->get_where('episodes' , array('episodes_id' => $key[1]))->row();
                        $video_slug  = $this->db->get_where('videos' , array('videos_id' => $episode->videos_id))->row()->slug;
                        $url         = base_url().'watch/'.$video_slug.'.html?key='.$episode->stream_key;
                        $image_url   = $this->common_model->get_episode_image_url($episode->episodes_id);

                    }


                ?>
                <li>
                    <div class="sg-video">
                        <div class="thumb">
                            <a href="<?php echo $url;?>"><img src="<?php echo $image_url;?>" alt="Image" class="img-fluid lazy" data-src="<?php echo $image_url;?>"></a>
                        </div>  
                        <div class="sg-progress">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $videos[1];?>%" aria-valuenow="<?php echo $videos[1];?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>                                                             
                    </div>
                </li>
                <?php 
                endforeach;
                ?>
            </ul>
        </div><!-- /.container -->
    </div><!-- /.section-content -->