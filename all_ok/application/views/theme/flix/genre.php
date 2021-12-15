<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/'; 
?>
<?php if($this->common_model->get_ads_status('genre_header')=='1'): ?>
<!-- header ads -->
    <section class="sg-section">
        <div class="section-content text-center">
            <div class="container">
                <?php echo $this->common_model->get_ads('genre_header'); ?>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </section><!-- /.sg-section -->
<!-- header ads -->
<?php endif; ?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo trans('movie_by_genre'); ?>: <?php echo $genre_name; ?></h2>
            </div>
            <?php if ($total_rows>0):?>
            <ul class="grid-5 global-list">


                <?php foreach ($all_published_videos as $videos): ?>
                    <?php
                        $this->load->view($theme_dir.'movie_list', ['videos' => $videos]);
                    ?>
                <?php endforeach; ?>
               

            </ul>
            <?php else: echo "<h3 class='text-center text-uppercase'>No movie found by genre:  ".$genre_name."</h3>"; endif; ?>
            <?php if($total_rows > 24): echo $links;endif;?>

        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->