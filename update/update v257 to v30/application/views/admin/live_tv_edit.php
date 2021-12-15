<style type="text/css">
    .p-a{
        padding: 10px;
    }
    .bootstrap-tagsinput .badge {;
        background-color: #009688;
        border: 1px solid #035d54;
    }
    button.close {
        padding: 0px;
    }
</style>

<?php
    foreach ( $live_tvs as $live_tv):
?>
<?php echo form_open(base_url() . 'admin/manage_live_tv/update/'.$param2 , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
<div class="card">
    <div class="row">
        <div class="col-sm-6">
        <h4 class="text-center">TV Channel Info</h4>
        <hr>

        <div class="form-group">
          <label class=" control-label"><?php echo tr_wd('tv_name'); ?></label>
            <input type="text"  name="tv_name" id="title" value="<?php echo $live_tv['tv_name'] ?>" class="form-control" placeholder="Enter TV channel name" required />
        </div>
        <!-- end form -group --> 

        <div class="form-group">
          <label class="control-label "><?php echo tr_wd('description'); ?></label>
            <textarea class="wysihtml5 form-control" name="description" id="about_text" rows="10"><?php echo $live_tv['description'] ?></textarea>
        </div>
        <div class="form-group">
          <label class=" control-label">Category</label>
            <select  class="form-control"  name="live_tv_category_id" required>
              <option value="">Select</option>
              <?php 
                $live_tv_categories = $this->db->get_where('live_tv_category',array('status'=>'1'))->result_array();
                foreach ($live_tv_categories as $live_tv_category):
              ?>

              <option value="<?php echo $live_tv_category['live_tv_category_id']; ?>" <?php if($live_tv_category['live_tv_category_id'] == $live_tv['live_tv_category_id']){ echo "selected";} ?>><?php echo $live_tv_category['live_tv_category']; ?></option>
              <?php endforeach; ?>
            </select>
        </div>     

      <div class="form-group">
        <label class="control-label "><?php echo tr_wd('thumbnail'); ?></label>
          <p>
          <img id="thumb_image" src="<?php echo $this->live_tv_model->get_tv_thumbnail($live_tv['thumbnail']); ?>" width="110" class="img-thumbnail" alt=""><br>          
      </div>

      <div class="form-group">
        <label class="control-label "></label>
          <input type="file"  name="thumbnail" onchange="showImg(this);" class="filestyle" data-input="false" accept="image/*">
      </div>

      <div class="form-group">
        <label class="control-label "><?php echo tr_wd('poster'); ?></label><br>
          <img id="poster_image" src="<?php echo $this->live_tv_model->get_tv_poster($live_tv['poster']); ?>" width="400" class="img-thumbnail" alt="">          
      </div>

      <div class="form-group">
        <label class="control-label "></label>
          <input type="file" name="poster" onchange="showImg2(this);" class="filestyle" data-input="false" accept="image/*">
      </div> 
      </div>
      <div class="col-sm-6">
        <h4 class="text-center">SEO & Stream URLs</h4>
        <hr>
         <div class="row">
        <div class="form-group col-md-3">
          <label class=" control-label">Stream From</label>
          <select  class="form-control"  name="stream_from" required>
            <option value="hls" <?php if($live_tv['stream_from'] =='hls'){ echo 'selected';} ?>>HLS/M3U8/HTTP</option>            
            <option value="youtube" <?php if($live_tv['stream_from'] =='youtube'){ echo 'selected';} ?>>Youtube Live</option>
            <option value="rtmp" <?php if($live_tv['stream_from'] =='rtmp'){ echo 'selected';} ?>>RTMP</option>
            <option value="embed" <?php if($live_tv['stream_from'] =='embed'){ echo 'selected';} ?>>Embed</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">Label</label>
          <input type="text"  name="stream_label" value="<?php echo $live_tv['stream_label'] ?>"  class="form-control"  placeholder="Enter label" required />
        </div>
        <div class="form-group col-md-6 align-self-end">
          <label class="control-label">Stream URL</label>
          <input type="text"  name="stream_url"  value="<?php echo $live_tv['stream_url'] ?>" class="form-control"  placeholder="Primary/high quality stream URL" required />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
          <label class=" control-label">Stream From(optional)</label>
          <select  class="form-control"  name="stream_from1">
            <option value="">From</option>
            <option value="hls" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='hls'){ echo 'selected';} ?>>HLS/M3U8/HTTP</option>
            <option value="youtube" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='youtube'){ echo 'selected';} ?>>Youtube Live</option>
            <option value="rtmp" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='rtmp'){ echo 'selected';} ?>>RTMP</option>
            <option value="embed" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='embed'){ echo 'selected';} ?>>Embed</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">Label(optional)</label>
          <input type="text"  name="stream_label1" value="<?php echo $this->live_tv_model->get_stream_label($live_tv['live_tv_id'],'opt1');?>"  class="form-control"  placeholder="Enter label" />
        </div>
        <div class="form-group col-md-6 align-self-end">
          <label class="control-label">Stream URL(optional)</label>
          <input type="text"  name="stream_url1"  value="<?php echo $this->live_tv_model->get_stream_url($live_tv['live_tv_id'],'opt1');?>" class="form-control"  placeholder="Standard quality stream URL" />
        </div>
      </div> 

      <div class="row">
        <div class="form-group col-md-3">
          <label class=" control-label">Stream From(optional)</label>
          <select  class="form-control"  name="stream_from2">
            <option value="">From</option>
            <option value="hls" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='hls'){ echo 'selected';} ?>>HLS/M3U8/HTTP</option>
            <option value="youtube" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='youtube'){ echo 'selected';} ?>>Youtube Live</option>
            <option value="rtmp" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='rtmp'){ echo 'selected';} ?>>RTMP</option>
            <option value="embed" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='embed'){ echo 'selected';} ?>>Embed</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">Label(optional)</label>
          <input type="text"  name="stream_label2" value="<?php echo $this->live_tv_model->get_stream_label($live_tv['live_tv_id'],'opt2');?>"  class="form-control"  placeholder="Enter label" />
        </div>
        <div class="form-group col-md-6 align-self-end">
          <label class="control-label">Stream URL(optional)</label>
          <input type="text"  name="stream_url2"  value="<?php echo $this->live_tv_model->get_stream_url($live_tv['live_tv_id'],'opt2');?>" class="form-control"  placeholder="Low quality stream URL" />
        </div>
      </div>
      <h4>SEO & Merketting</h4>
      <div class="form-group">
        <label class=" control-label">SEO Title</label>
          <input type="text"  name="seo_title" value="<?php echo $live_tv['seo_title'] ?>" id="seo_title" class="form-control" placeholder="SEO Title" />
      </div> 

        <div class="form-group">
          <label class="control-label"><?php echo tr_wd('meta_description'); ?></label>
            <textarea class="wysihtml5 form-control" name="meta_description" value='<?php echo $live_tv['tv_name'] ?>' id="meta_description" rows="5"><?php echo $live_tv['meta_description'] ?></textarea>
        </div>

        <div class="form-group">
          <label class="control-label "><?php echo tr_wd('focus_keyword'); ?></label>
            <input type="text" name="focus_keyword" value="<?php echo $live_tv['focus_keyword'] ?>" id="focus_keyword" class="form-control"><br>
            <p>use comma(,) to separate keyword.</p>
        </div>

        <div class="form-group">
          <label class="control-label"><?php echo tr_wd('tags'); ?></label>
            <input type="text" name="tags" value='<?php echo $live_tv['tags'] ?>' id="tags" class="form-control"><br>
            <p>use comma(,) to separate tags.</p>
        </div>

        <div class="form-group">
          <label class="control-label"><?php echo tr_wd('publish'); ?></label>
            <div class="toggle">
              <label>
                <input type="checkbox" name="publish" <?php if($live_tv['publish']=='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
              </label>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3 "><?php echo tr_wd('featured'); ?></label>
            <div class="toggle">
              <label>
                <input type="checkbox" name="featured" <?php if($live_tv['featured']=='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
              </label>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span>Save </button>
          </div>
        </div>
      </div> 
    </div>
  </div>
<?php endforeach; ?>
  <?php echo form_close() ?>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script>
  jQuery(document).ready(function() {
    $('form').parsley();                            

    });
</script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>

<script>
  jQuery(document).ready(function() {
      $('#tags').tagsinput();
      $(":file").filestyle({
            input: false
        });
      $('#focus_keyword').tagsinput();
      $('#about_text').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    });
</script>

<script>
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^\w ]+/g, '');
        Text = Text.replace(/ +/g, '-');
        $("#slug").val(Text);
    });

</script>

<!--instant image dispaly-->
<script type="text/javascript">
    function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumb_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function showImg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#poster_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!--end instant image dispaly-->


