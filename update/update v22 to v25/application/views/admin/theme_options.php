<?php 
  $front_end_theme            =   $this->db->get_where('config' , array('title'=>'front_end_theme'))->row()->value;
  $blog_enable                =   $this->db->get_where('config' , array('title'=>'blog_enable'))->row()->value;   
  $dark_theme_enable          =   $this->db->get_where('config' , array('title'=>'dark_theme'))->row()->value;   
  $header_templete            =   $this->db->get_where('config' , array('title'=>'header_templete'))->row()->value;   
  $footer_templete            =   $this->db->get_where('config' , array('title'=>'footer_templete'))->row()->value;   
?>
<div class="card">
  <div class="row"> <?php echo form_open(base_url() . 'admin/theme_options/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
    <!-- panel  -->
    <div class="col-md-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo tr_wd('theme_options'); ?></h3>
        </div>
        <div class="panel-body"> 
          <!-- panel  -->
          
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('purchase_code'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'purchase_code'))->row()->value;?>" name="purchase_code" class="form-control" required  />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('site_name'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'site_name'))->row()->value;?>" name="site_name" class="form-control" required  />
            </div>
          </div>          

          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('site_url'); ?></label>
            <div class="col-sm-6">
              <input type="url"  value="<?php echo $this->db->get_where('config' , array('title' =>'site_url'))->row()->value;?>" name="site_url" class="form-control" required  />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('system_email'); ?></label>
            <div class="col-sm-6">
              <input type="email"  value="<?php echo $this->db->get_where('config' , array('title' =>'system_email'))->row()->value;?>" name="system_email" class="form-control" required />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('business_address'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'business_address'))->row()->value;?>" name="business_address" class="form-control"  />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('business_phone'); ?></label>
            <div class="col-sm-6">
              <input type="number"  value="<?php echo $this->db->get_where('config' , array('title' =>'business_phone'))->row()->value;?>" name="business_phone" class="form-control" data-parsley-length="[10, 14]"  />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('contact_email'); ?></label>
            <div class="col-sm-6">
              <input type="email"  value="<?php echo $this->db->get_where('config' , array('title' =>'contact_email'))->row()->value;?>" name="contact_email" class="form-control"   />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('google_map_api'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'map_api'))->row()->value;?>" name="map_api" class="form-control"   />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('google_map_lat'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'map_lat'))->row()->value;?>" name="map_lat" class="form-control"   />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('google_map_lng'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'map_lng'))->row()->value;?>" name="map_lng" class="form-control"   />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('dark_theme_enable'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="dark_theme" required>
                <option value="1" <?php if($dark_theme_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($dark_theme_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('front_end_theme_color'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="front_end_theme" required>
                <option value="default" <?php if($front_end_theme =="default"){ echo "selected"; }?>>Default</option>
                <option value="green"  <?php if($front_end_theme =="green"){ echo "selected"; }?>>Green</option>
                <option value="blue"  <?php if($front_end_theme =="blue"){ echo "selected"; }?>>Blue</option>
                <option value="red" <?php if($front_end_theme =="red"){ echo "selected"; }?>>Red</option>
                <option value="yellow" <?php if($front_end_theme =="yellow"){ echo "selected"; }?>>Yellow</option>
                <option value="purple" <?php if($front_end_theme =="purple"){ echo "selected"; }?>>Purple</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('header_templete'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="header_templete" required>
                <option value="header1" <?php if($header_templete =="header1"){ echo "selected"; }?>>Default</option>
                <option value="header2"  <?php if($header_templete =="header2"){ echo "selected"; }?>>2</option>
                <option value="header3"  <?php if($header_templete =="header3"){ echo "selected"; }?>>3</option>
                <option value="header4" <?php if($header_templete =="header4"){ echo "selected"; }?>>4</option>
                <option value="header5" <?php if($header_templete =="header5"){ echo "selected"; }?>>5</option>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('footer_templete'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="footer_templete" required>
                <option value="footer1" <?php if($footer_templete =="footer1"){ echo "selected"; }?>>Default</option>
                <option value="footer2"  <?php if($footer_templete =="footer2"){ echo "selected"; }?>>2</option>
                <option value="footer3"  <?php if($footer_templete =="footer3"){ echo "selected"; }?>>3</option>
                <option value="footer4" <?php if($footer_templete =="footer4"){ echo "selected"; }?>>4</option>
                <option value="footer5" <?php if($footer_templete =="footer5"){ echo "selected"; }?>>5</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('blog_enable'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="blog_enable" required>
                <option value="1" <?php if($blog_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($blog_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>

          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span>save changes </button>
          </div>
         <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
      $(document).ready(function() {
        $('form').parsley();
      });
    </script> 

<!-- file select--> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script> 
<!-- file select--> 

