<?php 
$live_tv_publish           =   $this->db->get_where('config' , array('title'=>'live_tv_publish'))->row()->value;
$live_tv_title           =   $this->db->get_where('config' , array('title'=>'live_tv_title'))->row()->value;
$live_tv_keyword           =   $this->db->get_where('config' , array('title'=>'live_tv_keyword'))->row()->value;
$live_tv_meta_description           =   $this->db->get_where('config' , array('title'=>'live_tv_meta_description'))->row()->value;
$live_tv_pin_primary_menu           =   $this->db->get_where('config' , array('title'=>'live_tv_pin_primary_menu'))->row()->value;
$live_tv_pin_footer_menu           =   $this->db->get_where('config' , array('title'=>'live_tv_pin_footer_menu'))->row()->value;
?>
<div class="card">
  <div class="row"> <?php echo form_open(base_url() . 'admin/live_tv_setting/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
    <!-- panel  -->
    <div class="col-md-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo tr_wd('live_tv_setting'); ?></h3>
        </div>
        <div class="panel-body"> 
          <!-- panel  -->      
          

          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('title(SEO)'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'live_tv_title'))->row()->value;?>" name="live_tv_title" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('meta_description(SEO)'); ?></label>
            <div class="col-sm-6">
              <textarea class="wysihtml5 form-control" name="live_tv_meta_description" id="description" rows="10">
                <?php echo $this->db->get_where('config' , array('title' =>'live_tv_meta_description'))->row()->value;?>
              </textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo tr_wd('keyword(SEO)'); ?></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'live_tv_keyword'))->row()->value;?>" id="live_tv_keyword" name="live_tv_keyword" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 "><?php echo tr_wd('primary_menu'); ?></label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="live_tv_pin_primary_menu" <?php if($live_tv_pin_primary_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 "><?php echo tr_wd('footer_menu'); ?></label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="live_tv_pin_footer_menu" <?php if($live_tv_pin_footer_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 "><?php echo tr_wd('published'); ?></label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="live_tv_publish" <?php if($live_tv_publish =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
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
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script>
  jQuery(document).ready(function() {
      $('#live_tv_keyword').tagsinput();
    });
</script>

