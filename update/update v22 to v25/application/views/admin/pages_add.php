<div class="card">
  <div class="row">
    <div class="col-sm-12"> <?php echo form_open(base_url() . 'admin/pages/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
      <h4 class="text-center"><?php echo tr_wd('add_new_post') ?></h4>
      <hr>
      <div class="form-group">
        <label class=" col-sm-3 control-label"><?php echo tr_wd('page_title'); ?></label>
        <div class="col-sm-8">
          <input type="text" name="page_title" id="title" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class=" col-sm-3 control-label"><?php echo tr_wd('slug'); ?> (<?php echo base_url(); ?>)</label>            
        <div class="col-sm-8">
         <input type="text" id="slug" name="slug" class="form-control input-sm" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"><?php echo tr_wd('content'); ?></label>
        <div class="col-md-8">
          <textarea class="wysihtml5 form-control" name="content" id="content" rows="10"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"><?php echo tr_wd('hook_to'); ?></label>
        <div class="col-sm-8">
        <div class="animated-checkbox checkbox-inline">
          <label>
            <input type="checkbox" name='primary_menu' value="1" required><span class="label-text"><?php echo tr_wd('primary_menu'); ?> </span>
          </label>
        </div>
        <div class="animated-checkbox checkbox-inline">
          <label>
            <input type="checkbox" name='footer_menu' value="1" required><span class="label-text"><?php echo tr_wd('footer_menu'); ?> </span>
          </label>
        </div>
        </div>
      </div>          
      <div class="form-group">
        <label class="control-label col-md-3"><?php echo tr_wd('publication'); ?></label>
        <div class="col-sm-8">
          <select class="form-control m-bot15" name="publication">
            <option value="1"><?php echo tr_wd('published'); ?></option>
            <option value="0"><?php echo tr_wd('unpublished'); ?></option>
          </select>
        </div>
      </div>
      <h4 class="text-center"><?php echo tr_wd('seo_setting') ?></h4>
      <hr>
      <div class="form-group">
        <label class=" col-sm-3 control-label"><?php echo tr_wd('focus_keyword'); ?></label>
        <div class="col-sm-8">
          <input type="text" name="focus_keyword" id="focus_keyword" class="form-control" >
          <br>
          <p>use comma(,) to separate keyword.</p>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"><?php echo tr_wd('meta_description'); ?></label>
        <div class="col-md-8">
          <textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9 m-t-15">
          <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
      $('form').parsley();
  });
</script> 

<!-- select2--> 
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script> 
<!-- select2--> 



<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- select2-->

<!--form validation init-->
<script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script>
    jQuery(document).ready(function() {


        $('#content').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('#stars').tagsinput();
        $('#focus_keyword').tagsinput();

        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^\w ]+/g, '');
            Text = Text.replace(/ +/g, '-');
            $("#slug").val(Text);
        });


    });

</script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
