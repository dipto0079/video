<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
?>

<?php if($this->common_model->get_ads_status('home_header')=='1'): ?>
<!-- header ads -->
<section class="sg-section pt-0">
    <div class="section-content text-center">
        <div class="container">
            <?php echo $this->common_model->get_ads('home_header'); ?>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->
<!-- header ads -->
<?php endif; ?>


<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><span><?php echo trans('all_tv_channels'); ?></h2>
            </div>
            <?php if($total_rows > 0){  ?>
            <ul class="grid-5 global-list">
                <?php

                foreach ($all_published_channels as $tv):
                ?>
                        <li>
                            <div class="sg-video">
                                <div class="thumb">
                                    <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>"><img src="<?php echo base_url('uploads/default_image_flix/image_336X190.png'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" class="img-fluid lazy"></a>
                                </div>
                            </div>
                        </li>
                <?php endforeach; 
                ?>
            </ul>
            <?php if($total_rows > 20){ echo $links; } }else{ echo '<center><h3>'.trans("no_channel_found").'</h3></center>'; } ?>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->




