<div class="card">
    <div class="row">
        <div class="col-sm-12">
                <a href="<?php echo base_url() . 'admin/manage_live_tv/new';?>" class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo tr_wd('add_live_tv'); ?></a>
                <?php if($total_rows >0): ?>
                    <br>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>##</th>
                            <th>Photo</th>
                            <th>TV Name</th>
                            <th>Stream URL</th>
                            <th>Description</th>
                            <th>Featured</th>
                            <th>Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1;
                            foreach ($tvs as $tv):
                        ?>
                        <tr id='row_<?php echo $tv['live_tv_id'];?>'>
                            <td><?php echo $sl++;?></td>
                            <td><div class="btn-group">
                                <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a target="_blank" href="<?php echo base_url() . 'live-tv/'. $tv['slug'].'.html';?>"><?php echo tr_wd('preview'); ?></a></li>
                                  <li><a  href="<?php echo base_url() . 'admin/manage_live_tv/edit/'. $tv['live_tv_id'];?>"><?php echo tr_wd('edit'); ?></a></li>
                                  <li><a title="<?php echo tr_wd('delete'); ?>" href="#" onclick="delete_row(<?php echo " 'live_tv' ".','.$tv['live_tv_id'];?>)" class="delete"><?php echo tr_wd('delete'); ?></a> </li>
                                </ul>
                              </div>
                            </td>
                            <td>
                                <img src="<?php echo $this->live_tv_model->get_tv_thumbnail($tv['thumbnail']); ?>" class="" width="60" alt="<?php echo $tv['tv_name'];?>_photo" >
                            </td>
                            <td><strong><?php echo $tv['tv_name'];?></strong></td>
                            <td>
                                <?php 
                                    echo mb_substr($tv['stream_url'], 0, 35).'..';
                                    echo mb_substr($this->live_tv_model->get_live_tv_url($tv['live_tv_id'],'sd'), 0, 35).'..';
                                    echo mb_substr($this->live_tv_model->get_live_tv_url($tv['live_tv_id'],'lq'), 0, 35).'..';
                                ?>                                    
                            </td>
                            <td><?php echo $tv['description'];?></td>
                            <td>
                                <div class="animated-checkbox checkbox-inline">
                                    <label>
                                        <input type="checkbox" readonly <?php if($tv['featured']=='1'){ echo 'checked';} ?>><span class="label-text"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="animated-checkbox checkbox-inline">
                                    <label>
                                        <input type="checkbox" readonly <?php if($tv['publish']=='1'){ echo 'checked';} ?>><span class="label-text"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php else: echo "No tv found"; endif; ?>
            <?php echo $links; ?>
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