<?php echo form_open(base_url() . 'admin/manage_user/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">New User information</h4>
<hr>
<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo tr_wd('full_name'); ?></label>
  <div class="col-sm-6">
    <input type="text"  name="name" class="form-control" placeholder="Enter user full name" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo tr_wd('username'); ?></label>
  <div class="col-sm-6">
    <input type="text"  name="username"  class="form-control"  placeholder="Enter login username" required />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
<div class="form-group">
  <label class="col-sm-3 control-label">Login Password</label>
  <div class="col-sm-6">
    <input type="password"  name="password"  class="form-control"  placeholder="Enter login password" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo tr_wd('email'); ?></label>
  <div class="col-sm-6">
    <input type="text"  name="email"  class="form-control"  placeholder="Enter email" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="col-sm-3 control-label">User Role</label>
  <div class="col-sm-6 ">
    <select  class="form-control"  name="role" required>
      <
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

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
