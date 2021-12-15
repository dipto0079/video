    <div class="card">
      <div class="row"> <?php echo form_open(base_url() . 'admin/seo_setting/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
        <!-- panel  -->
        <div class="col-md-12">
          <div class="panel panel-border panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo tr_wd('seo_setting'); ?></h3>
            </div>
            <div class="panel-body"> 
              <!-- panel  -->
              <div class="alert alert-info col-md-8 col-md-offset-3"><p><strong>Note: </strong> Leave blank if you not want to use any feature.</p></div>
              
              <div class="form-group">
                <label class=" col-sm-3 control-label">XML Sitemap URL</label>
                <div class="col-sm-8">
                  <a href="<?php echo base_url('sitemap.xml') ?>" target="_blank"><?php echo base_url('sitemap.xml') ?></a>
                </div>
              </div>
              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('author_name'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="author" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'author'))->row()->value;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('home_page_SEO_title'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="home_page_seo_title" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'home_page_seo_title'))->row()->value;?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('seo_keyword'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="focus_keyword" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'focus_keyword'))->row()->value;?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3"><?php echo tr_wd('seo_meta_description'); ?></label>
                <div class="col-md-8">
                  <textarea class="wysihtml5 form-control" name="meta_description" id="footer-1" rows="10"><?php echo $this->db->get_where('config' , array('title' =>'meta_description'))->row()->value;?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('google_analytics_id'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="google_analytics_id" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'google_analytics_id'))->row()->value;?>" required>
                </div>
              </div>
              <h4 class="text-center"><?php echo tr_wd('blog_setting') ?></h4>
              <hr>
          <div class="form-group">
            <label class=" col-sm-3 control-label"><?php echo tr_wd('blog_SEO_title'); ?></label>
            <div class="col-sm-8">
              <input type="text" name="blog_title" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'blog_title'))->row()->value;?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class=" col-sm-3 control-label"><?php echo tr_wd('blog_SEO_meta_description'); ?></label>
            <div class="col-sm-8">
              <input type="text" name="blog_meta_description" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'blog_meta_description'))->row()->value;?>" required>
            </div>
          </div>           
          <div class="form-group">
            <label class=" col-sm-3 control-label"><?php echo tr_wd('blog_SEO_keyword'); ?></label>
            <div class="col-sm-8">
              <input type="text" name="blog_keyword" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'blog_keyword'))->row()->value;?>" required>
            </div>
          </div>

              <h4 class="text-center"><?php echo tr_wd('social_setting') ?></h4>
              <hr>

              <div class="form-group">
                  <label class="control-label col-md-3"><?php echo tr_wd('social_share_(_addThis)'); ?></label>
                  <div class="col-sm-6">
                      <select class="form-control m-bot15" name="social_share_enable">
                      <option value="1" <?php if($this->db->get_where('config' , array('title' =>'social_share_enable'))->row()->value=='1'){echo 'selected';}?>><?php echo tr_wd('enable'); ?></option>
                      <option value="0" <?php if($this->db->get_where('config' , array('title' =>'social_share_enable'))->row()->value=='0'){echo 'selected';}?>><?php echo tr_wd('disable'); ?></option>
                      </select>
                  </div>
              </div>
              

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('facebook_url'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="facebook_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'facebook_url'))->row()->value;?>">
                  
                </div>
              </div>

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('twitter_url'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="twitter_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'twitter_url'))->row()->value;?>">
                  
                </div>
              </div> 

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('linkedin_url'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="linkedin_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'linkedin_url'))->row()->value;?>">
                  
                </div>
              </div>

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('vimeo_url'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="vimeo_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'vimeo_url'))->row()->value;?>">
                  
                </div>
              </div>

              <div class="form-group">
                <label class=" col-sm-3 control-label"><?php echo tr_wd('youtube_url'); ?></label>
                <div class="col-sm-8">
                  <input type="text" name="youtube_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'youtube_url'))->row()->value;?>">
                </div>
              </div>                          


              <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo tr_wd('save_changes'); ?> </button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>




