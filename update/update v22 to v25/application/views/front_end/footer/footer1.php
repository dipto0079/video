<!-- Footer Area -->
<?php    
    $facebook_url               =   $this->db->get_where('config' , array('title'=>'facebook_url'))->row()->value;
    $twitter_url                =   $this->db->get_where('config' , array('title'=>'twitter_url'))->row()->value;
    $vimeo_url                  =   $this->db->get_where('config' , array('title'=>'vimeo_url'))->row()->value;
    $linkedin_url               =   $this->db->get_where('config' , array('title'=>'linkedin_url'))->row()->value;
    $youtube_url                =   $this->db->get_where('config' , array('title'=>'youtube_url'))->row()->value;
    $footer1_title              =   $this->db->get_where('config' , array('title'=>'footer1_title'))->row()->value;
    $footer1_content            =   $this->db->get_where('config' , array('title'=>'footer1_content'))->row()->value;
    $footer2_title              =   $this->db->get_where('config' , array('title'=>'footer2_title'))->row()->value;
    $footer2_content            =   $this->db->get_where('config' , array('title'=>'footer2_content'))->row()->value;
    $footer3_title              =   $this->db->get_where('config' , array('title'=>'footer3_title'))->row()->value;
    $footer3_content            =   $this->db->get_where('config' , array('title'=>'footer3_content'))->row()->value;
    $footer_text                =   $this->db->get_where('config' , array('title'=>'copyright_text'))->row()->value;
?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="footer-about  " >
                    <div class="movie-heading"> <span><?php echo $footer1_title; ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <img class="img-responsive" src="<?php echo base_url(); ?>uploads/system_logo/logo.png" alt="Logo">
                    <?php echo $footer1_content; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="bottom-post " >
                    <div class="movie-heading"> <span><?php echo $footer2_title; ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <?php echo $footer2_content; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="sendus  ">
                    <div class="movie-heading"> <span>Subscribe</span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <div id="contact-form">
                        <div class="expMessage"></div>
                        <p class="text-light">Subscribe to our mailing list to receive updates on movies, tv-series and news</p>
                            <input type="text" name="formInput[name]" id="name" class="form-control half-wdth-field pull-right" placeholder="Your name" required>
                            <input type="email" name="formInput[email]" id="email" class="form-control half-wdth-field pull-right" placeholder="Email" required>
                            <div>
                            <div id="error" style="display: none;"></div>
                                <a class="btn btn-success" id="subscribe-btn"> Subscribe </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area -->
<?php $this->load->view('front_end/copyright'); ?>