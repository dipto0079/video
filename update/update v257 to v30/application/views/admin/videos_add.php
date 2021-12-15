<style type="text/css">
    .p-a{
        padding: 10px;
    }
    .bootstrap-tagsinput .badge {;
        background-color: #009688;
        border: 1px solid #035d54;
    }
    button.close {
        padding: 0px;
    }
</style>
<div class="row">
    <div class="col-lg-6 offset-md-3 ">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Import Movies/Videos From TMDb</h3>
            </div>
            <div class="panel-body">
            <input type="hidden" id="from" name="from" value="movie">
                <div class="form-group m-b-0">
                    <div class="input-group">
                      <input type="text" class="form-control" id="imdb_id" placeholder="Enter TMDB ID. Ex: 141052" required="">
                      <span class="input-group-btn">
                        <button type="submit" id="import_btn" class="btn btn-primary w-sm waves-effect waves-light"> Fetch </button>
                      </span>
                    </div>
                    <small class="form-text text-muted" id=""><a href="https://youtu.be/DZrv95huYUk" target="_blank">Tutorial | </a> Get TMDb ID from here: <a href="https://www.themoviedb.org/movie/" target="_blank">TheMovieDB.org.</a> </small>
                    <div id="result" class="m-t-15"><div class="alert alert-info"><strong>Note:</strong> Actors, directors &amp; writers photo will import by cron.</div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_open(base_url() . 'admin/videos/add/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
<div class="row">
    <div class="col-md-6">
        <div class="card cta cta--featured p-a">
          <div class="card-block">
            <h3 class="card-title no-margin-top">Movie Info</h3>
          </div>
          <span class="header-line"></span>
          <div class="card-block">
            <input type="hidden" name="imdbid" id="imdbid">
            <div class="form-group">
                <label class=" control-label"><?php echo tr_wd('title'); ?></label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('slug'); ?> (<?php echo base_url('watch/slug'); ?>)</label>
                <input type="text" id="slug" name="slug" class="form-control input-sm" required>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('description'); ?></label>
                <textarea class="wysihtml5 form-control" name="description" id="description" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label"><?php echo tr_wd('actor'); ?></label>
              <select class="form-control" name="actor[]"  id="actor" multiple>
                
              </select>
            </div>
            <div class="form-group">
              <label class="control-label"><?php echo tr_wd('director'); ?></label>
              <select class="form-control" name="director[]" multiple="multiple" id="director">
              </select>
            </div>
            <div class="form-group">
              <label class="control-label"><?php echo tr_wd('writer'); ?></label>
              <select class="form-control" name="writer[]" multiple="multiple" id="writer">              
              </select>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('IMDb_rating'); ?></label>
                <input type="text" name="rating" id="rating" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('release_date'); ?></label>
                <div class="input-group">
                    <input type="text" name="release" id="release_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    <span class="input-group-addon bg-custom b-0 text-white"><i class="fa fa-calendar" aria-hidden="true"></i></span> </div>
                <!-- input-group -->
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('country'); ?></label>
                <select class="form-control select2" name="country[]" multiple="multiple" id="country">
              <optgroup label="Select Country">
              <?php $country = $this->db->get('country')->result_array();
                    foreach ($country as $v_country):?>
                <option value="<?php echo $v_country['country_id']; ?>" ><?php echo $v_country['name']; ?></option>
              <?php endforeach; ?>
            </select>
            </div>
            <div class="form-group">
              <label class="control-label"><?php echo tr_wd('genre'); ?></label>
              <select class="form-control select2" name="genre[]" multiple="multiple" id="genre">
                <?php $genre = $this->db->get('genre')->result_array();
                      foreach ($genre as $v_genre):?>
                      <option value="<?php echo $v_genre['genre_id']; ?>"><?php echo $v_genre['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label"><?php echo tr_wd('video_type'); ?></label>
              <select class="form-control select2" name="video_type[]" multiple="multiple" id="video_type" >
                <?php $video_types = $this->db->get('video_type')->result_array();
                      foreach ($video_types as $video_type):?>
                      <option value="<?php echo $video_type['video_type_id']; ?>" <?php if($video_type['video_type'] =="Movie"){ echo "readonly selected";} ?>><?php echo $video_type['video_type']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('runtime'); ?></label>
                <input type="text" name="runtime" id="runtime" class="form-control">
            </div>                    
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('video_quality'); ?></label>
                <select class="form-control m-bot15" name="video_quality">
                  <?php $quality = $this->db->get_where('quality', array('status'=>'1'))->result_array();
                        foreach ($quality as $quality):?>
                  <option value="<?php echo $quality['quality'] ?>"><?php echo $quality['quality'] ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('publication'); ?></label>
                <div class="toggle">
                    <label>
                        <input type="checkbox" name="publication" checked><span class="button-indecator"></span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo tr_wd('enable_download'); ?></label><br>
                <div class="toggle">
                    <label>
                        <input type="checkbox" name="enable_download"><span class="button-indecator"></span>
                    </label>
                </div>
            </div><br><br>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card cta cta--featured p-a">
      <div class="card-block">
        <h3 class="card-title no-margin-top">Poster, Thumbnail & SEO</h3>
      </div>
      <span class="header-line"></span>
      <div class="card-block">
        <div class="form-group">
            <label class="control-label"><?php echo tr_wd('thumbnail'); ?></label>
            <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo base_url().'uploads/default_image/thumbnail.jpg'; ?>" width="150" class="img-thumbnail" alt=""> </div>
            <br>
            <div id="thumbnail_content">
                <input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div><br>
            <p class="btn btn-white" id="thumb_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>
                <?php echo tr_wd('link') ?>
            </p>
            <p class="btn btn-white" id="thumb_file" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>
                <?php echo tr_wd('file') ?>
            </p>

        </div>

        <div class="form-group">
            <label class="control-label"><?php echo tr_wd('poster'); ?></label>
            <div class="profile-info-name text-center"> <img id="poster_image" src="<?php echo base_url().'uploads/default_image/poster.jpg'; ?>" width="350" class="img-thumbnail" alt=""> </div>
            <br>
            <div id="poster_content">
                <input type="file" id="poster_file" onchange="showImg2(this);" name="poster_file" class="filestyle" data-input="false" accept="image/*"></div><br>
            <p class="btn btn-white" id="poster_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>
                <?php echo tr_wd('link') ?>
            </p>
            <p class="btn btn-white" id="poster_file_btn" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>
                <?php echo tr_wd('file') ?>
            </p>

        </div>        
        <h3 class="card-title">SEO & Merketting</h3>
        <div class="form-group">
            <label class=" control-label">SEO Title</label>
            <input type="text" name="seo_title" id="seo_title" class="form-control">
        </div>        
        <div class="form-group">
            <label class="control-label"><?php echo tr_wd('meta_description'); ?></label>
            <textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo tr_wd('focus_keyword'); ?></label><br>
            <input type="text" name="focus_keyword" id="focus_keyword" class="form-control"><br>
            <p>use comma(,) to separate keyword.</p>
        </div>

        <div class="form-group">
            <label class="control-label"><?php echo tr_wd('tags'); ?></label><br>
            <input type="text" name="tags" id="tags" class="form-control"><br>
            <p>use comma(,) to separate tags.</p>
        </div>

        <div class="form-group">
            <label class="control-label">Send Email Newslatter to Subscriber</label>
            <div class="toggle">
                <label>
                    <input type="checkbox" name="email_notify"><span class="button-indecator"></span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Send Push Notification to Subscriber</label>
            <div class="toggle">
                <label>
                    <input type="checkbox" name="push_notify"><span class="button-indecator"></span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="offset-md-9 col-sm-3 m-t-15 pull-right">
                <button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span>CREATE </button>
            </div>
        </div>       
      </div>
    </div>
</div>

</div>
<?php echo form_close(); ?>


<!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>
<script>
    jQuery(document).ready(function() {
        //$(".select2").select2();
        $('form').parsley();
        $('#release_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
        $(":file").filestyle({
            input: false
        });
    });
</script>
<!--instant image dispaly-->
<script type="text/javascript">
    function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumb_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function showImg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#poster_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!--end instant image dispaly-->



<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>


<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date.js"></script>


<script>
    jQuery(document).ready(function() {
        $('#country').select2({
            placeholder: 'Select Country'
        });
        $('#genre').select2({
            placeholder: 'Select Genre'
        });       
        $('#video_type').select2({
            placeholder: 'Select Video Type'
        });       
        $('#focus_keyword').tagsinput();
        $('#tags').tagsinput();
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="thumb_link" class="form-control">');
        });
        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div>');
            $(":file").filestyle({
                input: false
            });
        });

        $('#poster_link').click(function() {
            $('#poster_content').html('<input type="text" name="poster_link" class="form-control">');
        });
        $('#poster_file_btn').click(function() {
            $('#poster_content').html('<input type="file" id="poster_file" onchange="showImg2(this);" name="poster_file" class="filestyle" data-input="false" accept="image/*"></div>');
            $(":file").filestyle({
                input: false
            });
        });

        $('#description').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    });
</script>
<script type="text/javascript">
     jQuery(document).ready(function(){
    $(document).on('click', '#import_btn', function() {
        $('#result').html('');
        var from = $("#from").val();
        var id = $("#imdb_id").val();
        if (from != '' && id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()."admin/import_movie";?>',
                data: "id=" + encodeURIComponent(id) + "&from=" + encodeURIComponent(from),
                dataType: 'json',
                beforeSend: function() {
                    $("#import_btn").html('Fetching...');
                },
                success: function(response) {
                    var imdb_status     = response.imdb_status;
                    var imdbid          = response.imdbid;
                    var title           = response.title;
                    var plot            = response.plot;
                    var runtime         = response.runtime;                    
                    var country         = JSON.parse("["+response.country+"]");
                    var genre           = JSON.parse("["+response.genre+"]");
                    var rating          = response.rating;;
                    var release         = new Date(response.release).toString('yyyy-MM-dd');
                    var thumbnail       = response.thumbnail;
                    var poster          = response.poster;
                    if (imdb_status == 'success') {
                        // actor
                        $('#actor').select2({
                            data:response.actor
                        })
                        $("#actor > option").prop("selected","selected");
                        $("#actor").trigger("change");
                        // director
                        $('#director').select2({
                            data:response.director
                        })
                        $("#director > option").prop("selected","selected");
                        $("#director").trigger("change");
                        // writer
                        $('#writer').select2({
                            data:response.writer
                        })
                        $("#writer > option").prop("selected","selected");
                        $("#writer").trigger("change");

                        $('#result').html('<div class="alert alert-success alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data imported successfully.</div>');
                        $("#title").val(title);
                        //slug
                        title = title.toLowerCase();
                        title = title.replace(/[^\w ]+/g, '');
                        title = title.replace(/ +/g, '-');                        
                        $("#slug").val(title);
                        $("#imdbid").val(imdbid);
                        $("#description").code('<p>' + plot + '</p>');
                        $("#runtime").val(runtime);
                        $("#country").val(country).trigger('change');
                        $("#genre").val(genre).trigger('change');
                        $("#rating").val(rating);
                        $("#release_date").datepicker("setDate", release);
                        $('#thumbnail_content').html('<input type="text" name="thumb_link" value="' + thumbnail + '" class="form-control">');
                        $('#thumb_image').attr('src', thumbnail);
                        $('#poster_content').html('<input type="text" name="poster_link" value="' + poster + '" class="form-control">');
                        $('#poster_image').attr('src', poster);
                        $('#import_btn').html('Fetch');                        
                    } else {
                        $('#result').html('<div class="alert alert-danger alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No data found in database..</div>');
                        $('#import_btn').html('Fetch');
                    }
                }
            });
        } 
        else {
            alert('Please input IMDb/TMDB ID');
        }
    });
});
</script>

<script>
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^\w ]+/g, '');
        Text = Text.replace(/ +/g, '-');
        $("#slug").val(Text);
    });
</script>

<script type="text/javascript">
      $('#actor').select2({
        placeholder: 'Select Actor',
        minimumInputLength: 2,
        ajax: {
          url: '<?=base_url('admin/load_stars')?>',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>

<script type="text/javascript">
      $('#director').select2({
        placeholder: 'Select Director',
        minimumInputLength: 2,
        ajax: {
          url: '<?=base_url('admin/load_stars')?>',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>

<script type="text/javascript">
      $('#writer').select2({
        placeholder: 'Select Writer',
        minimumInputLength: 2,
        ajax: {
          url: '<?=base_url('admin/load_stars')?>',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>






