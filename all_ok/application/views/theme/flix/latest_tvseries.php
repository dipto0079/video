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
            
            <ul class="grid-5 global-list global-align">
                <?php
                    foreach($latest_tvseries as $videos):
                ?>
                <li>
                    <?php include 'application/views/theme/flix/thumbnail.php'; ?>
                </li>
                <?php
                    endforeach;
                ?>
            </ul>
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->