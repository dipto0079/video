<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><span><?php echo $category_info[0]['live_tv_category']; ?></h2>
            </div>
            <ul class="grid-5 global-list">
                <?php
                foreach ($channels as $tv): ?>
                        <li>
                            <div class="sg-video">
                                <div class="thumb">
                                    <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                                        <img src="<?php echo base_url('uploads/default_image_flix/image_336X190.png'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" class="img-fluid lazy">
                                    </a>
                                </div>
                            </div>
                        </li>
                <?php endforeach; 
                 ?>
            </ul>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->