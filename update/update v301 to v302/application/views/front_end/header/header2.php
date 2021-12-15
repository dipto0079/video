<?php    
    $facebook_url               =   $this->db->get_where('config' , array('title'=>'facebook_url'))->row()->value;
    $twitter_url                =   $this->db->get_where('config' , array('title'=>'twitter_url'))->row()->value;
    $vimeo_url                  =   $this->db->get_where('config' , array('title'=>'vimeo_url'))->row()->value;
    $linkedin_url               =   $this->db->get_where('config' , array('title'=>'linkedin_url'))->row()->value;
    $youtube_url                =   $this->db->get_where('config' , array('title'=>'youtube_url'))->row()->value;
    $registration_enable        =   $this->db->get_where('config' , array('title' =>'registration_enable'))->row()->value;    
    $frontend_login_enable      =   $this->db->get_where('config' , array('title' =>'frontend_login_enable'))->row()->value; 
?>
<!-- Main Bar-->
<div id="primary-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 border-right">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>"> <img class="img-responsive" src="<?php echo base_url(); ?>uploads/system_logo/logo.png?<?php  echo time();?>" alt="Logo" > </a>
                </div>
            </div>
            <div class="col-md-4 m-t-10">
                <form class="navbar-form navbar-left" method="get" action="<?php echo base_url('search'); ?>">
                    <div class="input-group">
                      <input type="text" name="q" value="<?php if(isset($search_keyword)){ echo $search_keyword;} ?>" autocomplete="off" id="search-input" class="form-control" placeholder="Search..">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                      </span>
                    </div><!-- /input-group -->
                </form>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="social-icon">
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
            <div class="col-md-2 col-sm-4 border-left">
                <?php if($this->session->userdata('login_status') == 1): ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img img-circle" src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id')).'?'.time(); ?>" width="40"> </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php if($this->session->userdata('admin_is_login') == 1): ?>
                                    <li><a href="<?php echo base_url('admin'); ?>"><i class="fi ion-ios-speedometer-outline m-r-10"></i>Admin Dashboard</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo base_url('my-account/profile'); ?>"><i class="fi ion-ios-person-outline m-r-10"></i>Profile</a></li>
                                <li><a href="<?php echo base_url('my-account/favorite'); ?>"><i class="fi ion-ios-heart-outline m-r-10"></i>My Favorite</a></li>
                                <li><a href="<?php echo base_url('my-account/watch-later'); ?>"><i class="fi ion-ios-clock-outline m-r-10"></i>Wish List</a></li>
                                <li><a href="<?php echo base_url('my-account/update'); ?>"><i class="fi ion-edit m-r-10"></i>Update Profile</a></li>
                                <li><a href="<?php echo base_url('my-account/change-password'); ?>"><i class="fi ion-key m-r-10"></i>Change Password</a></li>
                                <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fi ion-log-out m-r-10"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                <div class="login">
                    <?php if($frontend_login_enable =='1'): ?>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url('user/login'); ?>">Login</a>
                    <?php endif; ?>
                    <?php if($registration_enable =='1'): ?>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url('user/login'); ?>">Signup</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Main Bar -->
<style type="text/css">
    #myFooter {
    background-color: #232323;
    }
    #myFooter .footer-copyright {
        background-color: #151414;
    }
</style>
<?php $this->load->view('front_end/nav_bar/nav_bar2'); ?>