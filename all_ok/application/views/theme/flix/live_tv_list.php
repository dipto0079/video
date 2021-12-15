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
            <div class="tv-slider">
                <?php
                    foreach($all_live_tvs as $all_live_tv):
                ?>
                <div class="sg-tv">
                    <a href="<?php echo base_url('live-tv/').$all_live_tv['slug'].'.html'; ?>"><img class="lazy img-fluid" src="<?php echo base_url('uploads/default_image_flix/image_189X118.png'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($all_live_tv['poster']); ?>" alt="<?php echo $all_live_tv['tv_name']; ?>" /></a>
                </div>
                <?php
                    endforeach;
                ?>

            </div>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->