<?php echo form_open(base_url() . 'admin/manage_star/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">New Star Information</h4>
<hr>
<div class="form-group">
  <label class="col-sm-3 control-label">Star Type</label>
  <div class="col-sm-6 ">
    <select  class="form-control"  name="star_type" required>
      <option value="actor">Actor</option>
      <option value="director">Director</option>
      <option value="writer">Writer</option>
    </select>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo tr_wd('star_name'); ?></label>
  <div class="col-sm-6">
    <input type="text"  name="star_name" class="form-control" placeholder="Enter star full name" required />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo tr_wd('star_info'); ?></label>
  <div class="col-sm-6">
    <input type="text"  name="star_desc"  class="form-control"  placeholder="Enter star information" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="control-label col-sm-3">Photo</label>
  <div class="col-sm-6">
    <input type="file" name="photo" class="filestyle" data-input="false" accept="image/*">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
</form>
<script>
        jQuery(document).ready(function() {
          $('form').parsley();                            

          });
</script>


