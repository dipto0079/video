<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';  
?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo $homepage_section['title']; ?></h2>
            </div>
            
            <ul class="grid-5 global-list global-align">
                <?php
                    foreach($latest_episodes as $episode):

                        $video_slug = $this->db->get_where('videos' , array('videos_id' =>$episode['videos_id']))->row()->slug;

                ?>
                <li>
                    <div class="sg-video">
                        <div class="thumb">
                            <a href="<?php echo base_url().'watch/'.$video_slug.'.html?key='.$episode['stream_key']; ?>">
                            <img src="<?php echo base_url('uploads/default_image_flix/image_336X190.png'); ?>" alt="<?php echo $episode['episodes_name']; ?>" class="img-fluid lazy" data-src="<?php echo $this->common_model->get_episode_image_url($episode['episodes_id']); ?>"></a>
                        </div>
                    </div>
                </li>
                <?php
                    endforeach;
                ?>
            </ul>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->