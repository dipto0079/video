<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $g_login_enable                 = $this->db->get_where('config' , array('title' =>'google_login_enable'))->row()->value;
    $f_login_enable                 = $this->db->get_where('config' , array('title' =>'facebook_login_enable'))->row()->value;
    $registration_enable            = $this->db->get_where('config' , array('title' =>'registration_enable'))->row()->value;
    $registration_enable            =   $this->db->get_where('config' , array('title' =>'registration_enable'))->row()->value;    
    $recaptcha_enable               =   $this->db->get_where('config' , array('title' =>'recaptcha_enable'))->row()->value;    
?>
<section class="sg-section bg-image" style="background-image: url(<?php echo base_url($assets_dir); ?>images/bg/ragister-bg.jpg);">
    <div class="section-content ragister-account">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="account-content">
                    <h1>Sign Up</h1>
                    
                    <form class="ragister-form" name="ragister-form" method="post" action="<?php echo base_url().'user/signup/do_signup'; ?>">
                        <div class="form-group mb-0">
                            <?php if($this->session->flashdata('sign_up_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('sign_up_success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('sign_up_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('sign_up_error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-0">
                            <div class="input-group-prepend">
                                <img src="<?php echo base_url($assets_dir); ?>images/others/icon1.svg" alt="Svg" class="img-fluid">
                            </div>                                    
                            <input type="text" name="name" class="form-control" required="required" placeholder="Full Name">
                        </div>
                        <div class="form-group mb-0">
                            <div class="input-group-prepend">
                                <img src="<?php echo base_url($assets_dir); ?>images/others/icon3.svg" alt="Svg" class="img-fluid">
                            </div>                                    
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group mb-0">
                            <div class="input-group-prepend">
                                <img src="<?php echo base_url($assets_dir); ?>images/others/icon2.svg" alt="Svg" class="img-fluid">
                            </div>   
                            <input type="password" name="password" class="form-control" required="required" placeholder="Password">
                        </div>
                        <div class="form-group mb-0">
                            <div class="input-group-prepend">
                                <img src="<?php echo base_url($assets_dir); ?>images/others/icon2.svg" alt="Svg" class="img-fluid">
                            </div>   
                            <input type="password" name="password2" class="form-control" required="required" placeholder="Confirm Password">
                        </div>
                        <div class="form-group mb-4">
                            <?php if($recaptcha_enable == '1'): echo $this->recaptcha->create_box(); endif;?>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo trans('sign_up'); ?></button>
                        <?php if($g_login_enable == '1' || $f_login_enable == '1'): ?>
                        <div class="buttons">
                            <?php if($this->db->get_where('config' , array('title' =>'facebook_login_enable'))->row()->value =='1'): ?>
                                <a class="facebook" href="<?php echo $facebook_login_url; ?>"><span class="mdi mdi-facebook"></span><?php echo trans('connect_with_facebook'); ?></a>
                            <?php endif; ?>
                            <?php if($this->db->get_where('config' , array('title' =>'google_login_enable'))->row()->value =='1'): ?>
                                <a class="google-plus" href="<?php echo $login_url; ?>"><span class="mdi mdi-google-plus"></span><?php echo trans('connect_with_google'); ?></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>                                               
                    </form><!-- /.contact-form -->
                    <?php if(ovoo_config('frontend_login_enable') =='1'): ?>
                    <div class="form-footer">
                        <span><?php echo trans('already_have_an_account'); ?>?</span>
                        <a href="<?php echo base_url('user/login'); ?>"><?php echo trans('sign_in'); ?></a>
                    </div> 
                    <?php endif; ?> 

                </div> 
                <div class="sg-thumb" style="background-image: url(<?php echo base_url($assets_dir); ?>images/others/ragister.jpg);"></div>                       
            </div>     
        </div><!-- /.container -->
    </div>
</section><!-- /.sg-section --> 