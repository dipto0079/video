<?php

  $theme_dir              =   'theme/'.ovoo_config('active_theme').'/';
  $assets_dir             =   'assets/theme/'.ovoo_config('active_theme').'/';
  $header_templete        =   ovoo_config('header_templete');
  $slider_type            =   ovoo_config('slider_type');
  $slider_fullwide        =   ovoo_config('slider_fullwide');
  $slider_height          =   ovoo_config('slider_height').'px';
  $slider_border_radius   =   ovoo_config('slider_border_radius').'px';
  $slider_arrow           =   ovoo_config('slider_arrow');
  $slider_bullet          =   ovoo_config('slider_bullet');
  $total_movie_in_slider  =   ovoo_config('total_movie_in_slider');
  $genre_videos           =   $this->genre_model->get_video_by_genre_id($homepage_section['genre_id'], 10);

  $genre_name          = $this->genre_model->get_genre_name_by_id($homepage_section['genre_id']);

?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo $genre_name; ?></h2>
            </div>
            
            <ul class="grid-5 global-list global-align">
                <?php 
                    foreach($genre_videos as $videos):
                ?>
                <li>
                    <?php include 'application/views/theme/flix/thumbnail.php'; ?>
                </li>
                <?php 
                    endforeach;
                ?>

            </ul>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->