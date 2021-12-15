<div class="card">
  <div class="row">
    <div class="col-sm-6">
      <?php echo form_open(base_url() . 'admin/video_quality/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
        <h4 class="text-center"><?php echo tr_wd('add_new_video_description'); ?></h4>
        <hr>
        <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo tr_wd('video_quality'); ?></label>
          <div class="col-sm-6">
            <input type="text"  name="quality" class="form-control" required />
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo tr_wd('description'); ?></label>
          <div class="col-sm-6">
            <input type="text"  name="description"  class="form-control"  />
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span><?php echo tr_wd('add') ?> </button>
          </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col-sm-6">
        <table id="datatable-buttons" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo tr_wd('video_quality'); ?></th>
              <th><?php echo tr_wd('description'); ?></th>
              <th><?php echo tr_wd('option'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $sl = 1;
                  foreach ($quality as $quality):                     

            ?>
            <tr id='row_<?php echo $quality['quality_id'];?>'>
              <td><?php echo $sl++;?></td>
              <td><strong><?php echo $quality['quality'];?></strong></td>
              <td><?php echo $quality['description'];?></td>
              <td>
                        <div class="btn-group m-b-20"> <a data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/video_quality_edit/'. $quality['quality_id'];?>" id="menu" title="<?php echo tr_wd('edit'); ?>" class="btn btn-icon"><i class="fa fa-pencil"></i></a> <a title="<?php echo tr_wd('delete'); ?>" class="btn btn-icon" onclick="delete_row(<?php echo " 'quality' ".','.$quality['quality_id'];?>)" class="delete"><i class="fa fa-remove"></i></a> </div>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
      $('form').parsley();
  });
</script> 
