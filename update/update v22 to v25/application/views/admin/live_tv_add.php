<?php echo form_open(base_url() . 'admin/manage_live_tv/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
<div class="card">
    <div class="row">
        <div class="col-sm-12">
        <h4 class="text-center">New Live TV Information</h4>
        <hr>

        <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo tr_wd('tv_name'); ?></label>
          <div class="col-sm-8">
            <input type="text"  name="tv_name" id="title" class="form-control" placeholder="Enter TV channel name" required />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->        

      <div class="form-group">
        <label class="control-label col-sm-3"><?php echo tr_wd('thumbnail'); ?></label>
        <div id="col-sm-8">
          <p>
          <img id="thumb_image" src="<?php echo base_url().'uploads/default_image/tv_thumbnail.jpg'; ?>" width="110" class="img-thumbnail" alt=""><br>
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
          <img id="poster_image" src="<?php echo base_url().'uploads/default_image/tv_poster.jpg'; ?>" width="400" class="img-thumbnail" alt="">
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
            <textarea class="wysihtml5 form-control" name="description" id="about_text" rows="10"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Stream URL</label>
          <div class="col-sm-2 ">
            <select  class="form-control"  name="stream_from" required>
              <option value="">From</option>
              <option value="hls" selected>HLS/M3U8/HTTP</option>
              <option value="rtmp">RTMP</option>
              <option value="youtube">Youtube Live</option>
              <option value="mpeg-dash">MPEG-DASH</option>
              <option value="dvr">DVR</option>
              <option value="embed">Embed</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text"  name="stream_label" value="High"  class="form-control"  placeholder="Enter label" required />
          </div>
          <div class="col-sm-4">
            <input type="text"  name="stream_url"  class="form-control"  placeholder="Primary/high quality stream URL" required />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->
        <div class="form-group">
          <label class="col-sm-3 control-label">Stream URL(optional)</label>
          <div class="col-sm-2 ">
            <select  class="form-control"  name="stream_from1">
              <option value="">From</option>
              <option value="hls" selected>HLS/M3U8/HTTP</option>
              <option value="rtmp">RTMP</option>
              <option value="youtube">Youtube Live</option>
              <option value="mpeg-dash">MPEG-DASH</option>
              <option value="dvr">DVR</option>
              <option value="embed">Embed</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text"  name="stream_label1" value="Mid"  class="form-control"  placeholder="Enter label" />
          </div>
          <div class="col-sm-4">
            <input type="text"  name="stream_url1"  class="form-control"  placeholder="Optional/midium quality stream URL" />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->
        <div class="form-group">
          <label class="col-sm-3 control-label">Stream URL(optional)</label>
          <div class="col-sm-2 ">
            <select  class="form-control"  name="stream_from2">
              <option value="">From</option>
              <option value="hls" selected>HLS/M3U8/HTTP</option>
              <option value="rtmp">RTMP</option>
              <option value="youtube">Youtube Live</option>
              <option value="mpeg-dash">MPEG-DASH</option>
              <option value="dvr">DVR</option>
              <option value="embed">Embed</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text"  name="stream_label2" value="Low"  class="form-control"  placeholder="Enter label" />
          </div>
          <div class="col-sm-4">
            <input type="text"  name="stream_url2"  class="form-control"  placeholder="Optional/low quality stream URL" />
          </div>
          <!-- End col-6 --> 
        </div>
        <!-- end form -group -->

        
        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('focus_keyword'); ?></label>
          <div class="col-sm-8">
            <input type="text" name="focus_keyword" id="focus_keyword" class="form-control"><br>
            <p>use comma(,) to separate keyword.</p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('meta_description'); ?></label>
          <div class="col-sm-8">
            <textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3"><?php echo tr_wd('tags'); ?></label>
          <div class="col-sm-8">
            <input type="text" name="tags" id="tags" class="form-control"><br>
            <p>use comma(,) to separate tags.</p>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3 "><?php echo tr_wd('publish'); ?></label>
          <div class="col-sm-6">
            <div class="toggle">
              <label>
                <input type="checkbox" name="publish" checked><span class="button-indecator"></span>
              </label>
            </div>
          </div>
        </div>

          <div class="form-group">
            <label class="control-label col-sm-3 "><?php echo tr_wd('featured'); ?></label>
          <div class="col-sm-6">
            <div class="toggle">
              <label>
                <input type="checkbox" name="featured" checked><span class="button-indecator"></span>
              </label>
            </div>
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
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


