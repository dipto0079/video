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
    $profile_info                   =   $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->row(); 

    $this->load->helper('url');
    $base_url = base_url();
    $currentURL = current_url();
    $url = str_replace($base_url, '', $currentURL);
    $url = explode('/', $url);
    $current_page_path = ($url[0]);
    if($current_page_path == 'live-tv' || $current_page_path == 'live-tv.html'):
        $current_page_path = 'live-tv';
    elseif($current_page_path == 'az-list' || $current_page_path == 'az.html'):
        $current_page_path = 'az-list';
    elseif($current_page_path == 'blog.html' || $current_page_path == 'blog'):
        $current_page_path = 'blog';
    endif;


?>
<header class="sg-header">
    <div class="sg-menu">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="sg-logo">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/system_logo/<?php echo ovoo_config('logo'); ?>" alt="Logo" class="img-fluid"></a>
                </div>  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><span class="mdi mdi-name mdi-menu"></span></span>
                </button>                                  
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item <?php echo $current_page_path == ''? 'active':'';?>">
                            <a href="<?php echo base_url(); ?>"><?php echo trans('home'); ?></a>
                        </li> 
                        <?php if($genre_to_primary_menu =='1'): ?>
                        <li class="nav-item sg-dropdown mega-dropdown <?php echo $current_page_path == 'genre'? 'active':'';?>">
                            <a href="#"><?php echo trans('genre'); ?></a>
                            <div class="sg-dropdown-menu">
                                <div class="row">
                                    <?php $all_published_genre= $this->genre_model->all_published_genre();
                                    
                                        foreach ($all_published_genre as $genre):                                                
                                    ?>
                                    <div class="col-md-3">
                                        <ul>
                                            <li><a href="<?php echo base_url('genre/'.$genre->slug.'.html'); ?>"><?php echo $genre->name; ?></a></li>
                                        </ul>                                                
                                    </div>
                                    <?php endforeach; ?>
                                </div><!-- /.row -->
                            </div>
                        </li> 
                        <?php endif; ?> 

                        <?php if($country_to_primary_menu =='1'): ?>
                        <li class="nav-item sg-dropdown mega-dropdown <?php echo $current_page_path == 'country'? 'active':'';?>">
                            <a href="#"><?php echo trans('country'); ?></a>
                            <div class="sg-dropdown-menu">
                                <div class="row">
                                    <?php $all_published_country= $this->country_model->all_published_country();
                                        foreach ($all_published_country as $country):                                                
                                      ?>
                                    <div class="col-md-4">
                                        <ul>
                                            <li><a href="<?php echo base_url('country/'.$country->slug.'.html'); ?>"><?php echo $country->name; ?></a></li>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </div><!-- /.row -->
                            </div>
                        </li>  
                        <?php endif; ?> 
                        <?php if($release_to_primary_menu =='1'): ?>                
                        <li class="nav-item sg-dropdown <?php echo $current_page_path == 'year'? 'active':'';?>">
                            <a href="#"><?php echo trans('release'); ?></a>
                            <div class="sg-dropdown-menu">
                                <div class="row">
                                    <?php $current_year = date("Y");
                                        $end_year = $current_year - 27;
                                        for($i=$current_year;$i>$end_year;$i--): 
                                      ?>
                                    <div class="col-6">
                                        <ul>
                                            <li><a href="<?php echo base_url('year/'.$i.'.html'); ?>"><?php echo $i; ?></a></li>
                                        </ul>
                                    </div>
                                    <?php endfor; ?>
                                    <div class="col-6">
                                        <ul>
                                            <li><a href="<?php echo base_url('year.html'); ?>"><?php echo trans('more'); ?>..</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>  
                        <?php 
                            $tv_series_publish          = ovoo_config('tv_series_publish');
                            $tv_series_pin_primary_menu = ovoo_config('tv_series_pin_primary_menu');
                            if($tv_series_publish =='1' && $tv_series_pin_primary_menu =='1'):
                        ?>     
                        
                        <li class="nav-item <?php echo $current_page_path == 'movies.html'? 'active':'';?>"><a href="<?php echo base_url('movies.html')?>"><?php echo trans('movies'); ?></a></li>

                        <li class="nav-item <?php echo $current_page_path == 'tv-series.html'? 'active':'';?>"><a href="<?php echo base_url('tv-series.html')?>"><?php echo trans('tv_series'); ?></a></li>  
                        <?php endif; ?> 

                        <?php if($az_to_primary_menu == '1'): ?>
                        <li class="nav-item <?php echo $current_page_path == 'az-list'? 'active':'';?>"><a href="<?php echo base_url('az.html')?>"><?php echo trans('az'); ?></a></li>
                        <?php endif; ?>

                        <?php 
                            $live_tv_publish          = ovoo_config('live_tv_publish');
                            $live_tv_pin_primary_menu = ovoo_config('live_tv_pin_primary_menu');
                            if($live_tv_publish =='1' && $live_tv_pin_primary_menu =='1'):
                        ?>
                        <li class="nav-item sg-dropdown mega-dropdown <?php echo $current_page_path == 'live-tv'? 'active':'';?>">
                            <a href="#"><?php echo trans('tv'); ?></a>
                            <div class="sg-dropdown-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul>
                                            <li><a href="<?php echo base_url('live-tv.html')?>"><?php echo trans('all_channels'); ?></a></li>
                                        </ul>
                                    </div>
                                     <?php $live_tv_category= $this->live_tv_model->get_all_live_tv_category();
                                                foreach ($live_tv_category as $item): 
                                                    ?>

                                    <div class="col-md-4">
                                        <ul>
                                            
                                                                                          
                                              
                                              <li><a href="<?php echo base_url('live-tv/category/'.$item['slug'].'.html'); ?>"><?php echo $item['live_tv_category']; ?></a></li>
                                              
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </li> 
                        <?php endif; ?> 

                        <?php $all_video_type_on_primary_menu= $this->common_model->all_video_type_on_primary_menu();
                            foreach ($all_video_type_on_primary_menu as $video_type):                                                
                          ?>
                          <li class="nav-item <?php echo $current_page_path == 'type'? 'active':'';?>"><a href="<?php echo base_url().'type/'.$video_type->slug?>"><?php echo $video_type->video_type;?></a></li>
                        <?php endforeach; ?>

                        <?php 
                            $blog_enable          = ovoo_config('blog_enable');
                            if($blog_enable =='1'):
                        ?>
                        <li class="nav-item <?php echo $current_page_path == 'blog'? 'active':'';?>"><a href="<?php echo base_url('blog.html')?>"><?php echo trans('blog'); ?></a></li>
                        <?php endif; ?>  

                        <?php $all_page_on_primary_menu= $this->common_model->all_page_on_primary_menu();
                            foreach ($all_page_on_primary_menu as $pages):                                                
                        ?>
                        <li  class="nav-item <?php echo $current_page_path == 'page'? 'active':'';?>"><a href="<?php echo base_url().'page/'.$pages->slug?>"><?php echo $pages->page_title?></a></li>
                        <?php endforeach; ?> 

                        <?php if($movie_request_enable == '1'): ?>
                            <li class="nav-item"><a href="#" data-toggle="modal" data-target="#movieRequest"><?php echo trans('request'); ?></a></li>
                        <?php endif; ?>

                        <?php if($privacy_policy_to_primary_menu == '1'): ?>            
                            <li class="nav-item <?php echo $current_page_path == 'privacy-policy.html'? 'active':'';?>"><a href="<?php echo base_url('privacy-policy.html')?>"><?php echo trans('privacy_policy'); ?></a></li>
                        <?php endif; ?>

                        <?php if($dmca_to_primary_menu == '1'): ?>            
                            <li class="nav-item <?php echo $current_page_path == 'dmca.html'? 'active':'';?>"><a href="<?php echo base_url('dmca.html')?>"><?php echo trans('dmca'); ?></a></li>
                        <?php endif; ?>

                        <?php if($contact_to_primary_menu == '1'): ?>            
                            <li class="nav-item <?php echo $current_page_path == 'contact-us.html'? 'active':'';?>"><a href="<?php echo base_url('contact-us.html')?>"><?php echo trans('contact'); ?></a></li>
                        <?php endif; ?>                       
                    </ul>
                </div>    
                <div class="user-option align-self-center">
                    <ul class="global-list">
                        <li>
                            <div class="search-form">
                                <div class="search-icon">
                                    <span class="mdi mdi-name mdi-magnify"></span>
                                </div>
                                <div class="search-form text-center open-search">
                                    <div class="close-search">
                                        <span class="mdi mdi-close remove-icon"></span>
                                    </div>
                                    <form action="<?php echo base_url('search'); ?>" method="get">
                                        <input type="text" name="q" value="<?php if(isset($search_keyword)){ echo $search_keyword;} ?>" autocomplete="off" id="search-input" placeholder="Enter keyword...">
                                        <button type="submit"><span class="mdi mdi-name mdi-magnify "></span></button>
                                    </form><!-- /form -->
                                </div><!-- /search-form -->                    
                            </div>
                        </li>
                        <li class="sg-dropdown">
                            <a href="#" style="text-transform: capitalize; font-size: 20px;"><?php echo $this->language_model->language_by_id($this->session->userdata('active_language_id')); ?></a>
                            <ul class="sg-dropdown-menu">
                                <?php
                                  $languages = $this->language_model->get_languages();
                                  foreach ($languages as $language) : ?>
                                  <li><a href="<?php echo base_url('language/language_switch/').$language->short_form; ?>"><?php echo $language->name; ?></a></li>
                                <?php endforeach; ?>  
                            </ul>
                        </li>

                        <?php if($this->session->userdata('login_status') == 1):?>

                            <li class="sg-dropdown">
                                <div class="user-icon">
                                    <img src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id'));?>" alt="Image" class="img-fluid">
                                </div>
                                <div class="sg-dropdown-menu">
                                    <div class="user d-flex">
                                        <div class="profile-picture">
                                            <img src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id'));?>" alt="Profile Picture">    
                                        </div> 
                                        <div class="user-title">
                                            <h3><?php echo $profile_info->name; ?></h3>
                                            <a href="#"><?php echo $profile_info->email; ?></a>
                                        </div>                                                       
                                    </div>
                                    <div class="dropdown-menu-content">
                                        <ul class="global-list">
                                             <?php 
                                              if($this->session->userdata('admin_is_login') == 1):
                                                  echo '<li><a href="'.base_url().'admin"><i class="fi ion-ios-speedometer-outline m-r-10"></i>'.trans('control_panel').'</a></li>';
                                              endif; 
                                              ?>
                                              <li><a href="<?php echo base_url('my-account/profile'); ?>"><i class="fi ion-ios-person-outline m-r-10"></i><?php echo trans('profile'); ?></a></li>
                                              <li><a href="<?php echo base_url('my-account/subscription'); ?>"><i class="fi ion-ios-briefcase-outline m-r-10"></i><?php echo trans('my_subscription'); ?></a></li>
                                              <li><a href="<?php echo base_url('my-account/favorite'); ?>"><i class="fi ion-ios-heart-outline m-r-10"></i><?php echo trans('my_favorite'); ?></a></li>
                                              <li><a href="<?php echo base_url('my-account/watch-later'); ?>"><i class="fi ion-ios-clock-outline m-r-10"></i><?php echo trans('wish_list'); ?></a></li>
                                              <li><a href="<?php echo base_url('my-account/update'); ?>"><i class="fi ion-edit m-r-10"></i><?php echo trans('update_profile'); ?></a></li>
                                              <li><a href="<?php echo base_url('my-account/change-password'); ?>"><i class="fi ion-key m-r-10"></i><?php echo trans('change_password'); ?></a></li>
                                              <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fi ion-log-out m-r-10"></i><?php echo trans('logout'); ?></a></li>
                                        </ul>
                                    </div>
                                </div>                                    
                            </li>
                        <?php else: ?>
                        <?php if($frontend_login_enable =='1' || $registration_enable =='1'): ?>
                        <li class="sg-dropdown">
                            <div class="mdi mdi-name mdi-account"></div>
                            <ul class="sg-dropdown-menu">
                                <?php if($frontend_login_enable =='1'): ?>
                                    <li><a href="<?php echo base_url('user/login'); ?>"><span><img src="<?php echo base_url($assets_dir); ?>images/others/icon4.svg" alt="Svg"></span><?php echo trans('login'); ?></a></li>
                                <?php endif; ?>
                                <?php if($registration_enable =='1'): ?>
                                    <li><a href="<?php echo base_url('user/registration'); ?>"><span><img src="<?php echo base_url($assets_dir); ?>images/others/icon5.svg" alt="Svg"></span><?php echo trans('signup'); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?> 
                        <?php endif; ?> 


                    </ul>
                </div>                                            
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
    </div><!-- /.sg-menu -->      

</header><!-- /.sg-header -->



<!-- Request Modal --> 


<?php 
  $movie_request_enable                  =   $this->db->get_where('config' , array('title' =>'movie_request_enable'))->row()->value;
  if($movie_request_enable == '1'):
    $recaptcha_enable                   =   $this->db->get_where('config' , array('title' =>'recaptcha_enable'))->row()->value;
    $requiest_success_message             = $this->session->flashdata('requiest_success');
    $requiest_error_message               = $this->session->flashdata('requiest_error');

 ?>
<div class="modal fade" id="movieRequest" tabindex="-1" role="dialog" aria-labelledby="sg-modallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sg-modallabel"><?php echo trans('movie_request'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($requiest_success_message !=''): ?>
                  <div class="alert alert-dsuccess"><?php echo $requiest_success_message; ?></div>
                  <script>
                    $(document).ready(function() {
                      $('#movieRequest').modal('show');
                    });
                  </script>
                <?php endif; ?>

                <?php if($requiest_error_message !=''): ?>
                  <div class="alert alert-danger"><?php echo $requiest_error_message; ?></div>
                  <script>
                    $(document).ready(function() {
                      $('#movieRequest').modal('show');
                    });
                  </script>
                <?php endif; ?>
                    <?php echo form_open(base_url('send_movie_request') , array('class' => 'sg-form', 'enctype' => 'multipart/form-data', 'id' =>'report_form'));?>
                    <div class="form-group mb-0">
                        <label><?php echo trans('name'); ?></label>                               
                        <input type="text" name="name" class="form-control" required="required" placeholder="Enter Your Name">
                    </div>   
                    <div class="form-group mb-0">
                        <label><?php echo trans('email'); ?></label>                               
                        <input type="email" name="email" class="form-control" required="required" placeholder="Enter Your Email">
                    </div>   
                    <div class="form-group mb-0">
                        <label><?php echo trans('movie_name'); ?></label>                               
                        <input type="text" name="movie_name" class="form-control" required="required" placeholder="Movie Name">
                    </div>   
                    <div class="form-group mb-0">
                        <label><?php echo trans('message'); ?></label>                               
                        <textarea class="form-control" name="message" placeholder="Write your message here"></textarea>
                    </div> 
                    <div class="form-group mb-0">
                        <label><?php echo trans('message'); ?></label>                               
                        <?php if($recaptcha_enable == '1'): echo $this->recaptcha->create_box(); endif;?>
                    </div> 
                    <div id="response"></div>
                    <button type="submit" class="btn btn-primary">Send</button>                                           
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal --> 

<!-- End Request Modal -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script>
  jQuery(document).ready(function() {
    $('form').parsley();
  });
</script>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){
    $("#search-input").autocomplete({
        source: "<?php echo base_url(); ?>/home/autocompleteajax",
            focus: function( event, ui ) { 
            return false;
        },
        select: function( event, ui ) {
            window.location.href = ui.item.url;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="th-title"><b>' + item.title + '</b></div><br><div class="th-title">' + item.type + '</div></div></a>';
        return $( "<li></li>" ).data( "item.autocomplete", item ).append(inner_html).appendTo( ul );
    };
});
</script>
