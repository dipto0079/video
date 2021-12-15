<?php    
    $system_name              =   $this->db->get_where('config' , array('title'=>'system_name'))->row()->value;
    $system_short_name        =   $this->db->get_where('config' , array('title'=>'system_short_name'))->row()->value;
    $site_name                =   $this->db->get_where('config' , array('title'=>'site_name'))->row()->value;
    $business_address         =   $this->db->get_where('config' , array('title'=>'business_address'))->row()->value;
    $system_email             =   $this->db->get_where('config' , array('title'=>'system_email'))->row()->value;
    $business_phone           =   $this->db->get_where('config' , array('title'=>'business_phone'))->row()->value;    
    $color                    =   $this->db->get_where('user' , array('user_id'=>$this->session->userdata('user_id')))->row()->theme_color;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Abdul Mannan">
    <meta name="copyright" content="Copyright (c) 2014 - 2018 SpaGreen">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
    <!-- CSS-->
    <!--summernote CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- CSS-->
    <!--summernote CSS -->

    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />

    <!-- main CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- linear icon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/addons/linearicons/style.css">
    <!--sweet alert2 CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/swal2/sweetalert2.min.css" rel="stylesheet">
    <!--Jquery JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
    <title><?php echo $page_title .'-'.$system_short_name;?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    
</head>

<body class="sidebar-mini fixed <?php //if(isset($page_name) && ($page_name=='videos_add' || $page_name=='videos_edit'|| $page_name=='videos_manage')){ echo 'sidebar-collapse';}  ?>">
    <div class="wrapper">
        <!-- Navbar-->
        <header class="main-header hidden-print"><a class="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Ovoo" height="30" style="margin-top:-15px;"></a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                <div class="pull-left hidden-xs" style="margin-top:-12px;color:#fff;">
                    <!-- <h3 class="company-name"><?php echo $site_name;?></h3> -->
                </div>
                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu">
                    <ul class="top-nav">
                        <!-- User Menu-->
                        <li><a href="<?php echo base_url(); ?>" target="_blank">VISIT SITE</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img  src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id')).'?'.time();?>" class="img-circle " alt="photo" height="30"></a>
                            <ul class="dropdown-menu settings-menu">
                                <li><a href="<?php echo base_url();?>admin/manage_profile"><i class="fa fa-user" aria-hidden="true"></i> <?php echo tr_wd('profile'); ?></a></li>
                                <li><a href="<?php echo base_url();?>admin/manage_profile"><i class="fa fa-lock" aria-hidden="true"></i> <?php echo tr_wd('change_password'); ?></a></li>
                                <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo tr_wd('logout'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php  include'navigation.php';?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1><?php echo $page_title; ?></h1>
                </div>
            </div>
            <?php  include $page_name.'.php';?>
        </div>
    </div>
    <footer class="footer text-right"> <?php echo date("Y"); ?> &copy; <a href="https://codecanyon.net/item/ovoomovie-video-steaming-cms/20180569">OVOO - v2.5.3</a> |
  Developed by: <a href="http://www.spagreen.net">Spa Green Creative</a></footer>

   <!-- ajax modal  -->
    <div id="mymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
          <div class="panel panel-color panel-primary">
            <div class="panel-heading">
              <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="panel-title text-light"><?php echo tr_wd($page_title) ;?></h3>
            </div>
            <div class="modal-body">
              <div id="modal-loader" style="display: none; text-align: center;"> <img src="<?php echo base_url(); ?>assets/images/preloader.gif" /> </div>
              
              <!-- content will be load here -->
              <div id="dynamic-content"></div>
            </div>
            <div class="modal-footer"> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal --> 
<script>
    $(document).ready(function() {
        $(document).on('click', '#menu', function(e) {
            e.preventDefault();
            var url = $(this).data('id'); // it will get action url
            $('#dynamic-content').html(''); // leave it blank before ajax call
            $('#modal-loader').show(); // load ajax loader
            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'html'
                })
            .done(function(data) {
                console.log(data);
                $('#dynamic-content').html('');
                $('#dynamic-content').html(data); // load response 
                $('#modal-loader').hide(); // hide ajax loader 
            })
            .fail(function() {
                $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
            });
        });
    });
</script>
<!-- END Ajax modal  -->

<!-- Ajax Delete -->
<script type="text/javascript">
    function delete_row(table_name, row_id) {
        var table_row = '#row_' + row_id
        var base_url = '<?php echo base_url();?>'
        url = base_url + 'admin/delete_record/'
        swal({
            title: <?php echo tr_wd("'are_you_sure'"); ?>,
            text: <?php echo tr_wd("'it_will_be_delete_permanently!'");?>,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3CB371',
            cancelButtonText: <?php echo tr_wd("'cancel'");?>,
            confirmButtonText: <?php echo tr_wd("'yes, delete_it!'");?>,
            showLoaderOnConfirm: true,

            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: 'row_id=' + row_id + '&table_name=' + table_name,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        swal(<?php echo tr_wd("'deleted!'");?>, response.message, response.status);
                        $(table_row).fadeOut(2000);
                    })
                    .fail(function() {
                        swal('Oops...', response.message, response.status);
                    });
                });
            },
            allowOutsideClick: false
        });
    }
</script>
<!-- END Ajax Delete -->



<!-- Javascripts-->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core.js"></script>
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
<!--END sweet alert2 JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $('#datatable').DataTable();
</script>
</body>
</html>