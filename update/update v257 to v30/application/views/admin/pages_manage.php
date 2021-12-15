<div class="card">
  <div class="row">
    <div class="col-sm-12">
        <div class="btn-group dropdown pull-right">
          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light text-capital">
          <?php
            switch ($type) {
              case 'published':
                echo 'PUBLISHED';
                break;
              case 'unpublished':
                echo 'UNPUBLISHED';
                break;                
              default:
                echo 'FILTER';
                break;
            }
            ?>
          </button>
          <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="dropdown-item" href="<?php echo base_url().'admin/pages/published'?>"><?php echo tr_wd('published'); ?></a></li>
            <li><a class="dropdown-item" href="<?php echo base_url().'admin/pages/unpublished'?>"><?php echo tr_wd('unpublished'); ?></a></li>
            <li><a class="dropdown-item" href="<?php echo base_url().'admin/pages/'?>"><?php echo tr_wd('all_pages'); ?></a></li>
          </ul>
        </div>
        <a href="<?php echo base_url() . 'admin/pages_add';?>" class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo tr_wd('add_page'); ?></a> <br>
        <br>
        <table class="table table-striped" id="datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>#</th>
              <th><?php echo tr_wd('Title'); ?></th>
              <th><?php echo tr_wd('slug'); ?></th>
              <th><?php echo tr_wd('publish_at');?></th>
              <th><?php echo tr_wd('status'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $sl = 1;
                              
            switch ($type) {
              case 'published':
                $this->db->order_by('page_id','DESC');
                $pages=$this->db->get_where('page', array('publication' => '1'))->result_array();
                break;
              case 'unpublished':
                $this->db->order_by('page_id','DESC');
                $pages=$this->db->get_where('page', array('publication' => '0'))->result_array();
                break;
              default:
                  $this->db->order_by('page_id','DESC');
                  $pages=$this->db->get('page')->result_array();                  
                  break;
            }                              
            foreach ($pages as $page):
            ?>
            <tr id='row_<?php echo $page['page_id'];?>'>              
              <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a class="dropdown-item" target="_blank" href="<?php echo base_url() . 'page/'. $page['slug'];?>"><?php echo tr_wd('preview'); ?></a></li>
                      <li><a class="dropdown-item" href="<?php echo base_url() . 'admin/pages_edit/'. $page['page_id'];?>"><?php echo tr_wd('edit_page'); ?></a></li>
                      <?php if($page['deletable']!=0): ?>
                      <li><a class="dropdown-item" title="<?php echo tr_wd('delete'); ?>" href="#" onclick="delete_row(<?php echo " 'page' ".','.$page['page_id'];?>)" class="delete"><?php echo tr_wd('delete'); ?></a> </li>
                      <?php endif; ?>     
                    </ul>
                  </div>
              </td>
              <td><?php echo $sl++;?></td>
              <td><?php echo $page['page_title'];?></td>  
              <td><?php echo $page['slug'];?></td>
              <td><?php echo date('d M Y H:i:s',strtotime($page['publish_at']));?></td>
              <td>
                <?php
                  if($page['publication']=='1'){
                      echo '<span class="label label-primary label-xs">Published</span>';
                  }
                  else{
                      echo '<span class="label label-warning label-mini">Unublished</span>';
                  }
                ?>                    
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<!-- Date picker auto-close --> 
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.js"></script> 
<!-- date picker--> 
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- date picker--> 
<!-- file select--> 
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script> 
<!-- file select--> 