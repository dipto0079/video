
<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container"> 
  <!-- Page-Title -->
  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-border panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo tr_wd('change_theme_color') ?></h3>
        </div>
        <div class="panel-body"> 
          
          <!-- panel  -->
          
          <h5 class="header-title m-t-0 font-13"><?php echo tr_wd('select_theme') ?></h5>
          <p class="text-muted m-b-30 font-13"><?php echo tr_wd('click_to_change') ?></p>
          <a href="<?php echo base_url().'theme/change/F08080'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#F08080;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>indian red</a> <a href="<?php echo base_url().'theme/change/FF69B4'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#FF69B4;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>hotping</a> <a href="<?php echo base_url().'theme/change/DB7093'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#DB7093;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>deep ping</a> <a href="<?php echo base_url().'theme/change/FF7F50'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#FF7F50;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>coral</a> <a href="<?php echo base_url().'theme/change/DDA0DD'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#DDA0DD;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>plum</a> <a href="<?php echo base_url().'theme/change/3CB371'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#3CB371;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>mediumseagreen</a> <a href="<?php echo base_url().'theme/change/48D1CC'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#48D1CC;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>MediumTurquoise</a> <a href="<?php echo base_url().'theme/change/5F9EA0'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#5F9EA0;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>Code Blue</a> <a href="<?php echo base_url().'theme/change/BC8F8F'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#BC8F8F;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>RosyBrown</a> <a href="<?php echo base_url().'theme/change/2F4F4F'; ?>"  class="btn waves-effect waves-light m-t-15 m-b-15" style="background-color:#2F4F4F;color:#fff;"><span class="btn-label"><i class="fa fa-check"></i> </span>DarkSlateGrey</a>
          <h2 class="text-center">OR</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo tr_wd('change_theme_color') ?></h3>
                </div>
                <div class="panel-body"> 
                  
                  <!-- panel  -->
                  <h5 class="header-title m-t-0 font-13"><?php echo tr_wd('custom_theme_color') ?></h5>
                  <p class="text-muted m-b-30 font-13"><?php echo tr_wd('drop_custom_color') ?></p>
                  <div class="form-group"> <?php echo form_open(base_url() . 'theme/change/add' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
                    <label class="col-sm-3 control-label"><?php echo tr_wd('color') ?></label>
                    <div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="colorpicker-default input-group">
                      <input type="text" name="color" readonly="readonly" value="" class="form-control" required>
                      <span class="input-group-btn add-on">
                      <button class="btn btn-white" type="button"> <i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i> </button>
                      </span> </div>
                  </div>
                  <button type="submit"  class="btn btn-sm btn-success waves-effect pull-right " id="submit_button"><span class="btn-label"><i class="fa fa-plus"></i></span> <?php echo tr_wd('set_as_theme_color') ?> </button>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo tr_wd('change_theme_color') ?></h3>
                </div>
                <div class="panel-body"> 
                  
                  <!-- panel  -->
                  
                  <h5 class="header-title m-t-15 font-13"><?php echo tr_wd('default_theme') ?></h5>
                  <p class="text-muted m-b-15 font-13"><?php echo tr_wd('click to change default') ?></p>
                  <a href="<?php echo base_url().'theme/change/73CBCE'; ?>"  class="btn btn-lg waves-effect waves-light" style="background-color:#73CBCE;color:#fff;"><span class="btn-label"><i class="fa fa-repeat"></i> </span><?php echo tr_wd('reset_theme') ?></a> </div>
              </div>
            </div>
            <!--end panel body --> 
          </div>
          <!--end panel --> 
        </div>
        <!--end col-12 --> 
        
      </div>
    </div>
  </div>
</div>
<!-- container --> 
<!-- content --> 
<script src="<?php echo base_url(); ?>assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
        $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
			});
		</script> 
