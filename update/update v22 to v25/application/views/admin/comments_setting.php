        <div class="card">
            <div class="row">
                <?php echo form_open(base_url() . 'admin/comments_setting/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
                <!-- panel  -->
                <div class="col-md-12">
                    <div class="panel panel-border panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <?php echo tr_wd('comments_setting'); ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <!-- panel  -->
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo tr_wd('comments_method'); ?></label>
                                <div class="col-sm-3">
                                    <select class="form-control m-bot15" id="comments_method" name="comments_method">
                                        <option value="0" <?php if($this->db->get_where('config' , array('title' =>'comments_method'))->row()->value=='0'){echo 'selected';}?>><?php echo tr_wd('disable'); ?></option>
                                        <option value="both" <?php if($this->db->get_where('config' , array('title' =>'comments_method'))->row()->value=='both'){echo 'selected';}?>><?php echo tr_wd('both'); ?></option>
                                        <option value="ovoo" <?php if($this->db->get_where('config' , array('title' =>'comments_method'))->row()->value=='ovoo'){echo 'selected';}?>><?php echo tr_wd('ovoo'); ?></option>
                                        <option value="facebook" <?php if($this->db->get_where('config' , array('title' =>'comments_method'))->row()->value=='facebook'){echo 'selected';}?>><?php echo tr_wd('facebook'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo tr_wd('comments_approval'); ?></label>
                                <div class="col-sm-3">
                                    <select class="form-control m-bot15" id="comments_approval" name="comments_approval">
                                        <option value="0" <?php if($this->db->get_where('config' , array('title' =>'comments_approval'))->row()->value=='0'){echo 'selected';}?>><?php echo tr_wd('manual'); ?></option>
                                        <option value="1" <?php if($this->db->get_where('config' , array('title' =>'comments_approval'))->row()->value=='1'){echo 'selected';}?>><?php echo tr_wd('auto'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3"><?php echo tr_wd('facebook_appId_(_for_comment)'); ?></label>
                              <div class="col-sm-4">
                                <input type="text" name="facebook_comment_appid" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'facebook_comment_appid'))->row()->value;?>">
                              </div>
                            </div>                            
                            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo tr_wd('save_changes'); ?> </button>
                            </div>
                            </form>
                        </div>
                        <!--end panel body -->
                    </div>
                    <!--end panel -->
                </div>
                <!--end col-6 -->
            </div>
        </div>