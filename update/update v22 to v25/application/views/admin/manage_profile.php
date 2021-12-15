<div class="card"> 

      <?php foreach($profile_info as $row):?>
      
      <!-- panel  -->
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-border panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Profile Information</h3>
            </div>
            <div class="panel-body"> 
              <!-- panel  -->
              <?php echo form_open(base_url() . 'admin/profile/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
              
              <div class="profile-info-name text-center"> <img id="profile_image" src="<?php echo $this->common_model->get_img('user', $row['user_id']).'?'.time(); ?>" class="thumb-lg img-circle img-thumbnail" alt="<?php echo $row['name'];?>_photo" >
                <h4 class="m-b-5"><b><?php echo $row['name'];?></b></h4>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-sm-3">Change Photo</label>
                <div class="col-sm-6">
                  <input type="file" onchange="showImg(this);" name="photo" class="filestyle" data-input="false" accept="image/*">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                  <input type="text"  value="<?php echo $row['name'];?>" name="name" class="form-control" required placeholder="Enter Name" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                  <input type="email"  value="<?php echo $row['email'];?>" name="email" class="form-control" required placeholder="Enter email" />
                </div>
              </div>
              <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <button type="submit" class="btn btn-primary"><span class="btn-label"><i class="fa fa-refresh"></i></span>Update </button>
              </div>
              </form>
            </div>
            <!--end panel body --> 
          </div>
          <!--end panel --> 
        </div>
        <!--end col-6 -->
        <?php endforeach;?>
        <?php echo form_open(base_url() . 'admin/profile/change_password/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
        <div class="col-md-6">
          <div class="panel panel-border panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Change Password</h3>
            </div>
            <div class="panel-body"> <br>
              <br>
              <br>
              <!-- panel  -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Current Password</label>
                <div class="col-sm-6">
                  <input type="password"  name="password" class="form-control" required placeholder="Enter current password" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">New Password</label>
                <div class="col-sm-6">
                  <input type="password"  id="new_password" name="new_password" class="form-control" required placeholder="Enter new password" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Retype New Password</label>
                <div class="col-sm-6">
                  <input type="password"  data-parsley-equalto="#new_password" name="retype_new_password" class="form-control" required placeholder="Enter new password" />
                </div>
              </div>
              <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <button type="submit" class="btn btn-primary"><span class="btn-label"><i class="fa fa-refresh"></i></span> Change Now</button>
              </div>
              <br>
              <br><br><br><br><br>
              </form>
            </div>
            <!--end panel body --> 
          </div>
          <!--end panel --> 
        </div>
        <!--end col-6 --> 
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

<!--instant image dispaly--> 
<script type="text/javascript">
   function showImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profile_image')
                        .attr('src', e.target.result)                        
                };
                reader.readAsDataURL(input.files[0]);
              }
        }
</script> 
<!--end instant image dispaly--> 

