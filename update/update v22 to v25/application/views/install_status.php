<?php $base_url = "http://".$_SERVER['HTTP_HOST'];
      $base_url .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo $base_url; ?>assets/images/favicon.ico">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/main.css">
     <!-- toast notification  Start-->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/plugins/toastr/toastr.css">
      <script src="<?php echo $base_url; ?>assets/js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/validation.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/login-form.js"></script>
    <title>Installation</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
      <img src="<?php echo $base_url; ?>assets/images/logo.png" alt="Ovoo" height="40">        
      </div>
      <div class="login-box">
      <form class="login-form" id="login_form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-gear"></i>Installation Error</h3>
          <div><?php echo $msg; ?></div>
          <p><a class="btn btn-primary" href="<?php echo $base_url; ?>">Try Again</a></p>
        </form>
      
      </div>
    </section>
  </body>
  <script src="assets/js/jquery-2.1.4.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/plugins/pace.min.js"></script>
  <script src="assets/js/main.js"></script>



</html>