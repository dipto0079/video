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


   if(ovoo_config('tv_series_page_slider') == '1'):
  ?>

<section id="hero-slider" class="hero-section carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
         
            $this->db->limit($total_movie_in_slider);
            $this->db->order_by("videos_id","desc");
            $slider_videos = $this->db->get_where('videos', array('publication'=>'1', 'is_tvseries' => 1))->result();
            $i = 0;
            foreach ($slider_videos as $videos):

        ?>
        <div class="carousel-item <?php echo ++$i == 1? 'active':''?>" style="background-image: url('<?php echo $this->common_model->get_video_poster_url($videos->videos_id); ?>');">
            <div class="container">
                <div class="hero-text">
                    <h1><?php echo trans('movie'); ?></h1>
                    <ul class="category">

                        <?php 
                            if($videos->genre !='' && $videos->genre !=NULL):
                            $i = 0;
                            $genres =explode(',', $videos->genre);                                                
                            foreach ($genres as $genre_id):
                            if($i>0){ echo ' ';} $i++;?>

                            <li><a href="<?php echo base_url('genre/'.$this->genre_model->get_genre_slug_by_id($genre_id).'.html'); ?>"><?php echo $this->genre_model->get_genre_name_by_id($genre_id); ?></a></li>
                            <?php endforeach; endif;
                        ?>
                    </ul>
                    <h2><?php echo substr(strip_tags($videos->title),0,20);?></h2>
                    <ul class="meta">
                        <li><?php echo date('Y', strtotime($videos->release)); ?></li>
                        <li><?php echo $videos->imdb_rating;?></li>
                        <li><?php echo $videos->runtime; ?></li>
                    </ul>
                    <div class="description">
                        <p><?php echo substr(strip_tags($videos->description),0,220);?></p>
                    </div>
                    <div class="buttons">
                        <a href="<?php echo base_url('watch/'.$videos->slug).'.html';?>" class="btn btn-primary"><span class="mdi mdi-name mdi-play"></span> <?php echo trans('watch_now') ?></a>
                    </div>
                </div>
            </div>
        </div>

      <?php endforeach; ?>


    </div>
    <ol class="carousel-indicators">
        <?php
          
            foreach ($slider_videos as $key => $videos): 
        ?>
            <li data-target="#hero-slider" data-slide-to="<?php echo $key;?>" class="<?php echo $key == 0? 'active':''?>"></li>
        <?php 
            endforeach;
         
        ?>
    </ol>
</section><!-- /.hero-section -->

<?php endif; ?>

