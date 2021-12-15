<?php
    $facebook_url               =   ovoo_config('facebook_url');
    $twitter_url                =   ovoo_config('twitter_url');
    $vimeo_url                  =   ovoo_config('vimeo_url');
    $linkedin_url               =   ovoo_config('linkedin_url');
    $youtube_url                =   ovoo_config('youtube_url');
    $footer1_title              =   ovoo_config('footer1_title');
    $footer1_content            =   ovoo_config('footer1_content');
    $footer2_title              =   ovoo_config('footer2_title');
    $footer2_content            =   ovoo_config('footer2_content');
    $footer3_title              =   ovoo_config('footer3_title');
    $footer3_content            =   ovoo_config('footer3_content');
    $footer_text                =   ovoo_config('copyright_text');
    $business_address           =   ovoo_config('business_address');
    $system_email               =   ovoo_config('system_email');
    $business_phone             =   ovoo_config('business_phone');
?>
<footer class="footer-section footer-bg">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <div class="footer-social">
                                    <ul class="global-list">
                                        <li><a href="<?php echo $facebook_url; ?>"><span class="mdi mdi-name mdi-facebook"></span></a></li>
                                        <li><a href="<?php echo $youtube_url; ?>"><span class="mdi mdi-name mdi-youtube"></span></a></li>
                                        <li><a href="<?php echo $twitter_url; ?>"><span class="mdi mdi-name mdi-twitter"></span></a></li>
                                        <li><a href="<?php echo $linkedin_url; ?>"><span class="mdi mdi-name mdi-linkedin"></span></a></li>
                                        <li><a href="<?php echo $vimeo_url; ?>"><span class="mdi mdi-name mdi-vimeo"></span></a></li>
                                    </ul>
                                </div>   
                                <ul class="global-list">
                                    <li><?php echo $business_address;?></li>
                                    <li><?php echo $business_phone;?></li>
                                    <li><?php echo $system_email;?></li>
                                </ul>
                                <p> <?php echo $footer_text;?> </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h2> <?php echo $footer1_title; ?></h2>
                                <?php echo $footer1_content; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h2> <?php echo $footer2_title; ?></h2>
                                <?php echo $footer2_content; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h2> <?php echo $footer3_title; ?></h2>
                                <?php echo $footer3_content; ?>
                            </div>
                        </div>
                    </div><!-- /.row -->                    
                </div><!-- /.container -->
            </div><!-- /.footer-top -->
        </footer><!-- /.footer-section --> 