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
<section class="sg-section popular-movie-tv">
    <div class="section-content">
        <div class="container">
            <div class="title border-bottom">
                <div class="left-content">
                    <div class="d-flex">
                        <h2><?php echo $homepage_section['title']; ?></h2> 
                    </div>                  
                </div>
                
                <div class="right-content">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                            foreach($features_genres as $key=>$features_genre):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $key == 0? 'active':'';?>" id="tv-<?php echo $features_genre['name'];?>-tab" data-toggle="tab" href="#tv-<?php echo $features_genre['name'];?>" role="tab" aria-controls="tv-<?php echo $features_genre['name'];?>" aria-selected="<?php echo $key == 0? 'true':'false'; ?>"><?php echo $features_genre['name'];?></a>
                        </li>
                        <?php
                            endforeach;
                        ?>
                    </ul>                            
                </div>
            </div>
            
            <div class="tab-content">
                <?php
                    foreach($features_genres as $key=>$features_genre):
                ?>  
                <div class="tab-pane fade <?php echo $key == 0? 'show active':'';?>" id="tv-<?php echo $features_genre['name'];?>" role="tabpanel" aria-labelledby="<?php echo $features_genre['name'];?>-tab">
                    <ul class="grid-5 global-list global-align">
                        <?php
                            foreach($this->genre_model->get_popular_tvseries_by_genre_id($features_genre['genre_id'], 10) as $videos):
                        ?>
                        <li>
                            <?php include 'application/views/theme/flix/thumbnail_poster.php'; ?>
                        </li>
                        <?php
                            endforeach;
                        ?>
                    </ul>                            
                </div>
                <?php
                    endforeach;
                ?>
            </div>                    
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->