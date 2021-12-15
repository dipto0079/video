<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $movie_per_page                 =   $this->db->get_where('config' , array('title'=>'movie_per_page'))->row()->value;
    
?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo trans('star'); ?>: <?php echo $star_name; ?></h2>
            </div>
            <?php if($total_rows > 0){  ?>
            <ul class="grid-5 global-list">


                <?php foreach ($all_published_videos as $videos): ?>
                    <?php
                        $this->load->view($theme_dir.'movie_list', ['videos' => $videos]);
                    ?>
                <?php endforeach; ?>
               

            </ul>
            <?php if($total_rows > $movie_per_page){ echo $links; } }else{ echo '<center><h3>'.trans("no_movie_found").'</h3></center>'; } ?>

        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->