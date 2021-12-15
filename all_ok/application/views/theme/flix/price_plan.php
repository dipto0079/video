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
    $currency_symbol              =   $this->db->get_where('config' , array('title'=>'currency_symbol'))->row()->value;
    $offline_payment_enable       =   $this->db->get_where('config' , array('title'=>'offline_payment_enable'))->row()->value;
    // paypal
    $paypal_enable              = true;
    $query                                  = $this->db->get_where('config' , array('title'=>'paypal_enable'));
    if($query->num_rows() >0):
        if($query->first_row()->value == "false"):
            $paypal_enable= false;
        endif;
    endif;
    // stripe
    $stripe_enable              = true;
    $query                                  = $this->db->get_where('config' , array('title'=>'stripe_enable'));
    if($query->num_rows() >0):
        if($query->first_row()->value == "false"):
            $stripe_enable= false;
        endif;
    endif;
    $razorpay_enable            = true;
    $query                                  = $this->db->get_where('config' , array('title'=>'razorpay_enable'));
    if($query->num_rows() >0):
        if($query->first_row()->value == "false"):
            $razorpay_enable= false;
        endif;
    endif;
?>

 <section class="sg-section">
    <div class="section-content pricing-section text-center">
        <div class="container">
            <div class="title">
               <h2>upgrade membership</h2> 
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="pricing-content">
                        <div class="pricing-header">
                            <h2>Purchase a Plan</h2>
                            <p>Select a Plan to process payment</p>
                        </div>
                        <form method="post" action="">
                        <div class="row">
                            <?php 
                              $sl = 0;
                              $num_result = count($plans);
                              foreach ($plans as $plan):
                              $sl++;
                            ?>
                            <div class="col-md-4">
                                <div class="pricing">
                                    <input type="radio" id="<?php echo $plan['name']; ?>" name="plan_id" value="<?php echo $plan['plan_id']; ?>" <?php if($sl == 2): echo 'checked'; endif; ?>>
                                    <label for="<?php echo $plan['name']; ?>">
                                        <h3><?php echo $plan['name']; ?></h3>
                                        <span><?php echo $currency_symbol.''.$plan['price']; ?></span>
                                        <span><?php echo $plan['day']; ?> <?php echo trans("days");?></span>
                                        <span><?php echo trans("unlimited_movies_and_series");?></span>
                                        <span><?php echo trans("unlimited_live_tv");?></span>
                                        <span><?php echo trans("cancel_anytime");?></span>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div><!-- /.row -->
                        <div class="pricing-footer">
                            <ul class="global-list">
                                <?php if($paypal_enable): ?>
                                <li>
                                    <button type="submit" id="paypal-btn" class="paypal-buy-now-button" formaction="<?php echo base_url('subscription/paypal/process');?>">
                                        <input type="radio" id="card1" name="card" value="card1" checked="">
                                        <label for="card1"><img src="<?php echo base_url($assets_dir); ?>images/others/logo1.png" alt="Image" class="img-fluid"></label>
                                    </button>
                                </li>
                                <?php endif; ?>
                                <?php if($stripe_enable): ?>
                                <li>
                                    <button type="submit" id="stripe-btn" formaction="<?php echo base_url('subscription/stripe_payment');?>">
                                        <input type="radio" id="card2" name="card" value="card2">
                                        <label for="card2"><img src="<?php echo base_url($assets_dir); ?>images/others/logo3.png" alt="Image" class="img-fluid"></label>
                                    </button>
                                </li>
                                <?php endif; ?>
                                <?php if($razorpay_enable): ?>
                                <li>
                                    <button type="submit" id="razorpay-btn" formaction="<?php echo base_url('subscription/razorpay_payment');?>">
                                        <input type="radio" id="card3" name="card" value="card3">
                                        <label for="card3"><img src="<?php echo base_url($assets_dir); ?>images/others/razorpay.png" alt="Image" class="img-fluid"></label>
                                    </button>
                                </li>
                                <?php endif; ?>
                                <?php if($offline_payment_enable): ?>
                                <li>
                                    <button type="button" class="btn btn-offline"><?php echo ovoo_config('offline_payment_title'); ?></button>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div> 
                        </form>                             
                    </div><!-- /.pricing-content -->                            
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
</section><!-- /.sg-section -->       