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


<?php if($this->live_tv_model->get_featured_tv_status()): ?>
<section class="sg-section tv-channels">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo trans('featured_tv_channels'); ?></h2>
            </div>
            <div class="tv-slider">
                
                <?php
                $featured_tvs =$this->live_tv_model->get_featured_live_tv();
                foreach ($featured_tvs as $tv):
                ?>
                <div class="sg-tv">
                    <?php if($tv['is_paid'] == '1'):?>
                                <span class="tv-ribbon">VIP</span> 
                            <?php endif; ?> 
                    <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                        <img class="lazy" src="<?php echo base_url('uploads/default_image/tv_poster.jpg'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" />
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->
<?php endif; ?>



<?php if($this->live_tv_model->get_tv_status()): ?>
<section class="sg-section tv-channels">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo trans('all_tv_channels'); ?></h2>
            </div>
            <div class="tv-slider">
                <?php
                $all_tvs =$this->live_tv_model->get_all_live_tv();
                foreach ($all_tvs as $tv):
                ?>
                <div class="sg-tv">
                    <?php if($tv['is_paid'] == '1'):?>
                        <span class="tv-ribbon">VIP</span> 
                    <?php endif; ?> 
                    <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                        <img class="lazy" src="<?php echo base_url('uploads/default_image/tv_poster.jpg'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" />
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->
<?php endif; ?>


<?php
    $live_tv_categories = $this->live_tv_model->get_all_live_tv_category();
    foreach ($live_tv_categories as $live_tv_category):
    $tvs = $this->live_tv_model->get_live_tv_by_category_id($live_tv_category['live_tv_category_id']);
    if(count($tvs) > 0):
?>
<section class="sg-section tv-channels">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo $live_tv_category['live_tv_category']; ?></h2>
            </div>
            <div class="tv-slider">
                <?php foreach ($tvs as $tv): ?>
                <div class="sg-tv">
                    <?php if($tv['is_paid'] == '1'):?>
                        <span class="tv-ribbon">VIP</span> 
                    <?php endif; ?> 
                    <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                        <img class="lazy" src="<?php echo base_url('uploads/default_image/tv_poster.jpg'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" />
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->

<?php endif; ?>
<?php endforeach; ?>

