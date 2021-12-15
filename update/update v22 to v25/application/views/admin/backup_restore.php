<div class="card">      
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo tr_wd('create_backup') ?></h3>
        </div>
        <div class="panel-body"> 
          <!-- panel  --> 
          <br>
          <br>
          <div class="col-sm-offset-3 col-sm-6 m-t-15"> <a href="<?php echo base_url().'admin/backup_restore/create'?>" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-download"></i></span><?php echo tr_wd('create_backup') ?> </a> <br>
            <br>
          </div>
          <table class="table table-striped" id="servertable">
            <thead>                        
              <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Created</th>
                <th>Download</th>                      
                <th>Delete</th>                      
              </tr>
            </thead>
            <tbody>
            <?php $files = directory_map('./db_backup/');
                  asort($files);
                  $sl=0;
                  foreach($files as $file):
                    $sl++;
                  if(is_string($file)):
            ?>
              <tr>                
                <td><?php echo $sl; ?></td>
                <td><?php echo $file; ?></td>
                <td><?php echo date ("d M Y H:i:s",filemtime('./db_backup/'.$file)); ?></td>
                <td><a href="<?php echo base_url().'admin/backup_restore/download/'.$file?>" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-download"></i></span><?php echo tr_wd('download') ?> </a></td>
                <td><a href="<?php echo base_url().'admin/backup_restore/delete/'.$file?>" class="btn btn-sm btn-danger"><span class="btn-label"><i class="fa fa-close"></i></span><?php echo tr_wd('delete') ?> </a></td>
              </tr>           
            <?php endif; ?>
            <?php endforeach; ?>              
            </tbody>
          </table>
          
          <br>
          <br>
        </div>
      </div>
    </div>        
  </div>
</div>

