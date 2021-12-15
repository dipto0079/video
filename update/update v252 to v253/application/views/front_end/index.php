<?php    
    $default_meta_description       =   $this->db->get_where('config' , array('title'=>'meta_description'))->row()->value;
    $default_focus_keyword          =   $this->db->get_where('config' , array('title'=>'focus_keyword'))->row()->value;
    $author                         =   $this->db->get_where('config' , array('title'=>'author'))->row()->value;
    $front_end_theme                =   $this->db->get_where('config' , array('title'=>'front_end_theme'))->row()->value;
    $dark_theme                     =   $this->db->get_where('config' , array('title'=>'dark_theme'))->row()->value;
    $google_analytics_id            =   $this->db->get_where('config' , array('title'=>'google_analytics_id'))->row()->value;
    $header_templete                =   $this->db->get_where('config' , array('title'=>'header_templete'))->row()->value;   
    $footer_templete                =   $this->db->get_where('config' , array('title'=>'footer_templete'))->row()->value;
    $share_this_enable              =   $this->db->get_where('config' , array('title' =>'social_share_enable'))->row()->value;    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="canonical" href="<?php echo base_url(); ?>">
<meta charset="UTF-8">
<meta name="description" content="<?php if (isset($meta_description)) { echo $meta_description;} else{ echo $default_meta_description;} ?>">
<meta name="keywords" content="<?php if (isset($focus_keyword)) { echo $focus_keyword;} else{ echo $default_focus_keyword ; } ?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if($page_name=='watch'){ echo $watch_videos->title;}else{ echo $title; } ?></title>    
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/system_logo/favicon.ico">
<!-- Style Sheets -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/additional.css">
<!-- Font Icons -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/ionicons.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/socicon-styles.css">
<!-- Font Icons -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/hover-min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/animate.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/<?php echo $front_end_theme; ?>.css">
<script src="<?php echo base_url(); ?>assets/front_end/js/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
<?php if($page_name=='watch' || $page_name=='watch_tv'): ?>
<link href="<?php echo base_url(); ?>assets/player/video-js-6.7.3/video-js.css" rel="stylesheet" type="text/css">
<!-- tube skin CSS -->
<link href="<?php echo base_url(); ?>assets/player/plugins/tube-skin/videojs-tube.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/player/video-js-6.7.3/video.min.js" crossorigin="anonymous"></script>
<!-- watermark CSS -->
<link href="<?php echo base_url(); ?>assets/player/plugins/watermark/videojs-logo.min.css" rel="stylesheet">
<!-- social share CSS -->
<link href="<?php echo base_url(); ?>assets/player/plugins/videojs-share/videojs-share.css" rel="stylesheet">
<!-- social share CSS -->
<link href="<?php echo base_url(); ?>assets/player/plugins/videojs-seek-buttons/videojs-seek-buttons.css" rel="stylesheet">
<?php endif; ?> 
<?php if($page_name=='home' || $page_name=='live_tv' || $page_name=='watch_tv'): ?>
<!-- owlcarousel -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/owl-custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/owl.theme.default.min.css">
<script src="<?php echo base_url(); ?>assets/front_end/js/owl.carousel.js"></script>
<!-- owlcarousel -->
<?php endif ?>
<!-- typehead search  -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/auto-complete.css">
<!-- typehead search  -->
<?php if($dark_theme=='1'): ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front_end/css/dark.css">
<?php endif; ?>
<?php if($page_name =='watch'): ?>
    <meta property="og:title" content="<?php echo $og_title; ?>">
    <meta property="og:url" content="<?php echo $og_url; ?>">
    <meta property="og:type" content="movie">
    <meta property="og:description" content="<?php echo $meta_description; ?>">
    <meta property="og:image" content="<?php echo $og_image_url; ?>">
<?php endif; ?>
</head>
    <body>
        <div id="wrapper">
            <div id="main-content">            
            <?php 
                $this->load->view('front_end/header/'.$header_templete);            
                if ($page_name == 'home')
                    $this->load->view('front_end/slider');
                if ($page_name == 'home'): ?>
                    <div class="container">
                        <?php  if($share_this_enable =='1'):?>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_yl99 m-t-30 m-b-10" data-url="<?php echo base_url();?>" data-title="<?php if($page_name=='watch'){ echo $watch_videos->title;}else{ echo $title; } ?>"></div>
                        <!-- Addthis Social tool -->
                    <?php endif; ?>
                    </div>
            <?php endif; ?> 

            <?php
                $this->load->view('front_end/'.$page_name);
                $this->load->view('front_end/footer/'.$footer_templete);            
            ?>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- lazy image loading -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.plugins.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.lazy').lazy({
                effect: "fadeIn",
                effectTime: 1000,
                threshold: 0
            });
        });
    </script>
    <!-- end lazy image loading -->
    <!--sweet alert2 JS -->
    <link href="<?php echo base_url(); ?>assets/plugins/swal2/sweetalert2.min.css" rel="stylesheet">
    <!-- END sweet alert2 JS -->
    <!-- Scripts -->    
    <script src="<?php echo base_url(); ?>assets/front_end/js/ovoo.js"></script>    
    <script src="<?php echo base_url(); ?>assets/front_end/js/bootstrap.min.js"></script>
    <!-- ajax subscribtion -->
    <script type="text/javascript">
        $(document).on('click', '#subscribe-btn', function() {
            var email = $("#email").val();
            var name = $("#name").val();
            if(name==''){
                name='New Subscriber';
            }
            var hasError = false;
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (email == '') {
                var hasError = true;
                $("#error").fadeIn();
                $("#error").html('<p class="text-danger"><strong>Opps!&nbsp;</strong>Email must not be blank.</p>');
            } else if (!emailReg.test(email)) {
                var hasError = true;
                $("#error").html('<p class="text-danger">Enter a valid email address.</p>');
            }

            if (hasError != true) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>user/subscribe',
                    data: "name="+name+"&email="+email,
                    dataType: 'json',
                    beforeSend: function() {
                        $("#error").fadeOut();
                        $("#subscribe-btn").html('Subscribing!! &nbsp;Wait...');

                    },
                    success: function(response) {
                        var subscribe_status = response.subscribe_status;
                        if (subscribe_status == "success") {
                            $("#error").fadeIn();
                            $("#subscribe-btn").html('<i class="fa fa-check" aria-hidden="true"></i> &nbsp;Subscribed');
                            $("#error").html('<p class="text-success"><strong>Well done!</strong> Subscription successful.</p>');
                            //name.val('');
                            //email.val('');
                        }else if (subscribe_status == "exist"){
                            $("#error").fadeIn();
                            $("#subscribe-btn").html('Subscribe');
                            $("#error").html('<p class="text-warning">You already subscribe us earlier.</p>');
                        }else {
                            $("#error").fadeIn();
                            $("#subscribe-btn").html('Subscribe');
                            $("#error").html('<p class="text-warning"><strong>Opps!</strong> Subscription Successfull But Confirmation Email not Send.</p>');
                        }
                    }
                });
            }
        });
    </script>
    <!-- End ajax subscribtion -->
    <!-- Google analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', '<?php echo $google_analytics_id; ?>', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- END Google analytics -->
    <?php  if($share_this_enable =='1'):?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58d74b9dcfd76af7"></script>
    <?php endif; ?>
</body>
</html>