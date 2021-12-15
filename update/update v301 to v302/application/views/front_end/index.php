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
    $push_notification_enable       =   $this->db->get_where('config' , array('title' =>'push_notification_enable'))->row()->value;
    $site_name                      =   $this->db->get_where('config' , array('title'=>'site_name'))->row()->value;   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="<?php if (isset($meta_description)) { echo $meta_description;} else{ echo $default_meta_description;} ?>" />
<meta name="keywords" content="<?php if (isset($focus_keyword)) { echo $focus_keyword;} else{ echo $default_focus_keyword ; } ?>" />
<meta name="author" content="<?php echo $author; ?>" />
<link rel="canonical" href="<?php if(isset($canonical) && !empty($canonical)): echo $canonical; else: echo base_url(); endif; ?>">
<?php if($page_name =='watch' || $page_name == 'watch_tv' || $page_name == 'blog_details'): ?>
<meta property="og:locale" content="en_US" />
<meta name="twitter:card" content="summary">
<meta name="twitter:description" content="<?php echo $meta_description; ?>" />
<meta name="twitter:title" content="<?php echo $og_title; ?>" />
<meta property="og:title" content="<?php echo $og_title; ?>" />
<meta property="og:url" content="<?php echo $og_url; ?>" />
<meta property="og:type" content="movie" />
<meta property="og:description" content="<?php echo $meta_description; ?>" />
<meta property="og:image" content="<?php echo $og_image_url; ?>" />
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php if(isset($title) && !empty($title)): echo $title; else: echo $site_name; endif; ?></title>   
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
<?php if($front_end_theme =='blue'): ?>
    <style type="text/css">
        .owl-carousel .owl-next,.owl-carousel .owl-prev {
            background-color: #0088cc;
        }
        a{
            color:#0088cc;
        }
        a:hover{
           color:#0088c0; 
        }
    </style>
<?php elseif($front_end_theme =='green'): ?>
    <style type="text/css">
        .owl-carousel .owl-next,.owl-carousel .owl-prev {
            background-color: #5DC560;
        }
        a{
            color:#5DC560;
        }
        a:hover{
           color:#5DC569; 
        }
    </style>
<?php elseif($front_end_theme =='red'): ?>
    <style type="text/css">
        .owl-carousel .owl-next,.owl-carousel .owl-prev {
            background-color: #ff0000;
        }
        a{
            color:#ff0000;
        }
        a:hover{
           color:#ff0009; 
        }
    </style>
<?php elseif($front_end_theme =='yellow'): ?>
    <style type="text/css">
        .owl-carousel .owl-next,.owl-carousel .owl-prev {
            background-color: #FDD922;
        }
        a{
            color:#FDD922;
        }
        a:hover{
           color:#FDD929; 
        }
    </style>
<?php elseif($front_end_theme =='purple'): ?>
    <style type="text/css">
        .owl-carousel .owl-next,.owl-carousel .owl-prev {
            background-color: #6d0eb1;
        }
        a{
            color:#6d0eb1;
        }
        a:hover{
           color:#6d0eb9; 
        }
    </style>
<?php else: ?>
    <style type="text/css">
        .owl-carousel .owl-next,.owl-carousel .owl-prev {
            background-color: #FDD922;
        }
        a{
            color:#0088cc;
        }
        a:hover{
           color:#0088c0; 
        }
    </style>
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
                $this->load->view('front_end/movie_request');             
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
                effectTime: 1000
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
    
    <?php if($google_analytics_id !='' && $google_analytics_id !=NULL && !empty($google_analytics_id)): ?>
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
    <?php endif; ?>

    <?php  if($share_this_enable =='1'):?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58d74b9dcfd76af7"></script>
    <?php endif; ?>
    <!--sweet alert2 JS -->
    <script src="<?php echo base_url(); ?>assets/plugins/swal2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            var success_message = '<?php echo $this->session->flashdata('success'); ?>';
            var error_message = '<?php echo $this->session->flashdata('error'); ?>';
            if (success_message != '') {
                swal('Success!',success_message,'success');
            }
            if (error_message != '') {
                swal('Error!',error_message,'error');
            }
        });
    </script>
    <?php
        if($push_notification_enable == '1'):
        $onesignal_appid                    =   $this->db->get_where('config' , array('title' =>'onesignal_appid'))->row()->value;    
        $onesignal_actionmessage            =   $this->db->get_where('config' , array('title' =>'onesignal_actionmessage'))->row()->value;    
        $onesignal_acceptbuttontext         =   $this->db->get_where('config' , array('title' =>'onesignal_acceptbuttontext'))->row()->value;    
        $onesignal_cancelbuttontext         =   $this->db->get_where('config' , array('title' =>'onesignal_cancelbuttontext'))->row()->value;    
     ?>
    <!-- oneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(["init", {
            appId: "<?php echo $onesignal_appid; ?>",
            subdomainName: 'push',
            autoRegister: false,
            promptOptions: {
                /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                /* actionMessage limited to 90 characters */
                actionMessage: "<?php echo $onesignal_actionmessage;?>",
                /* acceptButtonText limited to 15 characters */
                acceptButtonText: "<?php echo $onesignal_acceptbuttontext;?>",
                /* cancelButtonText limited to 15 characters */
                cancelButtonText: "<?php echo $onesignal_cancelbuttontext;?>"
            }
        }]);
    </script>
    <script>
        function subscribe() {
            // OneSignal.push(["registerForPushNotifications"]);
            OneSignal.push(["registerForPushNotifications"]);
            event.preventDefault();
        }
        function unsubscribe(){
            OneSignal.setSubscription(true);
        }

        var OneSignal = OneSignal || [];
        OneSignal.push(function() {
            /* These examples are all valid */
            // Occurs when the user's subscription changes to a new value.
            OneSignal.on('subscriptionChange', function (isSubscribed) {
                console.log("The user's subscription state is now:", isSubscribed);
                OneSignal.sendTag("user_id","4444", function(tagsSent)
                {
                    // Callback called when tags have finished sending
                    console.log("Tags have finished sending!");
                });
            });

            var isPushSupported = OneSignal.isPushNotificationsSupported();
            if (isPushSupported)
            {
                // Push notifications are supported
                OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
                {
                    if (isEnabled)
                    {
                        console.log("Push notifications are enabled!");

                    } else {
                        OneSignal.showHttpPrompt();
                        console.log("Push notifications are not enabled yet.");
                    }
                });

            } else {
                console.log("Push notifications are not supported.");
            }
        });
    </script>
<?php endif; ?>
</body>
</html>