<?php
    $users    = $this->db->get_where('user' , array('user_id' => $param2) )->result_array();
    foreach ( $users as $row):
?>
<?php echo form_open(base_url() . 'admin/manage_user/update/'.$param2 , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">Edit user information</h4>
<hr>
<div class="form-group">
  <label class="col-sm-3 control-label">Full Name</label>
  <div class="col-sm-6">
    <input type="text"  name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter user full name" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="col-sm-3 control-label">Login Username</label>
  <div class="col-sm-6">
    <input type="text"  name="username" value="<?php echo $row['username']; ?>"  class="form-control"  placeholder="Enter login username" required />
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
  <label class="col-sm-3 control-label">Email</label>
  <div class="col-sm-6">
    <input type="text"  name="email" value="<?php echo $row['email']; ?>"  class="form-control"  placeholder="Enter email" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<div class="form-group">
  <label class="col-sm-3 control-label">User Role</label>
  <div class="col-sm-6 ">
    <select  class="form-control"  name="role" required>
      <
      <option value="admin" <?php if($row['role']=="admin"){ echo "selected"; }?>>Admin</option>
      <option value="subscriber"  <?php if($row['role']=="subscriber"){ echo "selected"; }?>>Subscriber</option>
    </select>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->

<?php endforeach; ?>
<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"><span class="btn-label"><i class="fa fa-floppy-o"></i></span>SAVE </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
</form>
<script>
        jQuery(document).ready(function() {
          $(".select2").select2();
          $('form').parsley();                            

          });
</script> 
