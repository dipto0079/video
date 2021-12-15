<?php $front_end_theme           =   $this->db->get_where('config' , array('title'=>'front_end_theme'))->row()->value;   ?>
<div class="card">
  <div class="row"> <?php echo form_open(base_url() . 'admin/email_setting/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data','id'=>'mail'));?> 
    <!-- panel  -->
    <div class="col-md-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo tr_wd('email_setting'); ?></h3>
        </div>
        <div class="panel-body">
          <!-- panel  -->     
          <h4>Contact Email</h4>
          <hr>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('contact_email'); ?></label>
            <div class="col-sm-6">
              <input type="email"  value="<?php echo $this->db->get_where('config' , array('title' =>'contact_email'))->row()->value;?>" name="contact_email" class="form-control"   />
              <p>All contact mail will send to this email..</p>
            </div>
          </div>
          <h4>Outgoing Server Configuration</h4>
          <hr>          
          <div class="form-group">
            <label class="control-label col-md-3"><?php echo tr_wd('mail_type'); ?></label>
            <div class="col-sm-3">
                <select class="form-control m-bot15" id="protocol" name="protocol">
                  <option value="smtp" <?php if($this->db->get_where('config' , array('title' =>'protocol'))->row()->value=='smtp'){echo 'selected';}?> ><?php echo tr_wd('smtp (Recommanded)'); ?></option>
                  <option value="sendmail" <?php if($this->db->get_where('config' , array('title' =>'protocol'))->row()->value=='sendmail'){echo 'selected';}?> ><?php echo tr_wd('sendmail'); ?></option>
                </select>
            </div>
          </div>

          <div id="smtp">
            <div class="form-group">
              <label class="col-sm-3 control-label"><?php echo tr_wd('smtp_server_address'); ?></label>
              <div class="col-sm-6">
                <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'smtp_host'))->row()->value;?>" name="smtp_host" class="form-control"   placeholder="ex: smtp.gmail.com"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"><?php echo tr_wd('smtp_username'); ?></label>
              <div class="col-sm-6">
                <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'smtp_user'))->row()->value;?>" name="smtp_user" class="form-control"   placeholder="ex: example@gmail.com"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"><?php echo tr_wd('smtp_password'); ?></label>
              <div class="col-sm-6">
                <input type="password"  value="<?php echo $this->db->get_where('config' , array('title' =>'smtp_pass'))->row()->value;?>" name="smtp_pass" class="form-control"   placeholder="ex: ******"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"><?php echo tr_wd('smtp_port'); ?></label>
              <div class="col-sm-6">
                <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'smtp_port'))->row()->value;?>" name="smtp_port" class="form-control"   placeholder="ex: 465"/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3"><?php echo tr_wd('smtp_crypto'); ?></label>
              <div class="col-sm-3">
                  <select class="form-control m-bot15" id="slider_type" name="smtp_crypto">
                    <option value="ssl" <?php if($this->db->get_where('config' , array('title' =>'smtp_crypto'))->row()->value=='ssl'){echo 'selected';}?> ><?php echo tr_wd('ssl'); ?></option>
                    <option value="tls" <?php if($this->db->get_where('config' , array('title' =>'smtp_crypto'))->row()->value=='tls'){echo 'selected';}?> ><?php echo tr_wd('tls'); ?></option>
                  </select>
              </div>
            </div>
          </div>
          <div id="sendmail">
            <div class="form-group">
              <label class="col-sm-3 control-label"><?php echo tr_wd('mail_path'); ?></label>
              <div class="col-sm-6">
                <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'mailpath'))->row()->value;?>" name="mailpath" class="form-control"   placeholder="ex: /usr/bin/sendmail"/>
              </div>
            </div>
          </div>


          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span>save changes </button>
          </div>
         <?php echo form_close(); ?>
        </div>
      </div>

      <div class="col-lg-6 col-md-offset-3">
        <div class="panel panel-border panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Test Configuration</h3>
          </div>
          <div class="panel-body">
            <div class="form-group m-b-0">
                <?php echo form_open(base_url() . 'admin/test_mail' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data','id'=>'test-mail'));?>                
                  <div class="input-group">
                    <input type="email" class="form-control" name='email' value="<?php echo $this->db->get_where('config' , array('title' =>'contact_email'))->row()->value;?>" placeholder="Enter your email" required>
                    <span class="input-group-btn">
                    <button type="submit" id="import_btn" class="btn btn-primary w-sm waves-effect waves-light"> Test </button>
                    
                    </span> </div>
                    <div id="result"></div>
                <?php echo form_close(); ?>        
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        <?php $protocol=$this->db->get_where('config' , array('title' =>'protocol'))->row()->value;
        if ($protocol=='smtp'):?>
        $("#sendmail").fadeOut();
        <?php endif; if ($protocol=='sendmail'):?>
        $("#smtp").fadeOut();
        <?php endif;?>
        
    });
    $("#protocol").change(function() {
        var protocol = $("#protocol option:selected").val();
        if (protocol == 'smtp') {
            $("#smtp").fadeIn();
            $("#sendmail").fadeOut();
        } else if (protocol == 'sendmail') {
            $("#smtp").fadeOut();
            $("#sendmail").fadeIn();
        }
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
      $(document).ready(function() {
        $('#mail').parsley();
        $('#test-mail').parsley();
      });
    </script> 

<!-- file select--> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script> 
<!-- file select--> 

