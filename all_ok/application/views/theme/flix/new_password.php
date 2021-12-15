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
                    <h1><?php echo trans('enter_new_password'); ?><small></h1>
                    <form class="ragister-form" name="ragister-form" method="post" action="<?php echo base_url().'user/complete_reset/save'; ?>">
                        <input type="hidden" name="token" value="<?php if(isset($token)){ echo $token;} ?>">
                        <div class="form-group mb-0">
                            <?php if($this->session->flashdata('reset_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('reset_success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('reset_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('reset_error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-0">
                                                               
                            <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter password" required>
                        </div>
                        <div class="form-group mb-0">
                                                               
                            <input type="password" name="password2" id="password2" class="form-control" required="required" placeholder="Confirm password" required>
                        </div>
                       
                        
                        <button type="submit" class="btn btn-primary"><?php echo trans('recover'); ?></button>
                         

                    </form><!-- /.contact-form --> 
                    <?php if(ovoo_config('registration_enable') =='1'): ?>    
                    <div class="form-footer">
                        <span><?php echo trans('back_to'); ?> ?</span>
                        <a href="<?php echo base_url().'user/login'; ?>"><?php echo trans('login'); ?></a>
                    </div> 
                    <?php endif; ?>  
                </div> 
                <div class="sg-thumb" style="background-image: url(<?php echo base_url($assets_dir); ?>images/others/ragister.jpg);"></div>                       
            </div>     
        </div><!-- /.container -->
    </div>
</section><!-- /.sg-section --> 