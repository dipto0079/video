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

<?php if ($slider_type=="movie" || $slider_type=="image" || $slider_type=="tv"): ?>
<section id="hero-slider" class="hero-section carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
          if ($slider_type=="movie"):
            $this->db->limit($total_movie_in_slider);
            $this->db->order_by("videos_id","desc");
            $slider_videos = $this->db->get_where('videos', array('publication'=>'1'))->result();
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
      <?php 
        elseif($slider_type == "image"):
          $all_published_slider= $this->common_model->all_published_slider();
          $i = 0;
          foreach ($all_published_slider as $slider):
            $action_url = $slider->action_url;
            if($slider->action_type == 'movie' || $slider->action_type == 'tvseries' || $slider->action_type == 'tv'):
              if($slider->action_type == 'movie' || $slider->action_type == 'tvseries'):
                $action_url = base_url("watch/".$this->common_model->get_slug_by_videos_id($slider->action_id).'.html');
              elseif($slider->action_type == 'tv'):
                $action_url = base_url("live-tv/".$this->live_tv_model->get_slug_by_live_tv_id($slider->action_id).'.html');
              endif;
            endif;
      ?>

        <div class="carousel-item <?php echo ++$i == 1? 'active':''?>" style="background-image: url('<?php echo $slider->image_link;?>');">
            <div class="container">
                <div class="hero-text">
                    <h2><?php echo substr(strip_tags($slider->title),0,20);?></h2>
                    <div class="description">
                        <p><?php echo substr(strip_tags($slider->description),0,220);?></p>
                    </div>
                    <div class="buttons">
                        <a href="<?php echo $action_url;?>" class="btn btn-primary"><span class="mdi mdi-name mdi-play"></span> <?php echo $slider->action_btn_text; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php 
            elseif($slider_type == "tv"):
               $this->db->limit($total_movie_in_slider);
               $this->db->order_by("live_tv_id","desc");
              $latset_tvs = $this->db->get_where('live_tv', array('publish'=>'1'))->result();
              $i = 0;
              foreach ($latset_tvs as $slider):
                $action_url = base_url('live-tv/'.$slider->slug.'.html');
        ?>

        <div class="carousel-item <?php echo ++$i == 1? 'active':''?>" style="background-image: url('<?php echo $this->live_tv_model->get_tv_poster($slider->poster);?>');">
            <div class="container">
                <div class="hero-text">
                    <h1><?php echo trans('tv_series'); ?></h1>
                    
                    <h2><?php echo substr(strip_tags($slider->tv_name),0,20);?></h2>
                    
                    <div class="description">
                        <p><?php echo substr(strip_tags($slider->description),0,220);?></p>
                    </div>
                    <div class="buttons">
                        <a href="<?php echo $action_url;?>" class="btn btn-primary"><span class="mdi mdi-name mdi-play"></span> <?php echo trans("watch_now");?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
    <ol class="carousel-indicators">
        <?php
          if ($slider_type=="movie"): 
            foreach ($slider_videos as $key => $videos): 
        ?>
            <li data-target="#hero-slider" data-slide-to="<?php echo $key;?>" class="<?php echo $key == 0? 'active':''?>"></li>
        <?php 
            endforeach;
          endif; 
        ?>
        <?php
          if ($slider_type=="image"): 
            foreach ($all_published_slider as $key => $videos): 
        ?>
            <li data-target="#hero-slider" data-slide-to="<?php echo $key;?>" class="<?php echo $key == 0? 'active':''?>"></li>
        <?php 
            endforeach;
          endif; 
        ?>
        <?php
          if ($slider_type=="tv"): 
            foreach ($latset_tvs as $key => $videos): 
        ?>
            <li data-target="#hero-slider" data-slide-to="<?php echo $key;?>" class="<?php echo $key == 0? 'active':''?>"></li>
        <?php 
            endforeach;
          endif; 
        ?>

    </ol>
</section><!-- /.hero-section -->

<?php endif; ?>