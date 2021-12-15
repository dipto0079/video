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
            <div class="actors-slider">
                <?php
                    foreach($popular_actors as $popular_actor):
                ?>

                <div class="sg-actors">
                    <a href="<?php echo base_url().'star/'.$this->common_model->get_star_slug_by_id($popular_actor['star_id']);?>"><img src="<?php echo $this->common_model->get_img('star', $popular_actor['star_id']); ?>" alt="<?php echo $popular_actor['star_name']; ?>_photo" class="img-fluid rounded-circle"></a>
                    <h3 class="pt-3"><?php echo $popular_actor['star_name']; ?></h3>
                </div>

                <?php
                    endforeach;
                ?>
            </div>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->