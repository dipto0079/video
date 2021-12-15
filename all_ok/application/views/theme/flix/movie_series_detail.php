<div class="top-cpntent">
                            <h2><?php echo $watch_videos->title;?></h2>
                            <div class="icons">
                                <ul class="global-list">
                                    <li class="active"><a href="#"><span class="mdi mdi-name mdi-flag-outline"></span></a></li>
                                    <li><a href="javascript:void(0);" onclick="wish_list_add('fav','<?php echo $watch_videos->videos_id;?>')"><span class="mdi mdi-name mdi-heart-outline"></span></a></li>
                                    <li><a href="javascript:void(0);" onclick="wish_list_add('wl','<?php echo $watch_videos->videos_id;?>')"><i class="fa fa-clock-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="description">
                            <p><span>Description:</span><?php echo $watch_videos->description;?> </p>
                            
                        </div><!-- /.description -->
                        <div class="short-list">
                            <ul class="global-list">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('genre'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->genre !='' && $watch_videos->genre !=NULL):
                                                    $i = 0;
                                                    $genres =explode(',', $watch_videos->genre);                                                
                                                    foreach ($genres as $genre_id):
                                                    if($i>0){ echo ','.'&nbsp;' ;} $i++;                                           ?>
                                                <a href="<?php echo $this->genre_model->get_genre_url_by_id($genre_id);?>"><?php echo $this->genre_model->get_genre_name_by_id($genre_id);?></a>
                                    <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('actor'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->stars !='' && $watch_videos->stars !=NULL):
                                                    $i = 0;
                                                    $stars =explode(',', $watch_videos->stars);                                                
                                                    foreach ($stars as $star_id):
                                                    if($i>0){ echo ',';} $i++;                                           ?>
                                                <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('director'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->director !='' && $watch_videos->director !=NULL):
                                                    $i = 0;
                                                    $stars =explode(',', $watch_videos->director);                                                
                                                    foreach ($stars as $star_id):
                                                    if($i>0){ echo ',';} $i++;                                           ?>
                                                <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('writer'); ?>: 
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->writer !='' && $watch_videos->writer !=NULL):
                                                    $i = 0;
                                                    $stars =explode(',', $watch_videos->writer);                                                
                                                    foreach ($stars as $star_id):
                                                    if($i>0){ echo ',';} $i++;                                           ?>
                                                <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($star_id);?>"><?php echo $this->common_model->get_star_name_by_id($star_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('country'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php if($watch_videos->country !='' && $watch_videos->country !=NULL):
                                                    $i = 0;
                                                    $countries =explode(',', $watch_videos->country);                                                
                                                    foreach ($countries as $country_id):
                                                    if($i>0){ echo ',';} $i++;
                                                    ?>
                                                <a href="<?php echo $this->country_model->get_country_url_by_id($country_id);?>"><?php echo $this->country_model->get_country_name_by_id($country_id);?></a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('release'); ?>: 
                                        </div>
                                        <div class="col-sm-10">
                                            <?php echo $watch_videos->release;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('duration'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php echo $watch_videos->runtime;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('quality'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php echo $watch_videos->video_quality; ?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <?php echo trans('rating'); ?>:
                                        </div>
                                        <div class="col-sm-10">
                                            <?php echo $watch_videos->rating;?>
                                        </div>
                                    </div>
                                </li>
                                <?php if($watch_videos->imdb_rating !='' && $watch_videos->imdb_rating !=NULL): ?>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="<?php echo base_url($assets_dir);?>images/imdb-logo.png">
                                        </div>
                                        <div class="col-sm-10">
                                            <?php echo $watch_videos->imdb_rating;?>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>

                                <li>
                                    <div class="row rating_selection">
                                        <div class="col-sm-2">
                                            <strong id="rated"><?php echo trans('rating'); ?>(<?php echo $watch_videos->total_rating;?>)</strong>
                                        </div>
                                        <div class="col-sm-10">
                                            <input checked id='rating_0' class="rate_now" name='rating' type='radio' value='0'>
                                            <label for='rating_0'> <span><?php echo trans('unrated'); ?></span> </label>
                                            <input id='rating_1' class="rate_now" name='rating' type='radio' value='1'>
                                            <label for='rating_1'> <span><?php echo trans('rate_1_star'); ?></span> </label>
                                            <input id='rating_2' class="rate_now" name='rating' type='radio' value='2'>
                                            <label for='rating_2'> <span><?php echo trans('rate_2_stars'); ?></span> </label>
                                            <input id='rating_3' class="rate_now" name='rating' type='radio' value='3' checked>
                                            <label for='rating_3'> <span><?php echo trans('rate_3_stars'); ?></span> </label>
                                            <input id='rating_4' class="rate_now" name='rating' type='radio' value='4'>
                                            <label for='rating_4'> <span><?php echo trans('rate_4_stars'); ?></span> </label>
                                            <input id='rating_5' class="rate_now" name='rating' type='radio' value='5'>
                                            <label for='rating_5'> <span><?php echo trans('rate_5_stars'); ?></span> </label>
                                            <br>
                                        </div>
                                    </div>
                                </li>
                                
                               
                            </ul>
                        </div>