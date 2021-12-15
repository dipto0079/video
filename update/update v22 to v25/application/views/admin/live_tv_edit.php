<?php
    foreach ( $live_tvs as $live_tv):
?>
<?php echo form_open(base_url() . 'admin/manage_live_tv/update/'.$param2 , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
<div class="card">
    <div class="row">
        <div class="col-sm-12">
        <h4 class="text-center">Edit Live TV Information</h4>
        <hr>

        <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo tr_wd('tv_name'); ?></label>
          <div class="col-sm-8">
            <input type="text"  name="tv_name" id="title" value='<?php echo $live_tv['tv_name'] ?>' class="form-control" placeholder="Enter TV channel name" required />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->        

      <div class="form-group">
        <label class="control-label col-sm-3"><?php echo tr_wd('thumbnail'); ?></label>
        <div id="col-sm-8">
          <p>
          <img id="thumb_image" src="<?php echo $this->live_tv_model->get_tv_thumbnail($live_tv['thumbnail']); ?>" width="110" class="img-thumbnail" alt=""><br>
        </div>          
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-8">
          <input type="file"  name="thumbnail" onchange="showImg(this);" class="filestyle" data-input="false" accept="image/*">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3"><?php echo tr_wd('poster'); ?></label>
        <div id="col-sm-6">
          <img id="poster_image" src="<?php echo $this->live_tv_model->get_tv_poster($live_tv['poster']); ?>" width="400" class="img-thumbnail" alt="">
        </div>          
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-8">
          <input type="file" name="poster" onchange="showImg2(this);" class="filestyle" data-input="false" accept="image/*">
        </div>
      </div>

        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('description'); ?></label>
          <div class="col-sm-8">
            <textarea class="wysihtml5 form-control" name="description" id="about_text" rows="10">
              <?php echo $live_tv['description'] ?>
            </textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Stream URL</label>
          <div class="col-sm-2 ">
            <select  class="form-control"  name="stream_from" required>
              <option value="">From</option>
              <option value="hls" <?php if($live_tv['stream_from'] =='hls'){ echo 'selected';} ?>>HLS/M3U8/HTTP</option>
              <option value="rtmp" <?php if($live_tv['stream_from'] =='rtmp'){ echo 'selected';} ?>>RTMP</option>
              <option value="youtube" <?php if($live_tv['stream_from'] =='youtube'){ echo 'selected';} ?>>Youtube Live</option>
              <option value="mpeg-dash" <?php if($live_tv['stream_from'] =='mpeg-dash'){ echo 'selected';} ?>>MPEG-DASH</option>
              <option value="dvr" <?php if($live_tv['stream_from'] =='dvr'){ echo 'selected';} ?>>DVR</option>
              <option value="embed" <?php if($live_tv['stream_from'] =='embed'){ echo 'selected';} ?>>Embed</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text"  name="stream_label" value="<?php echo $live_tv['stream_label'] ?>"  class="form-control"  placeholder="Enter label" required />
          </div>
          <div class="col-sm-4">
            <input type="text"  name="stream_url"  value='<?php echo $live_tv['stream_url'] ?>' class="form-control"  placeholder="Primary/high quality stream URL" required />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->
        <div class="form-group">
          <label class="col-sm-3 control-label">Stream URL(optional)</label>
          <div class="col-sm-2 ">
            <select  class="form-control"  name="stream_from1">
              <option value="">From</option>
              <option value="hls" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='hls'){ echo 'selected';} ?>>HLS/M3U8/HTTP</option>
              <option value="rtmp" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='rtmp'){ echo 'selected';} ?>>RTMP</option>
              <option value="youtube" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='youtube'){ echo 'selected';} ?>>Youtube Live</option>
              <option value="mpeg-dash" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='mpeg-dash'){ echo 'selected';} ?>>MPEG-DASH</option>
              <option value="dvr" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='dvr'){ echo 'selected';} ?>>DVR</option>
              <option value="embed" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt1') =='embed'){ echo 'selected';} ?>>Embed</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text"  name="stream_label1" value="<?php echo $this->live_tv_model->get_stream_label($live_tv['live_tv_id'],'opt1');?>"  class="form-control"  placeholder="Enter label" />
          </div>
          <div class="col-sm-4">
            <input type="text"  name="stream_url1"  value="<?php echo $this->live_tv_model->get_stream_url($live_tv['live_tv_id'],'opt1');?>" class="form-control"  placeholder="Optional/midium quality stream URL" />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->
        <div class="form-group">
          <label class="col-sm-3 control-label">Stream URL(optional)</label>
          <div class="col-sm-2 ">
            <select  class="form-control"  name="stream_from2">
              <option value="">From</option>
              <option value="hls" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='hls'){ echo 'selected';} ?>>HLS/M3U8/HTTP</option>
              <option value="rtmp" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='rtmp'){ echo 'selected';} ?>>RTMP</option>
              <option value="youtube" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='youtube'){ echo 'selected';} ?>>Youtube Live</option>
              <option value="mpeg-dash" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='mpeg-dash'){ echo 'selected';} ?>>MPEG-DASH</option>
              <option value="dvr" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='dvr'){ echo 'selected';} ?>>DVR</option>
              <option value="embed" <?php if($this->live_tv_model->get_stream_from($live_tv['live_tv_id'],'opt2') =='embed'){ echo 'selected';} ?>>Embed</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text"  name="stream_label2" value="<?php echo $this->live_tv_model->get_stream_label($live_tv['live_tv_id'],'opt2');?>"  class="form-control"  placeholder="Enter label" />
          </div>
          <div class="col-sm-4">
            <input type="text"  name="stream_url2"  value="<?php echo $this->live_tv_model->get_stream_url($live_tv['live_tv_id'],'opt2');?>" class="form-control"  placeholder="Optional/low quality stream URL" />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->

        
        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('focus_keyword'); ?></label>
          <div class="col-sm-8">
            <input type="text" name="focus_keyword" value='<?php echo $live_tv['tv_name'] ?>' id="focus_keyword" class="form-control"><br>
            <p>use comma(,) to separate keyword.</p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('meta_description'); ?></label>
          <div class="col-sm-8">
            <textarea class="wysihtml5 form-control" name="meta_description" value='<?php echo $live_tv['tv_name'] ?>' id="meta_description" rows="5"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('tags'); ?></label>
          <div class="col-sm-8">
            <input type="text" name="tags" value='<?php echo $live_tv['tv_name'] ?>' id="tags" class="form-control"><br>
            <p>use comma(,) to separate tags.</p>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3 "><?php echo tr_wd('publish'); ?></label>
          <div class="col-sm-6">
            <div class="toggle">
              <label>
                <input type="checkbox" name="publish" <?php if($live_tv['publish']=='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3 "><?php echo tr_wd('featured'); ?></label>
          <div class="col-sm-6">
            <div class="toggle">
              <label>
                <input type="checkbox" name="featured" <?php if($live_tv['featured']=='1'){ echo 'checked';} ?>><span class="button-indecator"></span>
              </label>
            </div>
          </div>
        </div>
      <?php endforeach; ?>  
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span>Save </button>
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->
        </form>
      </div>
    </div>
  </div>
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