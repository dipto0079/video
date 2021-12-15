<?php    
    $facebook_url               =   $this->db->get_where('config' , array('title'=>'facebook_url'))->row()->value;
    $twitter_url                =   $this->db->get_where('config' , array('title'=>'twitter_url'))->row()->value;
    $vimeo_url                  =   $this->db->get_where('config' , array('title'=>'vimeo_url'))->row()->value;
    $linkedin_url               =   $this->db->get_where('config' , array('title'=>'linkedin_url'))->row()->value;
    $youtube_url                =   $this->db->get_where('config' , array('title'=>'youtube_url'))->row()->value;
    $business_phone             =   $this->db->get_where('config' , array('title'=>'business_phone'))->row()->value;
    $contact_email              =   $this->db->get_where('config' , array('title'=>'contact_email'))->row()->value;
?>
<header class="topbar hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="top-info-left">
                    <a href=""><i class="fa fa-envelope"></i>  <?php echo $contact_email; ?></a>
                    <a href=""><i class="fa fa-phone"></i>  <?php echo $business_phone ; ?></a>
                </div>
            </div>            
            <!--- END COL -->
            <div class="col-xs-12 col-sm-6">
                <div class="social-icon pull-right">
                    <ul class="list-inline list-unstyled">
                    <?php
                        if($facebook_url !=''):
                            echo '<li><a href="'.$facebook_url.'"><i class="fa fa-facebook"></i></a></li>';
                        endif;
                        if($twitter_url !=''):
                            echo '<li><a href="'.$twitter_url.'"><i class="fa fa-twitter"></i></a></li>';
                        endif;
                        if($vimeo_url !=''):
                            echo '<li><a href="'.$vimeo_url.'"><i class="fa fa-vimeo"></i></a></li>';
                        endif;
                        if($linkedin_url !=''):
                            echo '<li><a href="'.$linkedin_url.'"><i class="fa fa-linkedin"></i></a></li>';
                        endif;
                        if($youtube_url !=''):
                            echo '<li><a href="'.$youtube_url.'"><i class="fa fa-youtube"></i></a></li>';
                        endif;
                    ?>
                    </ul>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->
    </div>
    <!--- END CONTAINER -->
</header>
<style type="text/css">
    #myFooter {
    background-color: #232323;
    }
    #myFooter .footer-copyright {
        background-color: #151414;
    }
</style>
<?php $this->load->view('front_end/nav_bar/nav_bar3'); ?>