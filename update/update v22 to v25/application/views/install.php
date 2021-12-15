<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Installation</title>
    <style>
        /*custom font*/

        @import url(http://fonts.googleapis.com/css?family=Montserrat);
        /*basic reset*/

        * {
            margin: 0;
            padding: 0;
        }


        html {
            height: 100%;
            background-color: #D6D1D1;
        }

        body {
            font-family: montserrat, arial, verdana;
        }
        h2{
            color:#27AE60;
        }
        /*form styles*/

        #msform {
            width: 950px;
            margin: 50px auto;
            text-align: center;
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10% 50px 10%;
            position: absolute;
        }

        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        .permission {
            text-align: left;
            font-size: 14px;
            color: #2C3E50;
        }

        #msform input,
        #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }
        /*buttons*/

        #msform .action-button {
            width: 100px;
            background: #27AE60;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }

        #msform .check-button {
            width: 100px;
            background: #27AE60;
            color: white;
            border: 0 none;
            border-radius: 2px;
            cursor: pointer;
            padding: 7px 15px;
            margin: 10px 5px;
            font-size: 12px;
            text-decoration: none;
        }

        #msform .check-button:hover,
        #msform .check-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }
        /*headings*/

        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .success {
            font-size: 12px;
            color: green;
            text-align: left;
            margin-left: 8px;
            margin: 0 0 8px 5px;
        }

        .error {
            font-size: 12px;
            color: red;
            text-align: left;
            margin: 0 0 8px 5px;
        }


        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }
        /*progressbar*/

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 11px;
            width: 25%;
            float: left;
            position: relative;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 10px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }
        /*progressbar connectors*/

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1;
            /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #27AE60;
            color: white;
        }


        .loader {
  color: #27ae60;
  font-size: 28px;
  text-indent: -9999em;
  overflow: hidden;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  margin: 72px auto;
  position: relative;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
  animation: load6 1.7s infinite ease, round 1.7s infinite ease;
}
@-webkit-keyframes load6 {
  0% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  5%,
  95% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  10%,
  59% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
  }
  20% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
  }
  38% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
  }
  100% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
}
@keyframes load6 {
  0% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  5%,
  95% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  10%,
  59% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
  }
  20% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
  }
  38% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
  }
  100% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
}
@-webkit-keyframes round {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes round {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}




    </style>
</head>

<body>
     <!-- multistep form -->
    <?php $base_url = "http://".$_SERVER['HTTP_HOST'];
    $base_url .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/';
    echo form_open($base_url.'install/run_install' , array('id' => 'msform' , 'name' => 'formElem','class'=> 'form-horizontal m-t-20','role'=>'form'));?>
        <h2>OVOO Movie Streaming CMS
            <br><small>Welcome to Installation</small></h2>
        <br>
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">File Permission</li>
            <li>Purchase Code Verify</li>
            <li>Database Setup</li>
            <li>Admin Setup</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">File Permission</h2>
            <h3 class="fs-subtitle">Bellow file must be writable</h3><br>
            <div class="permission">
                <?php
      // Checking whether db config file is writtable
      $is_writable_autoload   = is_writable('./application/config/autoload.php');
      $is_writable_database   = is_writable('./application/config/database.php');
      $is_writable_routes     = is_writable('./application/config/routes.php');
      $is_curl_enable         = in_array  ('curl', get_loaded_extensions());
      if ($is_writable_database   = true ):?>
                    <p>OK ! 'application/config/database.php' is <span style="color:#063;font-weight:bold;">writtable</span></p><br>
                    <?php
  else:?>
                        <p class="error">Opps ! 'application/config/database.php' is not writtable</p><br>
                        <?php endif;?>

                        <?php
  if ($is_writable_autoload   == true ):?>

                            <p>OK ! 'application/config/autoload.php' is <span style="color:#063;font-weight:bold;">writtable</span></p><br>
                            <?php
  else:?>
                                <p class="error">Opps ! 'application/config/autoload.php' is not writtable</p><br>
                                <?php endif;?>


                                <?php
      // Checking whether db config file is writtable
  if ($is_writable_routes ==true ):?>
                                    <p>OK ! 'application/config/routes.php' is <span style="color:#063;font-weight:bold;">writtable</span></p><br>

                                    <?php
      else:?>
                                        <p class="error">Opps ! 'application/config/routes.php' is not writtable</p><br>
                                        <?php endif;?>
                                        <?php
      // Checking whether db config file is writtable
  if ($is_curl_enable ==true ):?>
                                            <p>OK ! php CURL function is <span style="color:#063;font-weight:bold;">enable</span></p><br>
                                            <?php
  else:?>
                                                <p class="error">Opps ! php CURL function is not enable</p><br>
                                                <?php endif;?>
                                                <?php if($is_writable_autoload!=false && $is_writable_database !=false && $is_writable_routes!=false && $is_curl_enable!=false): ?>

            </div>

            
            <input type="button" name="next" class="1st_next action-button" value="Next" />
            <?php endif; ?>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Purchase Code Verify</h2>
            <h3 class="fs-subtitle">Enter your envato purchase information</h3>
            <input type="text" id="buyer" name="buyer" placeholder="Envato/codecanyon username" />
            <div class="error" id="buyer_error"></div>
            <input type="text" id="purchase_code" name="purchase_code" placeholder="Item Purchase Code" />
            <div class="error" id="purchase_code_error"></div>
            <div id="error_pc" class="error"></div>
            <div style="margin-top: 12px;margin-bottom: 30px;float: left;">
                <a href="#" id="btn_check_pc" class="check-button">Test</a>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="2nd_next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Database Setup</h2>
            <h3 class="fs-subtitle">Enter database access information</h3>
            <input type="text" id="hostname" name="hostname" value="localhost" placeholder="Host name / Server IP" />
            <div class="error" id="hostname_error"></div>
            <input type="text" id="db_name" name="db_name" placeholder="Database Name" />
            <div class="error" id="db_name_error"></div>
            <input type="text" id="db_username" name="db_username" placeholder="Database Username" />
            <div class="error" id="db_username_error"></div>
            <input type="password" id="db_password" name="db_password" placeholder="Database Password" />
            <div class="error" id="db_password_error"></div>
            <div id="error_db" class="error"></div>
            <div style="margin-top: 12px;margin-bottom: 30px;float: left;">
                <a href="#" id="btn_check" class="check-button">Test</a>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="3rd_next action-button" value="Next" />
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Admin Setup</h2>
            <h3 class="fs-subtitle">Administration login details</h3>
            <input type="text" id="site_name" name="site_name" placeholder="Site name" />
            <div class="error" id="site_name_error"></div>
            <input type="email" id="email" name="email" placeholder="Email" />
            <div class="error" id="email_error"></div>
            <input type="text" id="login_username" name="login_username" class="form-control" placeholder="Login Username" />
            <div class="error" id="login_username_error"></div>
            <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Login Password" />
            <div class="error" id="login_password_error"></div>
            <div class="error" id="installation_error"></div>
            <div class="error" id="loader_area" >           
            <div class="loader" ></div>
            <h2 style="text-align: center;margin-top: -20px;">Installing ! Please Wait....</h2>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" id="submit_btn" class="submit2 action-button" value="Start Setup" />
        </fieldset>
    </form>
    <!-- jQuery -->
    <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
    <script>
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".1st_next").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".2nd_next").click(function() {
            $(".error").fadeOut();
            buyer = $("#buyer").val();
            purchase_code = $("#purchase_code").val();
            if (buyer == '') {
                var hasError = true;
                $("#buyer_error").fadeIn();
                $("#buyer_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Buyer must not be blank.</p>');
            }
            if (purchase_code == '') {
                var hasError = true;
                $("#purchase_code_error").fadeIn();
                $("#purchase_code_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Purchase code must not be blank.</p>');
            }
            if (hasError != true) {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')'
                        });
                        next_fs.css({
                            'left': left,
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });

            }
        });

        $(".3rd_next").click(function() {
            $(".error").fadeOut();
            hostname = $("#hostname").val();
            db_username = $("#db_username").val();
            db_password = $("#db_password").val();
            db_name = $("#db_name").val();
            if (hostname == '') {
                var hasError = true;
                $("#hostname_error").fadeIn();
                $("#hostname_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Hostname must not be blank.</p>');
            }
            if (db_username == '') {
                var hasError = true;
                $("#db_username_error").fadeIn();
                $("#db_username_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Database username must not be blank.</p>');
            }
            if (db_name == '') {
                var hasError = true;
                $("#db_name_error").fadeIn();
                $("#db_name_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Database name must not be blank.</p>');
            }
            if (hasError != true) {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')'
                        });
                        next_fs.css({
                            'left': left,
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });

            }
        });

        $(".previous").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function(e) {
            e.preventDefault();
            $(".error").fadeOut();
            var buyer = $("#buyer").val();
            var purchase_code = $("#purchase_code").val();
            var hostname = $("#hostname").val();
            var db_username = $("#db_username").val();
            var db_password = $("#db_password").val();
            var db_name = $("#db_name").val();
            var site_name = $("#site_name").val();
            var email = $("#email").val();
            var login_username = $("#login_username").val();
            var login_password = $("#login_password").val();
            var hasError = false;
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (site_name == '') {
                var hasError = true;
                $("#site_name_error").fadeIn();
                $("#site_name_error").html('<p class="text-danger"><strong>Opps!&nbsp;</strong>School name must not be blank.</p>');
            }
            if (email == '') {
                var hasError = true;
                $("#email_error").fadeIn();
                $("#email_error").html('<p class="text-danger"><strong>Opps!&nbsp;</strong>Email must not be blank.</p>');
            } else if (!emailReg.test(email)) {
                $("#email_error").fadeIn();
                var hasError = true;
                $("#email_error").html('<p class="text-danger">Enter a valid email address.</p>');
            }
            if (login_username == '') {
                var hasError = true;
                $("#login_username_error").fadeIn();
                $("#login_username_error").html('<p class="text-danger"><strong>Opps!&nbsp;</strong>Login username must not be blank.</p>');
            }
            if (login_password == '') {
                var hasError = true;
                $("#login_password_error").fadeIn();
                $("#login_password_error").html('<p class="text-danger"><strong>Opps!&nbsp;</strong>Login password must not be blank.</p>');
            }

            if (hasError != true) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $action_url.'install/run_install'; ?>',
                    data: {
                        "buyer": buyer,
                        "purchase_code": purchase_code,
                        "hostname": hostname,
                        "db_username": db_username,
                        "db_password": db_password,
                        "db_name": db_name,
                        "site_name": site_name,
                        "email": email,
                        "login_username": login_username,
                        "login_password": login_password,
                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $("#error").fadeOut();
                        $("#loader_area").fadeIn();
                        $("#submit_btn").val('Installing..');

                    },
                    success: function(response) {
                        var connection_status = response.connection_status;
                        var installation_status = response.installation_status;
                        var purchase_status = response.purchase_status;
                        var redirect    = "<?php echo $action_url; ?>";
                        //alert(installation_status+'-'+connection_status+'-'+purchase_status);
                        //alert(connection_status);
                        if (installation_status == "success") {
                            $("#loader_area").fadeOut();                            
                            $("#submit_btn").val('Done');
                            $("#submit_btn").attr("disabled", true);
                           $("#installation_error").fadeIn();
                            $("#installation_error").html('<div class="success">Installation Completed.You are redirecting to your site.</div>');
                            window.location.href    =  redirect;
                        } else {
                            if(purchase_status!='success'){
                            $("#loader_area").fadeOut();
                            $("#installation_error").fadeIn();
                            $("#installation_error").html('<div class="error">Installation not complete.Please check your envato username or purchase code.</div>');
                            $("#submit_btn").val('Try Again');
                        }else if(connection_status!='success'){
                            $("#loader_area").fadeOut();
                                $("#installation_error").fadeIn();
                            $("#installation_error").html('<div class="error">Installation not complete.Please check your database details.</div>');
                            $("#submit_btn").val('Try Again');
                        }
                        else{
                            $("#loader_area").fadeOut();
                           $("#installation_error").fadeIn();
                            $("#installation_error").html('<div class="error"><strong>Opps!</strong> Database username or password not correct.Or your database is not exist.</div>');
                            $("#submit_btn").val('Try Again'); 
                        }
                        }
                    }
                });
            }

        });
    </script>
    <script>
        $('#btn_check_pc').click(function() {
            $(".error").fadeOut();
            buyer = $("#buyer").val();
            purchase_code = $("#purchase_code").val();
            if (buyer == '') {
                var hasError = true;
                $("#buyer_error").fadeIn();
                $("#buyer_error").html('<p><strong>Opps!&nbsp;</strong>Buyer must not be blank.</p>');
            }
            if (purchase_code == '') {
                var hasError = true;
                $("#purchase_code_error").fadeIn();
                $("#purchase_code_error").html('<p><strong>Opps!&nbsp;</strong>Purchase code must not be blank.</p>');
            }
            if (hasError != true) {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $action_url.'install/ajax_check_purchase_code'; ?>',
                    data: {
                        "buyer": buyer,
                        "purchase_code": purchase_code
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $("#error").fadeOut();
                        $("#btn_check_pc").html('<i class="fa-li fa fa-spinner fa-spin"></i> &nbsp; Checking!! &nbsp;Wait...');

                    },
                    success: function(response) {
                        var purchase_status = response.purchase_status;

                        if (purchase_status == "success") {
                            $("#error_pc").fadeIn();
                            $("#btn_check_pc").html('OK!! purchase code is valid');
                            $("#error_pc").html('<div class="success"><strong>Success!</strong> Your item purchase code is verified.</div>');
                        } else {
                            $("#error_pc").fadeIn();
                            $("#btn_check_pc").html('Test Again');
                            $("#error_pc").html('<div class="error"><strong>Sorry!</strong> Your item username or purchase code is not valid.</div>');
                        }
                    }
                });
            }
        });
    </script>
    <!-- ajax connection check-->
    <script type="text/javascript">
        $('#btn_check').click(function() {

            $(".error").fadeOut();
            hostname = $("#hostname").val();
            db_username = $("#db_username").val();
            db_password = $("#db_password").val();
            db_name = $("#db_name").val();
            if (hostname == '') {
                var hasError = true;
                $("#hostname_error").fadeIn();
                $("#hostname_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Hostname must not be blank.</p>');
            }
            if (db_username == '') {
                var hasError = true;
                $("#db_username_error").fadeIn();
                $("#db_username_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Database username must not be blank.</p>');
            }
            if (db_name == '') {
                var hasError = true;
                $("#db_name_error").fadeIn();
                $("#db_name_error").html('<p class="error"><strong>Opps!&nbsp;</strong>Database name must not be blank.</p>');
            }
            if (hasError != true) {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $action_url.'install/check_installation_connection'; ?>',
                    data: {
                        "hostname": hostname,
                        "db_username": db_username,
                        "db_password": db_password,
                        "db_name": db_name
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $("#error").fadeOut();
                        $("#btn_check").html('Checking...');

                    },
                    success: function(response) {
                        var connection_status = response.connection_status;
                        if (connection_status == "success") {
                            $("#error_db").fadeIn();
                            $("#btn_check").html('<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Connection OK');
                            $("#error_db").html('<div class="success"><strong>Well done!</strong> Your database connection is ready to install.</div>');
                        } else {
                            $("#error_db").fadeIn();
                            $("#btn_check").html('Test Again');
                            $("#error_db").html('<div class="error">Database username or password not correct.Or your database is not exist.</div>');
                        }
                    }
                });
            }
        });
    </script>
    <!-- ajax connection check end-->

</body>

</html>