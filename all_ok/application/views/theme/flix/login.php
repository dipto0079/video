<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $g_login_enable            = $this->db->get_where('config' , array('title' =>'google_login_enable'))->row()->value;
    $f_login_enable            = $this->db->get_where('config' , array('title' =>'facebook_login_enable'))->row()->value;   
    $recaptcha_enable          =   $this->db->get_where('config' , array('title' =>'recaptcha_enable'))->row()->value;    
?>
<section class="sg-section bg-image" style="background-image: url(<?php echo base_url($assets_dir); ?>images/bg/ragister-bg.jpg);">
    <div class="section-content ragister-account">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="account-content">
                    <h1><?php echo trans('sign_in'); ?></h1>
                    <form class="ragister-form" name="ragister-form" method="post" action="<?php echo base_url().'user/do_login'; ?>">
                        <div class="form-group mb-0">
                            <?php if($this->session->flashdata('login_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('login_success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('login_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('login_error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-0">
                            <div class="input-group-prepend">
                                <img src="<?php echo base_url($assets_dir); ?>images/others/icon1.svg" alt="Svg" class="img-fluid">
                            </div>                                    
                            <input type="text" name="email" id="login_email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group mb-0">
                            <div class="input-group-prepend">
                                <img src="<?php echo base_url($assets_dir); ?>images/others/icon2.svg" alt="Svg" class="img-fluid">
                            </div>   
                            <input type="password" name="password" id="login_password" class="form-control" required="required" placeholder="Password">
                        </div>
                        <div class="form-group mb-4">
                            <?php if($recaptcha_enable == '1'): echo $this->recaptcha->create_box(); endif;?>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo trans('sign_in'); ?></button>
                        <div class="middle-content">
                            <div class="form-group">
                                <input type="checkbox" id="remember">
                                <label for="remember"><?php echo trans('remember_me'); ?></label>
                            </div>                                    
                            <a href="<?php echo base_url().'user/forget_password'; ?>"><?php echo trans('forget_password?'); ?></a>
                        </div>
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
                    <?php if(ovoo_config('registration_enable') =='1'): ?>    
                    <div class="form-footer">
                        <span><?php echo trans('need_new_Account'); ?> ?</span>
                        <a href="<?php echo base_url('user/registration'); ?>"><?php echo trans('sign_up'); ?></a>
                    </div> 
                    <?php endif; ?>  
                </div> 
                <div class="sg-thumb" style="background-image: url(<?php echo base_url($assets_dir); ?>images/others/ragister.jpg);"></div>                       
            </div>     
        </div><!-- /.container -->
    </div>
</section><!-- /.sg-section -->  