<?php
  $registration_enable        = $this->db->get_where('config' , array('title' =>'purchase_code'))->row()->value; 
  $frontend_login_enable      = $this->db->get_where('config' , array('title' =>'frontend_login_enable'))->row()->value; 
  $blog_enable                = $this->db->get_where('config' , array('title' =>'blog_enable'))->row()->value; 
  $country_to_primary_menu    = $this->db->get_where('config' , array('title' =>'country_to_primary_menu'))->row()->value; 
  $genre_to_primary_menu      = $this->db->get_where('config' , array('title' =>'genre_to_primary_menu'))->row()->value; 
  $release_to_primary_menu    = $this->db->get_where('config' , array('title' =>'release_to_primary_menu'))->row()->value; 
  $contact_to_primary_menu    = $this->db->get_where('config' , array('title' =>'contact_to_primary_menu'))->row()->value; 
  $contact_to_footer_menu     = $this->db->get_where('config' , array('title' =>'contact_to_footer_menu'))->row()->value; 
  $show_star_image            = $this->db->get_where('config' , array('title' =>'show_star_image'))->row()->value; 
  $movie_report_enable        = $this->db->get_where('config' , array('title' =>'movie_report_enable'))->row()->value; 
  $movie_report_email         = $this->db->get_where('config' , array('title' =>'movie_report_email'))->row()->value; 
  $movie_request_enable       = $this->db->get_where('config' , array('title' =>'movie_request_enable'))->row()->value; 
  $movie_request_email        = $this->db->get_where('config' , array('title' =>'movie_request_email'))->row()->value; 
 ?>

<?php echo form_open(base_url() . 'admin/system_setting/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
<div class="card">
  <div class="row"> 
    <!-- panel  -->
    <div class="col-md-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo tr_wd('theme_options'); ?></h3>
        </div>
        <div class="panel-body"> 
          <!-- panel  -->
          
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('purchase_code'); ?></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'purchase_code'))->row()->value;?>" name="purchase_code" class="form-control" required  />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><strong>API URL FOR ANDROID</strong></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo base_url('api/') ?>" readonly class="form-control" required data-parsley-length="[14, 128]" />
              <p><small>Copy &amp; paste this URL to Android Source Code.</small></p>
            </div>
          </div>          

          <div class="form-group row">
            <label class="col-sm-3 control-label"><strong>API KEY FOR ANDROID</strong></label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'mobile_apps_api_secret_key'))->row()->value;?>" name="mobile_apps_api_secret_key" class="form-control" required data-parsley-length="[14, 128]" />
            </div>
            <div class="col-sm-3">
              <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/regenerate_mobile_secret_key'); ?>">Create New Key</a>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label"><strong>Terms URL FOR ANDROID</strong></label>
            <div class="col-sm-9">
              Create a page from Page > New page then Create a page with Tearms &amp; Policy Content.
              <p><small>Then Copy &amp; paste page URL to Android Source Code.</small></p>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('site_name'); ?></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'site_name'))->row()->value;?>" name="site_name" class="form-control" required  />
            </div>
          </div>          

          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('site_url'); ?></label>
            <div class="col-sm-9">
              <input type="url"  value="<?php echo $this->db->get_where('config' , array('title' =>'site_url'))->row()->value;?>" name="site_url" class="form-control" required  />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('system_email'); ?></label>
            <div class="col-sm-9">
              <input type="email"  value="<?php echo $this->db->get_where('config' , array('title' =>'system_email'))->row()->value;?>" name="system_email" class="form-control" required />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('business_address'); ?></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'business_address'))->row()->value;?>" name="business_address" class="form-control"  />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('business_phone'); ?></label>
            <div class="col-sm-9">
              <input type="number"  value="<?php echo $this->db->get_where('config' , array('title' =>'business_phone'))->row()->value;?>" name="business_phone" class="form-control" data-parsley-length="[10, 14]"  />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('contact_email'); ?></label>
            <div class="col-sm-9">
              <input type="email"  value="<?php echo $this->db->get_where('config' , array('title' =>'contact_email'))->row()->value;?>" name="contact_email" class="form-control"   />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('registration_enable'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="registration_enable" required>
                <option value="1" <?php if($registration_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($registration_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Front-End Login</label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="frontend_login_enable" required>
                <option value="1" <?php if($frontend_login_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($frontend_login_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('blog_enable'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="blog_enable" required>
                <option value="1" <?php if($blog_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($blog_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Show Country to Main Menu</label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="country_to_primary_menu" <?php if($country_to_primary_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Show Genre to Main Menu</label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="genre_to_primary_menu" <?php if($genre_to_primary_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Show Release to Main Menu</label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="release_to_primary_menu" <?php if($release_to_primary_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Show Contact to Main Menu</label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="contact_to_primary_menu" <?php if($contact_to_primary_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Show Contact to Footer Menu</label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="contact_to_footer_menu" <?php if($contact_to_footer_menu =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Show Actor,Director & Writer Image to Movie Page</label>
            <div class="col-sm-6">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="show_star_image" <?php if($show_star_image =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Enable Movie Report</label>
            <div class="col-sm-9">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="movie_report_enable" <?php if($movie_report_enable =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Movie Report send to(email)</label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $movie_report_email; ?>" name="movie_report_email" class="form-control"   />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Movie Report Atention Text</label>
            <div class="col-sm-6">
              <textarea type="text"  rows="4" name="movie_report_note" class="form-control"><?php echo $movie_report_note; ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3 ">Enable Movie Request</label>
            <div class="col-sm-9">
              <div class="toggle">
                <label>
                  <input type="checkbox" name="movie_request_enable" <?php if($movie_request_enable =='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Movie Request send to(email)</label>
            <div class="col-sm-6">
              <input type="text"  value="<?php echo $movie_request_email; ?>" name="movie_request_email" class="form-control"   />
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

<!--instant image dispaly-->
<script type="text/javascript">
    function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#landing_page_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<!--end instant image dispaly-->

