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
    <div class="section-content profile-content">
        <div class="container">
            <div class="title">
                <h2><?php echo trans('profile_information'); ?></h2>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="profile-tabs">

                        <?php $this->load->view($theme_dir .'profile_menu'); ?>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="user-one" role="tabpanel" aria-labelledby="user-one-tab">
                                <div class="profile-section">
                                    <div class="tab-header">
                                        <h2><?php echo trans('profile'); ?></h2>
                                        <p><?php echo trans('your_account_profile_information'); ?></p>
                                    </div><!-- header -->
                                    <div class="tab-body">
                                        <ul class="global-list">
                                            <li><?php echo trans('full_name'); ?>: <?php echo $profile_info->name; ?></li>
                                            <li><?php echo trans('email'); ?>: <?php echo $profile_info->email; ?></li>
                                            <li><?php echo trans('join_date'); ?> : <?php echo date('d M Y',strtotime($profile_info->join_date)); ?></li>
                                            <li><?php echo trans('last_login'); ?> : <?php echo date('Y-m-d H:i:s',strtotime($profile_info->last_login)); ?></li>
                                            <li><?php echo trans('gender'); ?> : <?php if($profile_info->gender=='1'){echo trans('male');}elseif($profile_info->gender=='2'){echo trans('female');}else{ echo 'N/a';} ?></li>
                                        </ul>
                                    </div><!-- tab-body -->
                                    <div class="tab-footer">
                                        <div class="form-group">
                                            <a href="<?php echo base_url('my-account/update'); ?>" class="btn btn-primary"><?php echo trans('edit_account_info'); ?></a>
                                        </div>
                                    </div><!-- tab-footer -->
                                </div> 
                            </div>
                        </div>                            
                    </div>                             
                </div>
            </div><!-- /.row -->                       
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section --> 