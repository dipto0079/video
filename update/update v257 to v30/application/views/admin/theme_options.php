<?php 
  $front_end_theme            =   $this->db->get_where('config' , array('title'=>'front_end_theme'))->row()->value;
  $frontend_login_enable      =   $this->db->get_where('config' , array('title'=>'frontend_login_enable'))->row()->value;    
  $registration_enable        =   $this->db->get_where('config' , array('title'=>'registration_enable'))->row()->value;   
  $blog_enable                =   $this->db->get_where('config' , array('title'=>'blog_enable'))->row()->value;   
  $dark_theme_enable          =   $this->db->get_where('config' , array('title'=>'dark_theme'))->row()->value;   
  $header_templete            =   $this->db->get_where('config' , array('title'=>'header_templete'))->row()->value;   
  $footer_templete            =   $this->db->get_where('config' , array('title'=>'footer_templete'))->row()->value;   
  $landing_page_enable        =   $this->db->get_where('config' , array('title'=>'landing_page_enable'))->row()->value; 
  $landing_page_image_url     =   $this->db->get_where('config' , array('title' =>'landing_page_image_url'))->row()->value;
  $country_to_primary_menu    =   $this->db->get_where('config' , array('title'=>'country_to_primary_menu'))->row()->value;
  $genre_to_primary_menu      =   $this->db->get_where('config' , array('title'=>'genre_to_primary_menu'))->row()->value;  
  $release_to_primary_menu    =   $this->db->get_where('config' , array('title'=>'release_to_primary_menu'))->row()->value;  
  $contact_to_primary_menu    =   $this->db->get_where('config' , array('title'=>'contact_to_primary_menu'))->row()->value;  
  $contact_to_footer_menu     =   $this->db->get_where('config' , array('title'=>'contact_to_footer_menu'))->row()->value;  
  $show_star_image            =   $this->db->get_where('config' , array('title'=>'show_star_image'))->row()->value;
  $movie_report_enable        =   $this->db->get_where('config' , array('title'=>'movie_report_enable'))->row()->value;  
  $movie_report_note          =   $this->db->get_where('config' , array('title'=>'movie_report_note'))->row()->value;  
  $movie_report_email         =   $this->db->get_where('config' , array('title'=>'movie_report_email'))->row()->value;
  $movie_request_enable       =   $this->db->get_where('config' , array('title'=>'movie_request_enable'))->row()->value; 
  $movie_request_email        =   $this->db->get_where('config' , array('title'=>'movie_request_email'))->row()->value;   
?>
<?php echo form_open(base_url() . 'admin/theme_options/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
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
            <label class="col-sm-3 control-label"><?php echo tr_wd('google_map_api'); ?></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'map_api'))->row()->value;?>" name="map_api" class="form-control"   />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('google_map_lat'); ?></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'map_lat'))->row()->value;?>" name="map_lat" class="form-control"   />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('google_map_lng'); ?></label>
            <div class="col-sm-9">
              <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'map_lng'))->row()->value;?>" name="map_lng" class="form-control"   />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('dark_theme_enable'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="dark_theme" required>
                <option value="1" <?php if($dark_theme_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($dark_theme_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Landing Page with Search</label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="landing_page_enable" required>
                <option value="1" <?php if($landing_page_enable =="1"){ echo "selected"; }?>>Enable</option>
                <option value="0"  <?php if($landing_page_enable =="0"){ echo "selected"; }?>>Disable</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Landing Page Image</label>
            <div class="col-sm-3">
               <img  class="img-fluid" id="landing_page_image" src="<?php echo ($landing_page_image_url !='') ? $landing_page_image_url : base_url('uploads/landing_page/bg.jpg'); ?>"  alt="Landing Page BG" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-3">
              <input type="file" onchange="showImg(this);" name="landing_page_image" class="filestyle" accept="image/*">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('front_end_theme_color'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="front_end_theme" required>
                <option value="blue" <?php if($front_end_theme =="default"){ echo "selected"; }?>>Default</option>
                <option value="green"  <?php if($front_end_theme =="green"){ echo "selected"; }?>>Green</option>
                <option value="blue"  <?php if($front_end_theme =="blue"){ echo "selected"; }?>>Blue</option>
                <option value="red" <?php if($front_end_theme =="red"){ echo "selected"; }?>>Red</option>
                <option value="yellow" <?php if($front_end_theme =="yellow"){ echo "selected"; }?>>Yellow</option>
                <option value="purple" <?php if($front_end_theme =="purple"){ echo "selected"; }?>>Purple</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('header_templete'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="header_templete" required>
                <option value="header1" <?php if($header_templete =="header1"){ echo "selected"; }?>>Header Default</option>
                <option value="header2"  <?php if($header_templete =="header2"){ echo "selected"; }?>>Header2</option>
                <option value="header3"  <?php if($header_templete =="header3"){ echo "selected"; }?>>Header3</option>
                <option value="header4" <?php if($header_templete =="header4"){ echo "selected"; }?>>Header4</option>
                <option value="header5" <?php if($header_templete =="header5"){ echo "selected"; }?>>Header5</option>
              </select>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo tr_wd('footer_templete'); ?></label>
            <div class="col-sm-3 ">
              <select  class="form-control"  name="footer_templete" required>
                <option value="footer1" <?php if($footer_templete =="footer1"){ echo "selected"; }?>>Footer Default</option>
                <option value="footer2"  <?php if($footer_templete =="footer2"){ echo "selected"; }?>>Footer2</option>
                <option value="footer3"  <?php if($footer_templete =="footer3"){ echo "selected"; }?>>Footer3</option>
                <option value="footer4" <?php if($footer_templete =="footer4"){ echo "selected"; }?>>Footer4</option>
                <option value="footer5" <?php if($footer_templete =="footer5"){ echo "selected"; }?>>Footer5</option>
              </select>
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

