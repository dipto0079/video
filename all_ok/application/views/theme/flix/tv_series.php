<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
?>

<?php $this->load->view($theme_dir .'tv_series_slider'); ?> 

<?php if($this->common_model->get_ads_status('tv_header')=='1'): ?>
<!-- header ads -->
    <section class="sg-section">
        <div class="section-content text-center">
            <div class="container">
                <?php echo $this->common_model->get_ads('tv_header'); ?>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </section><!-- /.sg-section -->
<!-- header ads -->
<?php endif; ?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php if(isset($title)){ echo $title;}else{ echo "Watch free TV Series";} ?></h2>
            </div>
            <?php if ($total_rows>0):?>
            <ul class="grid-5 global-list">


                <?php foreach ($all_published_videos as $videos): ?>
                    <?php
                        $this->load->view($theme_dir.'movie_list', ['videos' => $videos]);
                    ?>
                <?php endforeach; ?>
               

            </ul>
            <?php else: echo "<center><h3>".trans('no_series_found')."</h3></center>"; endif; ?>
            <?php if($total_rows > 24): echo $links;endif;?>

        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->