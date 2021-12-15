<div class="row">
    <div class="col-md-12">
        <div class="similler-movie">
            <div class="movie-heading overflow-hidden"> <span class="fadeInUp" data-wow-duration="0.8s"> You May Like </span>
                <div class="disable-bottom-line" data-wow-duration="0.8s"> </div>
            </div>
            <div class="row">
                <div class="movie-container">
                    <?php
                        $i      = 0;
                        if($watch_videos->is_tvseries == '1'):
                            $related_videos = $this->common_model->get_related_tvseries($watch_videos->videos_id,$watch_videos->genre);
                        else:   
                            $related_videos = $this->common_model->get_related_movie($watch_videos->videos_id,$watch_videos->genre);
                        endif;
                        //var_dump($related_videos);        
                        foreach ($related_videos as $v):
                            $i++;
                    ?>
                    <div class="col-md-2 col-sm-3 col-xs-2">
                        <div class="latest-movie-img-container">
                            <div class="movie-img"> <img class="img-responsive lazy" src="<?php echo base_url('uploads/default_image/blank_thumbnail.jpg');?>" data-src="<?php echo $this->common_model->get_video_thumb_url($v['videos_id']); ?>" alt="<?php echo $v['title'];?>"> <a href="<?php echo base_url('watch/'.$v['slug']).'.html';?>" class="ico-play ico-play-sm"> <img class="img-responsive play-svg svg" src="<?php echo base_url(); ?>assets/front_end/images/play-button.svg" alt="play" onerror="this.src='<?php echo base_url(); ?>assets/front_end/images/play-button.png'"> </a>
                                <div class="overlay-div"></div>
                                <div class="video_quality"><span class="label label-primary"><?php echo $v['video_quality'] ?></span></div>
                                <div class="movie-title"><h3><a href="<?php echo base_url('watch/'.$v['slug']).'.html';?>"><?php echo $v['title'];?></a></h3></div>
                            </div>
                        </div>
                    </div>
                    <?php if($i%6==0){ echo "</div></div><div class='row'><div class='movie-container'>";} ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>