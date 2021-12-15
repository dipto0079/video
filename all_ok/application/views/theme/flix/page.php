<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $movie_per_page                 =   $this->db->get_where('config' , array('title'=>'movie_per_page'))->row()->value; 
?>
<?php if($this->common_model->get_ads_status('type_header')=='1'): ?>
<!-- header ads -->
    <section class="sg-section">
        <div class="section-content text-center">
            <div class="container">
                <?php echo $this->common_model->get_ads('type_header'); ?>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </section><!-- /.sg-section -->
<!-- header ads -->
<?php endif; ?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo $page_details->page_title;?></h2>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <?php echo $page_details->content;?>
            </div>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->