  <div class="card">
    <div class="row">
      <div class="col-sm-12">
        <?php 
          $posts   = $this->db->get_where('posts' , array('posts_id' => $param1) )->result_array();
            foreach ( $posts as $post):
        ?>
        <?php echo form_open(base_url() . 'admin/posts/update/'.$param1 , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
          <h4 class="text-center"><?php echo tr_wd('add_new_post') ?></h4>
          <hr>
          <div class="form-group">
            <label class=" col-sm-3 control-label"><?php echo tr_wd('post_title'); ?></label>
            <div class="col-sm-8">
              <input type="text" name="post_title" id="title" value="<?php echo $post['post_title'] ?>" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label class=" col-sm-3 control-label"><?php echo tr_wd('slug'); ?> (<?php echo base_url(); ?>)</label>            
            <div class="col-sm-8">
              <input type="text" id="slug" name="slug" class="form-control input-sm" value="<?php echo $post['slug'] ?>" required>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3"><?php echo tr_wd('content'); ?></label>
            <div class="col-md-8">
              <textarea class="wysihtml5 form-control" name="content" id="content" rows="10"><?php echo $post['content'] ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3"><?php echo tr_wd('thumbnail'); ?></label>
            <div class="col-sm-6" >
              <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo $post['image_link']; ?>" class="img-thumbnail" alt="" > </div>
              <br>
              <div id="thumbnail_content">
              <input type="text" name="thumb_link" value="<?php echo $post['image_link']; ?>" class="form-control">
              </div><br>
              <p class="btn btn-white" id="thumb_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span><?php echo tr_wd('link') ?></p>
              <p class="btn btn-white" id="thumb_file" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span><?php echo tr_wd('file') ?></p>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3"><?php echo tr_wd('category'); ?></label>
            <div class="col-sm-8">
              <?php $categories = $this->db->get('post_category')->result_array();
                  $category_ids =explode(',', $post['category_id']);
                  foreach ($categories as $category):?>
              <div class="checkbox checkbox-inline">
                <input type="checkbox" name='category_id[]' id="<?php echo $category['post_category_id']; ?>" value="<?php echo $category['post_category_id']; ?>" required <?php if(in_array($category['post_category_id'], $category_ids)){ echo 'checked';} ?>>
                <label for="inlineCheckbox1"> <?php echo $category['category']; ?> </label>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"><?php echo tr_wd('publication'); ?></label>
            <div class="col-sm-8">
              <select class="form-control m-bot15" name="publication">
                <option value="1" <?php if($post['publication']=='1'){ echo 'selected';} ?>><?php echo tr_wd('published'); ?></option>
                <option value="0" <?php if($post['publication']=='0'){ echo 'selected';} ?>><?php echo tr_wd('unpublished'); ?></option>
              </select>
            </div>
          </div>
          <h4 class="text-center"><?php echo tr_wd('seo_setting') ?></h4>
          <hr>
          <div class="form-group">
            <label class=" col-sm-3 control-label"><?php echo tr_wd('focus_keyword'); ?></label>
            <div class="col-sm-8">
              <input type="text" name="focus_keyword" value="<?php echo $post['focus_keyword'] ?>" id="focus_keyword" class="form-control" required>
              <br>
              <p>use comma(,) to separate keyword.</p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"><?php echo tr_wd('meta_description'); ?></label>
            <div class="col-md-8">
              <textarea class="wysihtml5 form-control" name="meta_description"  id="meta_description" rows="5"><?php echo $post['meta_description'] ?></textarea>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 m-t-15">
              <button type="submit" class="btn btn-sm btn-success waves-effect"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo tr_wd('save'); ?> </button>
            </div>
          </div>
        <?php echo form_close(); ?>



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


<!--form validation init-->
<script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script>
    jQuery(document).ready(function() {


        $('#content').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });


        $('#focus_keyword').tagsinput();

    });

</script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- file select-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
<!-- file select-->
<script>
    jQuery(document).ready(function() {
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="thumb_link" class="form-control">');
        });

        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div>');
        });

        $('#description').summernote({
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
<!--end instant image dispaly-->
