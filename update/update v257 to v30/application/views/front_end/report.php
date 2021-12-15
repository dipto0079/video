<?php 
  $movie_report_enable                  =   $this->db->get_where('config' , array('title' =>'movie_report_enable'))->row()->value;
  if($movie_report_enable == '1'):
    $movie_report_note                  =   $this->db->get_where('config' , array('title' =>'movie_report_note'))->row()->value;
 ?>

<div class="pull-right">
    <a data-toggle="modal" id="menu" class="btn" data-target="#report-modal" data-id="<?php echo base_url('home/view_modal/report/'.$watch_videos->videos_id) ?>" style="text-transform: lowercase;font-size: 13px;color: yellow;" href="#"><i class="fa fa-warning"></i>&nbsp;report</a>
</div>

<!-- report modal  -->
  <div id="report-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content p-0 b-0">
        <div class="panel report-panel panel-color panel-primary">
          <div class="panel-heading">
            <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="panel-title text-light">Report Movie</h3>
          </div>
          <div class="modal-body">
            <div id="modal-loader" style="display: none; text-align: center;"> <img src="<?php echo base_url(); ?>assets/images/preloader.gif" /> </div>
            
            <?php echo form_open(base_url() . 'user/report_movie/'.$watch_videos->videos_id , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data', 'id' =>'report_form'));?>
              <?php echo $movie_report_note; ?>
              <div class="form-group">
                <label class="col-sm-3 control-label">To</label>
                <div class="col-sm-9">
                  <p class="m-t-10"><strong><?php echo $watch_videos->title;?></strong></p>
                </div>
                <!-- End col-6 -->
              </div>
              <!-- end form -group -->
              <input type="hidden" name="videos_id" value="<?php echo $watch_videos->videos_id;?>">
              <fieldset class="form-group">
                <legend class="col-sm-3 control-label">Video</legend>
                <div class="col-sm-9">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="video" type="radio" name="video" value="Broken" >Broken
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="video" type="radio" name="video" value="Wrong Movie" >Wrong Movie
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="video" type="radio" name="video" value="Others" >Others
                    </label>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <legend class="col-sm-3 control-label">Audio</legend>
                <div class="col-sm-9">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="audio" type="radio" name="audio" value="Not Synced" >Not Synced
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="audio" type="radio" name="audio" value="Wrong Audio" >Wrong Audio
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="audio" type="radio" name="audio" value="Others" >Others
                    </label>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <legend class="col-sm-3 control-label">Subtitle</legend>
                <div class="col-sm-9">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="subtitle" type="radio" name="subtitle" value="Not Synced" >Not Synced
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="subtitle" type="radio" name="subtitle" value="Wrong Subtitle" >Wrong Subtitle
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="subtitle" type="radio" name="subtitle" value="Missing Subtitle" >Missing Subtitle
                    </label>
                  </div>
                </div>
              </fieldset>
              <input type="hidden" name="url" value="" id="current_url">
              <div class="form-group">
                <label class="col-sm-3 control-label">Others/Message</label>
                <div class="col-sm-9">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Describe the issue here(optional)" style="background-color: #fff;border-color: #dadee1;"></textarea>
                </div>
                <!-- End col-6 -->
              </div>
              <!-- end form -group -->
              <div id="response"></div>
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <button type="submit" id="submit_btn" class="btn btn-sm btn-success waves-effect"><span class="btn-label"><i class="fa fa-paper-plane"></i></span>SEND </button>
                <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END report modal -->
</form>

<!-- basic modal -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Basic Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Modal Body</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function() {
  var current_url = window.location.href;
  $("#current_url").val(current_url);
$('form').parsley();
});
</script>
<script>
  $(document).on('click', '#submit_btn', function(e) {
    $('#submit_btn').html('<span class="btn-label"><i class="fa fa-spinner"></i></span>SENDING..');
  });
</script>
<?php endif; ?>