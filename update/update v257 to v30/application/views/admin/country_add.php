<?php echo form_open(base_url() . 'admin/country/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">New Country Add</h4>
<hr>
<div class="form-group">
    <label class=" col-sm-3 control-label"><?php echo tr_wd('name'); ?></label>
    <div class="col-sm-12">
        <input type="text" name="name" class="form-control" required>
    </div>
</div>
                    
<div class="form-group">
    <label class="control-label col-md-3"><?php echo tr_wd('description'); ?></label>
    <div class="col-md-12">
        <textarea class="wysihtml5 form-control" name="description" rows="10"></textarea>
    </div>
</div>
                    
<div class="form-group">
    <label class="control-label col-md-3"><?php echo tr_wd('publication'); ?></label>
    <div class="col-sm-12">
        <select class="form-control m-bot15" name="publication">
        <option value="1"><?php echo tr_wd('published'); ?></option>
        <option value="0"><?php echo tr_wd('unpublished'); ?></option>
        </select>
    </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
  </div>
</div>
<?php form_close(); ?>
<script>
    jQuery(document).ready(function() {
      $('form').parsley();
    });
</script> 
