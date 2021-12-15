<?php 
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
echo form_open(base_url() . 'admin/theme_options/update/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); 
?>
<div class="card">
  <div class="row">
    <!-- panel  -->
    <div class="col-md-6">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo trans('theme_option'); ?></h3>
        </div>
        <div class="panel-body">
          <!-- panel  -->

          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo trans('movie_page_slider'); ?></label>
            <div class="col-sm-9 ">
              <select class="form-control" name="movie_page_slider" required>
                <option value="1" <?php if (ovoo_config("movie_page_slider") == "1") {
                                    echo "selected";
                                  } ?>><?php echo trans('enable'); ?></option>
                <option value="0" <?php if (ovoo_config("movie_page_slider") == "0") {
                                    echo "selected";
                                  } ?>><?php echo trans('disable'); ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo trans('tv_series_page_slider'); ?></label>
            <div class="col-sm-9 ">
              <select class="form-control" name="tv_series_page_slider" required>
                <option value="1" <?php if (ovoo_config("tv_series_page_slider") == "1") {
                                    echo "selected";
                                  } ?>><?php echo trans('enable'); ?></option>
                <option value="0" <?php if (ovoo_config("tv_series_page_slider") == "0") {
                                    echo "selected";
                                  } ?>><?php echo trans('disable'); ?></option>
              </select>
            </div>
          </div>


          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes'); ?> </button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
      <div class="col-md-6">
        <div class="panel panel-border panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo trans('homepage_section'); ?></h3>
          </div>
          <div class="panel-body">
            <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/section_add';?>" id="menu" class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo trans('add_section'); ?></button>
            <br>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('title'); ?></th>
                        <th><?php echo trans('content_type'); ?></th>
                        <th><?php echo trans('order'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                        foreach ($homepage_sections as $homepage_section): 

                          if($homepage_section['content_type'] == 'genre'):
                            $genre_detail = $this->genre_model->get_genre_name_by_id($homepage_section['genre_id']);
                            
                          endif;
                    ?>
                    <tr  id='row_<?php echo $homepage_section['id'];?>'>
                        <td><?php echo $sl++;?></td>
                        <td><?php echo $homepage_section['title'];?></td>
                        <td><?php echo trans($homepage_section['content_type']); ?> 

                        <?php

                        if($homepage_section['content_type'] == 'genre'):
                            echo '('.$genre_detail.')';
                        endif;

                        ?>


                      </td>
                        <td><?php echo $homepage_section['order'];?></td>
                        <td>
                            <div class="btn-group m-b-20"> <a data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/section_edit/'. $homepage_section['id'];?>" id="menu" title="<?php echo trans('edit'); ?>" class="btn btn-icon"><i class="fa fa-pencil"></i></a> <a title="<?php echo trans('delete'); ?>" class="btn btn-icon" onclick="delete_row(<?php echo " 'homepage_sections' ".','.$homepage_section['id'];?>)" class="delete"><i class="fa fa-remove"></i></a> </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
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