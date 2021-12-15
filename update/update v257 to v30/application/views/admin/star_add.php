<?php echo form_open(base_url() . 'admin/manage_star/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">New Star Information</h4>
<hr>
<div class="form-group">
  <label class="control-label">Star Type</label>
  <select  class="form-control"  name="star_type" required>
    <option value="actor">Actor</option>
    <option value="director">Director</option>
    <option value="writer">Writer</option>
  </select>
</div>
<!-- end form -group -->
<div class="form-group">
  <label class="control-label"><?php echo tr_wd('star_name'); ?></label>
  <input type="text"  name="star_name" class="form-control" placeholder="Enter star full name" required />
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="control-label">Star Bio</label>
  <input type="text"  name="star_desc"  class="form-control"  placeholder="Enter star information" />
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="control-label col-sm-3">Photo</label>
  <input type="file" name="photo" class="filestyle" data-input="false" accept="image/*">
</div>

<div class="form-group">
  <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
  <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
</div>
</form>
<script>
        jQuery(document).ready(function() {
          $('form').parsley();                            

          });
</script>


