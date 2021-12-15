<?php echo form_open(base_url() . 'admin/fetch_actor_from_tmdb/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<h4 class="text-center">Fetch Actor From TMDB</h4>
<hr>
<div class="form-group">
  <label class="col-sm-3 control-label">From</label>
  <div class="col-sm-6 ">
    <select  class="form-control"  name="from" required>
      <option value="movie">TMDB MOVIE</option>
      <option value="tv">TMDB TV-Series</option>
    </select>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo tr_wd('TMDB_ID'); ?></label>
  <div class="col-sm-6">
    <input type="text"  name="id" class="form-control" placeholder="Enter TMDB Movie/Tv-Series ID" />
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->


<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-exchange"></i></span>FETCH &amp; IMPORT </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal">CLOSE </button>
  </div>
  <!-- End col-6 --> 
</div>
<!-- end form -group -->
</form>
<script>
        jQuery(document).ready(function() {
          $('form').parsley();                            

          });
</script>


