<?php echo form_open(base_url() . 'admin/manage_user/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">New User information</h4>
<hr>
<div class="form-group">
  <label class="control-label"><?php echo tr_wd('full_name'); ?></label>
  <input type="text"  name="name" class="form-control" placeholder="Enter user full name" />
</div>
<div class="form-group">
  <label class="control-label"><?php echo tr_wd('email'); ?></label>
  <input type="text"  name="email"  class="form-control"  placeholder="Enter email" />
</div>

<div class="form-group">
  <label class="control-label">Login Password</label>
    <input type="password"  name="password"  class="form-control"  placeholder="Enter login password" />
</div>


<div class="form-group">
  <label class="control-label">User Role</label>
  <select  class="form-control"  name="role" required>      <
    <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
  </select>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
  </div>
</div>
</form>
<script>
  jQuery(document).ready(function() {
    $('form').parsley();                            

    });
</script> 
