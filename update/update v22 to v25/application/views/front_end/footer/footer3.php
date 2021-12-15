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
    $site_name                  =   $this->db->get_where('config' , array('title'=>'site_name'))->row()->value;
    $about_us_enable            =   $this->db->get_where('config' , array('title'=>'about_us_enable'))->row()->value;
    $about_us_to_footer_menu    =   $this->db->get_where('config' , array('title'=>'about_us_to_footer_menu'))->row()->value;
    $about_us_text              =   $this->db->get_where('config' , array('title'=>'about_us_text'))->row()->value;
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front_end/css/'); ?>footer-with-logo.css">
<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5><?php echo $footer1_title; ?></h5>
                <?php echo $footer1_content; ?>
            </div>
            <div class="col-sm-3">
                <h5><?php echo $footer2_title; ?></h5>
                <?php echo $footer1_content; ?>
            </div>
            <div class="col-sm-2">
                <h5>Links</h5>
                <ul>
                    <?php $all_video_type_on_footer_menu= $this->common_model->all_video_type_on_footer_menu();
                        foreach ($all_video_type_on_footer_menu as $video_type):
                    ?>
                    <li><a href="<?php echo base_url().'type/'.$video_type->slug?>"><?php echo $video_type->video_type;?></a></li>
                    <?php endforeach; ?>
                    <?php $all_page_on_footer_menu= $this->common_model->all_page_on_footer_menu();
                        foreach ($all_page_on_footer_menu as $pages):                                                
                    ?>
                    <li><a href="<?php echo base_url().'page/'.$pages->slug.'.html';?>"><?php echo $pages->page_title?></a></li>
                    <?php endforeach; ?>
                    <?php if($about_us_enable =='1' && $about_us_to_footer_menu =='1'):?>
                    <li><a href="<?php echo base_url('about-us.html')?>">About Us</a></li>
                    <?php endif; ?>                 
                </ul>
            </div>
            <div class="col-sm-3 info">
                <h5>About</h5>
                <p> <?php echo $about_us_text; ?> </p>
            </div>
        </div>
    </div>
    <div class="second-bar">
       <div class="container">
            <h2 class="logo"><a href="<?php echo base_url(); ?>"> <img class="img-responsive" src="<?php echo base_url() ?>uploads/system_logo/logo.png" alt="Logo"> </a></h2>
            <div class="social-icons">
                <?php if($twitter_url !=''): ?>                    
                <a href="<?php echo $twitter_url; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
                <?php endif; if($facebook_url !=''): ?>
                <a href="<?php echo $facebook_url; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
                <?php endif; if($vimeo_url !=''): ?>
                <a href="<?php echo $vimeo_url; ?>" class="google"><i class="fa fa-vimeo"></i></a>
                <?php endif; if($youtube_url !=''): ?>
                <a href="<?php echo $youtube_url; ?>" class="google"><i class="fa fa-youtube"></i></a>
                <?php endif; if($linkedin_url !=''): ?>
                <a href="<?php echo $linkedin_url; ?>" class="google"><i class="fa fa-linkedin"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
