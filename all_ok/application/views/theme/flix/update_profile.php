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
                                                <h2><?php echo trans('profile'); ?></h2>
                                                <p><?php echo trans('add_information_about_yourself_to_share_on_your_profile'); ?></p>
                                            </div><!-- header -->
                                            <form id="profile-form" action="<?php echo base_url().'user/profile/update'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                                                        <label for="avatar" class="col-sm-4 control-label"><?php echo trans('avatar'); ?></label>

                                                        <div class="col-sm-12 text-center">
                                                            <div class="block avatar mb10">
                                                                <img class="img img-circle m-b-10" width="180" alt="<?php echo $profile_info->name; ?>" src="<?php echo $this->common_model->get_img('user', $profile_info->user_id).'?'.time(); ?>">
                                                            </div>
                                                            <input name="photo" type="file" id="avatar" class="btn btn-secondary ">

                                                            <p class="help-block small"><?php echo trans('accepted').': JPG, PNG,'.trans('Photo_square').' '.trans('limit:_2mb'); ?></p>
                                                            <p class="help-block small"><?php echo trans(''); ?></p>
                                                            <span id="error-avatar" class="help-block error-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="first-name1"><?php echo trans('full_name'); ?></label>
                                                        <input name="name" type="text" class="form-control" id="full_name" value="<?php echo $profile_info->name; ?>">
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="last-name1"><?php echo trans('email'); ?></label>
                                                        <input readonly="" type="email" class="form-control" id="email" value="<?php echo $profile_info->email; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twitter1"><?php echo trans('phone'); ?></label>
                                                        <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $profile_info->phone; ?>">
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1"><?php echo trans('date_of_birth'); ?></label>
                                                                <input name="dob" type="text" class="form-control" id="dob" value="<?php echo date("m-d-Y", strtotime($profile_info->dob)); ?>">
                                                            </div>   
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website2"><?php echo trans('gender'); ?></label>
                                                                <select name="gender" class="form-control" id="gender">
                                                                    <option value="1" <?php if($profile_info->gender =='1'){echo 'selected';}  ?>><?php echo trans("male");?></option>
                                                                    <option value="2" <?php if($profile_info->gender =='2'){echo 'selected';}  ?>><?php echo trans("female");?></option>
                                                                    <option value="0" <?php if($profile_info->gender =='0'){echo 'selected';}  ?>><?php echo trans("none");?></option>
                                                                </select>
                                                            </div>   
                                                        </div>
                                                    </div>    
                                                </div><!-- tab-body -->

                                                <div class="tab-footer">
                                                    <div class="form-group"><input type="submit" class="btn btn-primary" value="<?php echo trans('save_changes'); ?>"></div>
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