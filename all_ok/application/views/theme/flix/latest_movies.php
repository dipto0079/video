<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $registration_enable            =   ovoo_config('registration_enable');    
    $frontend_login_enable          =   ovoo_config('frontend_login_enable');    
    $country_to_primary_menu        =   ovoo_config('country_to_primary_menu');    
    $genre_to_primary_menu          =   ovoo_config('genre_to_primary_menu');
    $release_to_primary_menu        =   ovoo_config('release_to_primary_menu');    
    $contact_to_primary_menu        =   ovoo_config('contact_to_primary_menu');
    $privacy_policy_to_primary_menu =   ovoo_config('privacy_policy_to_primary_menu');
    $dmca_to_primary_menu           =   ovoo_config('dmca_to_primary_menu');
    $az_to_primary_menu             =   ovoo_config('az_to_primary_menu');
    $az_to_footer_menu              =   ovoo_config('az_to_footer_menu');
    $movie_request_enable           =   ovoo_config('movie_request_enable');
    $facebook_url                   =   ovoo_config('facebook_url');
    $twitter_url                    =   ovoo_config('twitter_url');
    $vimeo_url                      =   ovoo_config('vimeo_url');
    $linkedin_url                   =   ovoo_config('linkedin_url');
    $youtube_url                    =   ovoo_config('youtube_url');
    $business_phone                 =   ovoo_config('business_phone');
    $contact_email                  =   ovoo_config('contact_email'); 

?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo $homepage_section['title']; ?></h2>
            </div>
            
            <ul class="grid-5 global-list global-align">
                <?php
                    foreach($latest_videos as $videos):
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