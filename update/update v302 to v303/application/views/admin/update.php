<?php echo form_open(base_url() . 'updater/process/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
<div class="card">
  <div class="row"> 
    <!-- panel  -->
    <div class="col-md-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">System Updater</h3>
        </div>
        <div class="panel-body"> 
          <!-- panel  -->              

          <div class="form-group row">
            <label class="control-label col-sm-3">Current Version</label>
            <div class="col-sm-3">
              <strong><?php echo ovoo_config('version'); ?></strong>
            </div>
          </div>             

          <div class="form-group row">
            <label class="control-label col-sm-3">Update file</label>
            <div class="col-sm-3">
              <input type="file" name="zip_file" class="filestyle">
            </div>
          </div>
          
          <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-upload"></i></span>Process Update </button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- file select--> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script> 
<!-- file select-->