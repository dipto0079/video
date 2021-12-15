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
?>

       <?php $this->load->view($theme_dir .'slider'); ?>

        <?php if($this->common_model->get_ads_status('home_header')=='1'): ?>
        <!-- header ads -->
        <section class="sg-section">
            <div class="section-content text-center">
                <div class="container">
                    <?php echo $this->common_model->get_ads('home_header'); ?>
                </div><!-- /.container -->
            </div><!-- /.section-content -->
        </section><!-- /.sg-section -->
        <!-- header ads -->
        <?php endif; ?>

        <?php

        $this->load->view($theme_dir .'continue_watching');

         foreach($homepage_sections as $homepage_section):

          if($homepage_section['content_type'] == 'live_tv_list'):
            if($all_live_tvs != 0):
              $this->load->view($theme_dir .'live_tv_list', array('homepage_section' => $homepage_section));  
            endif;
          endif;
          if($homepage_section['content_type'] == 'popular_actors'):
            if($popular_actors != 0):
              $this->load->view($theme_dir .'popular_actors', array('homepage_section' => $homepage_section)); 
            endif; 
          endif;
          if($homepage_section['content_type'] == 'latest_episodes'):
            if($latest_episodes != 0):
              $this->load->view($theme_dir .'latest_episode', array('homepage_section' => $homepage_section)); 
            endif; 
          endif;
          if($homepage_section['content_type'] == 'latest_movies'):
            if($latest_videos != 0):
              $this->load->view($theme_dir .'latest_movies', array('homepage_section' => $homepage_section)); 
            endif; 
          endif;
          if($homepage_section['content_type'] == 'latest_tvseries'):
            if($latest_tvseries != 0):
              $this->load->view($theme_dir .'latest_tvseries', array('homepage_section' => $homepage_section)); 
            endif;
          endif;
          if($homepage_section['content_type'] == 'popular_movies'):
            if($features_genres != 0):
              $this->load->view($theme_dir .'popular_movie', array('homepage_section' => $homepage_section)); 
            endif;
          endif;
          if($homepage_section['content_type'] == 'popular_tv_series'):
            if($features_genres != 0):
              $this->load->view($theme_dir .'popular_tv_series', array('homepage_section' => $homepage_section)); 
            endif;
          endif;

          if($homepage_section['content_type'] == 'genre'):
            $this->load->view($theme_dir .'genre_videos', array('homepage_section' => $homepage_section)); 
          endif;

         endforeach;

        ?>