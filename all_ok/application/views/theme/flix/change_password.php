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
    $success_msg                    =   $this->session->flashdata('success');
    $error_msg                      =   $this->session->flashdata('error');  

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
                        <div class="tab-content">
                            <div class="tab-pane show active">
                                <div class="profile-section">
                                    <div class="tab-header">
                                        <h2><?php echo trans('change_password'); ?></h2>
                                        <p><?php echo trans('password_change_and_new_password_generate'); ?></p>
                                    </div><!-- header -->
                                    <form id="profile-form" action="<?php echo base_url().'user/change_password/update'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="tab-body">
                                            <div class="form-group mb-0">
                                                <?php if($success_msg !=''):?>
                                                    <div class="alert alert-success">
                                                       <?php echo $success_msg; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($error_msg !=''):?>
                                                    <div class="alert alert-danger">
                                                      <?php echo $error_msg; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="first-name1"><?php echo trans('old_password'); ?></label>
                                                <input type="password" name="password" class="form-control" id="first-name1" placeholder="Enter Old Password" required="">
                                            </div>   
                                            <div class="form-group">
                                                <label for="last-name1"><?php echo trans('new_password'); ?></label>
                                                <input type="password" name="new_password" class="form-control" id="last-name1" placeholder="Enter New Password" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="twitter1"><?php echo trans('new_password_again'); ?></label>
                                                <input type="password" name="retype_new_password" class="form-control" id="twitter1" placeholder="Enter New Password" required="">
                                            </div> 
                                        </div><!-- tab-body -->
                                        <div class="tab-footer">
                                            <div class="form-group"><input type="submit" class="btn btn-primary" value="Save Change"></div>
                                        </div><!-- tab-footer -->
                                    </form>
                                </div>   
                            </div>
                        </div>                            
                    </div>                             
                </div>
            </div><!-- /.row -->                       
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->    