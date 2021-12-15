<div class="header3">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
          <span class="sr-only">Toggle navigation
          </span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>uploads/system_logo/logo.png" alt="logo">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar1">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url(); ?>">Home
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genre 
              <span class="caret">
              </span>
            </a>
            <div class="dropdown-menu row col-lg-12 three-column-navbar" role="menu">
              <?php $all_published_genre= $this->genre_model->all_published_genre();
                foreach ($all_published_genre as $genre):                                                
              ?>
              <div class="col-md-3">
                <ul class="menu-item list-unstyled">
                  <li>
                    <a href="<?php echo base_url('genre/'.$genre->slug.'.html'); ?>">
                      <?php echo $genre->name; ?>
                    </a>
                  </li>
                </ul>
              </div>
              <?php endforeach; ?>
            </div>
          </li>
          <li class="dropdown"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Country 
              <span class="caret">
              </span>
            </a>
            <div class="dropdown-menu row col-lg-12 three-column-navbar" role="menu">
              <?php $all_published_country= $this->country_model->all_published_country();
                foreach ($all_published_country as $country):                                                
              ?>
              <div class="col-md-3">
                <ul class="menu-item list-unstyled">
                  <li>
                    <a href="<?php echo base_url('country/'.$country->slug.'.html'); ?>">
                      <?php echo $country->name; ?>
                    </a>
                  </li>
                </ul>
              </div>
              <?php endforeach; ?>
            </div>
          </li>
          <li class="dropdown"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Release 
              <span class="caret">
              </span>
            </a>
            <div class="dropdown-menu row col-lg-12 three-column-navbar" role="menu">
              <?php $current_year = date("Y");
                $end_year = $current_year - 27;
                for($i=$current_year;$i>$end_year;$i--): 
              ?>
              <div class="col-md-3">
                <ul class="menu-item list-unstyled">
                  <li>
                    <a href="<?php echo base_url('year/'.$i.'.html'); ?>">
                      <?php echo $i; ?>
                    </a>
                  </li>
                </ul>
              </div>
              <?php endfor; ?>
              <div class="col-md-3">
                <ul class="menu-item list-unstyled">
                  <li>
                    <a href="<?php echo base_url('year.html'); ?>">More..
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li>
            <a href="<?php echo base_url('movies.html')?>">Movies
            </a>
          </li>
          <?php 
            $tv_series_publish          = $this->db->get_where('config',array('title'=>'tv_series_publish'))->row()->value;
            $tv_series_pin_primary_menu = $this->db->get_where('config',array('title'=>'tv_series_pin_primary_menu'))->row()->value;
            if($tv_series_publish =='1' && $tv_series_pin_primary_menu =='1'):
          ?>
          <li>
            <a href="<?php echo base_url('tv-series.html')?>">TV Series
            </a>
          </li>
          <?php endif; ?>
          <?php 
            $live_tv_publish          = $this->db->get_where('config',array('title'=>'live_tv_publish'))->row()->value;
            $live_tv_pin_primary_menu = $this->db->get_where('config',array('title'=>'live_tv_pin_primary_menu'))->row()->value;
            if($live_tv_publish =='1' && $live_tv_pin_primary_menu =='1'):
          ?>
          <li><a href="<?php echo base_url('live-tv.html')?>">TV <span class="badge badge-danger" style="background-color: #d00202;">live</span></a></li>
          <?php endif; ?>
                
          <?php $all_video_type_on_primary_menu= $this->common_model->all_video_type_on_primary_menu();
            foreach ($all_video_type_on_primary_menu as $video_type):                                                
          ?>
          <li>
            <a href="<?php echo base_url().'type/'.$video_type->slug?>">
              <?php echo $video_type->video_type;?>
            </a>
          </li>
          <?php endforeach; ?>
          <?php 
            $blog_enable          = $this->db->get_where('config',array('title'=>'blog_enable'))->row()->value;
            if($blog_enable =='1'):
          ?>
          <li>
            <a href="<?php echo base_url('blog.html')?>">Blog
            </a>
          </li>
          <?php endif; ?>                  
          <?php $all_page_on_primary_menu= $this->common_model->all_page_on_primary_menu();
            foreach ($all_page_on_primary_menu as $pages):                                                
          ?>
          <li>
            <a href="<?php echo base_url().'page/'.$pages->slug?>">
              <?php echo $pages->page_title?>
            </a>
          </li>
          <?php endforeach; ?>
          <li>
            <a href="<?php echo base_url('contact-us.html')?>">Contact Us
            </a>
          </li>
        </ul>
        <?php if($this->session->userdata('login_status') == 1): ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img class="img img-circle" src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id'));?>" height="20"> 
            </a>
            <ul class="dropdown-menu" role="menu">
              <?php 
                if($this->session->userdata('admin_is_login') == 1):
                echo '<li><a href="'.base_url().'admin"><i class="fi ion-ios-speedometer-outline m-r-10"></i>Admin Dashboard</a></li>';
                endif; 
              ?>
              <li>
                <a href="<?php echo base_url('my-account/profile'); ?>">
                  <i class="fi ion-ios-person-outline m-r-10">
                  </i>Profile
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('my-account/favorite'); ?>">
                  <i class="fi ion-ios-heart-outline m-r-10">
                  </i>My Favorite
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('my-account/watch-later'); ?>">
                  <i class="fi ion-ios-clock-outline m-r-10">
                  </i>Wish List
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('my-account/update'); ?>">
                  <i class="fi ion-edit m-r-10">
                  </i>Update Profile
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('my-account/change-password'); ?>">
                  <i class="fi ion-key m-r-10">
                  </i>Change Password
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('login/logout'); ?>">
                  <i class="fi ion-log-out m-r-10">
                  </i>Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <?php else: ?>
        <div class="pull-right">
          <li style="margin-top: 24px;">
            <a class="btn btn-success btn-sm" href="<?php echo base_url('user/login'); ?>"> 
              <span class="btn-label">
                <i class="fi ion-log-in">
                </i>
              </span>Login
            </a>
          </li>
        </div>       
        <?php endif; ?>
        <form class="navbar-form navbar-right" method="get" action="<?php echo base_url('search'); ?>" style="margin-top: 22px;">
          <div class="input-group">
            <input type="text" name="q" value="<?php if(isset($search_keyword)){ echo $search_keyword;} ?>" autocomplete="off" id="search-input" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="fa fa-search">
                </i>
              </button>
            </span>
          </div>
          <!-- /input-group -->
        </form> 
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
<!-- bootstrap menu -->
<script>
    $(".dropdown").hover(function() {
        $(this).addClass("open");
    }, function() {
        $(this).removeClass("open");
    });
    $('.search_tools').click(function() {
        $(".search").toggleClass('open');
        if ($(".search").hasClass("open")) {
            $(this).html('<a href="#"><span class="fa fa-close"></span></a>');
        } else {
            $(this).html('<a href="#"><span class="fa fa-search"></span></a>');
        }
    });
</script>
<!-- bootstrap menu -->
<!-- typehead search  -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
    $(document).ready(function() {
        $("#search-input").autocomplete({
            source: "<?php echo base_url(); ?>/home/autocompleteajax",
            focus: function(event, ui) {
                //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
                return false;
            },
            select: function(event, ui) {
                window.location.href = ui.item.url;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="th-title"><b>' + item.title + '</b></div><br><div class="th-title">' + item.type + '</div></div></a>';
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);
        };
    });
</script>