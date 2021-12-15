<?php 
  $movie_request_enable                  =   $this->db->get_where('config' , array('title' =>'movie_request_enable'))->row()->value;
  if($movie_request_enable == '1'):
 ?>
<!-- report modal  -->
  <div id="movieRequest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content p-0 b-0">
        <div class="panel report-panel panel-color panel-primary">
          <div class="panel-heading">
            <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="panel-title text-light">Movie Request</h3>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url('send_movie_requiest') , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data', 'id' =>'report_form'));?>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input name="name" type="text" class="form-control" rows="4" placeholder="Your Name" value="<?php if($this->session->userdata('name')) { echo $this->session->userdata('name');} ?>" style="background-color: #fff;border-color: #dadee1;" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="form-control" rows="4" placeholder="Your Email" value="<?php if($this->session->userdata('email')) { echo $this->session->userdata('email');} ?>" style="background-color: #fff;border-color: #dadee1;" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Movie Name</label>
                <div class="col-sm-9">
                  <input name="movie_name" type="text" class="form-control" rows="4" placeholder="Movie Name" style="background-color: #fff;border-color: #dadee1;" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Message</label>
                <div class="col-sm-9">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write your message here" style="background-color: #fff;border-color: #dadee1;"></textarea>
                </div>
              </div>
              <input type="hidden" name="url" id="current_url" value="<?php echo base_url(uri_string()); ?>">

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script>
  jQuery(document).ready(function() {
    $('form').parsley();
  });
</script>
<?php endif; ?>