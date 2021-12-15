<?php 
    $movie_report_note                  =   $this->db->get_where('config' , array('title' =>'movie_report_note'))->row()->value;
    $recaptcha_enable                   =   $this->db->get_where('config' , array('title' =>'recaptcha_enable'))->row()->value;
    $report_success_message             =   $this->session->flashdata('report_success');
    $report_error_message               =   $this->session->flashdata('report_error');
 ?>

<!-- Modal -->
<div class="modal fade" id="report-modal" tabindex="-1" role="dialog" aria-labelledby="sg-modallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sg-modallabel"><?php echo trans('report_movie'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($report_success_message !=''): ?>
                  <div class="alert alert-dsuccess"><?php echo $report_success_message; ?></div>
                  <script>
                    $(document).ready(function() {
                      $('#report-modal').modal('show');
                    });
                  </script>
                <?php endif; ?>

                <?php if($report_error_message !=''): ?>
                  <div class="alert alert-danger"><?php echo $report_error_message; ?></div>
                  <script>
                    $(document).ready(function() {
                      $('#report-modal').modal('show');
                    });
                  </script>
                <?php endif; ?>
                
                <?php echo form_open(base_url() . 'user/report_movie/' , array('class' => 'sg-form', 'enctype' => 'multipart/form-data', 'id' =>'report_form'));?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-6 control-label">To</label>
                            <div class="col-sm-6">
                              <p class="m-t-10"><strong><?php echo $watch_videos->title;?></strong></p>
                            </div>
                            <!-- End col-6 -->
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $movie_report_note; ?>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $watch_videos->videos_id; ?>">
                    <input type="hidden" name="type" value="<?php if($watch_videos->is_tvseries =='1'): echo 'tvseries'; else: echo 'movie'; endif;?>">
                    <input type="hidden" name="videos_id" value="<?php echo $watch_videos->videos_id;?>">
                    
                    <div class="form-group mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo trans('video'); ?></label>   
                            </div>
                            <div class="col-md-6">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" id="video" type="radio" name="video" value="Broken" ><?php echo trans('broken'); ?>
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" id="video" type="radio" name="video" value="Wrong Movie" ><?php echo trans('wrong_movie'); ?>
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" id="video" type="radio" name="video" value="Others" ><?php echo trans('others'); ?>
                                    </label>
                                  </div>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo trans('audio'); ?></label>   
                            </div>
                            <div class="col-md-6">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" id="audio" type="radio" name="audio" value="Not Synced" ><?php echo trans('not_synced'); ?>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" id="audio" type="radio" name="audio" value="Wrong Audio" ><?php echo trans('wrong_audio'); ?>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" id="audio" type="radio" name="audio" value="Others" ><?php echo trans('others'); ?>
                                </label>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo trans('subtitle'); ?></label>   
                            </div>
                            <div class="col-md-6">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" id="subtitle" type="radio" name="subtitle" value="Not Synced" ><?php echo trans('not_synced'); ?>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" id="subtitle" type="radio" name="subtitle" value="Wrong Subtitle" ><?php echo trans('wrong_subtitle'); ?>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" id="subtitle" type="radio" name="subtitle" value="Missing Subtitle" ><?php echo trans('missing_subtitle'); ?>
                                </label>
                              </div>
                            </div>
                        </div>
                    </div> 
                    <div id="response"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                          <?php if($recaptcha_enable == '1'): echo $this->recaptcha->create_box(); endif;?>
                        </div>
                    </div>     
                    <div class="form-group mb-0">
                        <label><?php echo trans('others_message'); ?></label>                               
                        <textarea name="message" id="message" class="form-control" placeholder="Describe the issue here(optional)"></textarea>
                    </div> 
                    <button id="submit_btn" type="submit" class="btn btn-primary"><?php echo trans('send'); ?></button>                                           
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal --> 

<script>
  $(document).on('click', '#submit_btn', function(e) {
    $('#submit_btn').html('<span class="btn-label"><i class="fa fa-spinner"></i></span>SENDING..');
  });
</script>