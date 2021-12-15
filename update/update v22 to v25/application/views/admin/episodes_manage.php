<div class="row">         
  <div class="col-md-12">
   <a class="btn btn-sm btn-primary waves-effect mb-20" href="<?php echo base_url('admin/seasons_manage/').$param1; ?>"> <span class="btn-label"><i class="fa fa-arrow-left"></i></span>Back to Seasons</a>
   <a class="btn btn-sm btn-primary waves-effect mb-20" href="<?php echo base_url('tv-series/watch/').$slug; ?>" target="_blank"> <span class="btn-label"><i class="fa fa-eye"></i></span>Preview</a>

      <div class="panel panel-border panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo tr_wd('upload_video') ?></h3>
          </div>
          <div class="panel-body"> 
      
        <div class="col-md-6 col-md-offset-3">
        <div class="animated-radio-button radio-inline">
        <label>
          <input type="radio" name="radio-input" id="upload-active" checked><span class="label-text">Upload</span>
        </label>
        <label>
          <input type="radio" name="radio-input"  id="link-active"><span class="label-text">Youtube, Google..</span>
        </label>
      </div>

        <div id="upload_section">
          <form action="<?php echo base_url('admin/episodes_upload'); ?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
            <input type="hidden" name="videos_id" value="<?php echo $param1; ?>">
            <input type="hidden" name="seasons_id" value="<?php echo $param2; ?>">
            <div class="form-group">
              <label class="control-label" >Episodes Name</label>&nbsp;&nbsp;<input id="episodes_name_upload" type="text" name="episodes_name" class="form-control" placeholder="Episode-1" required="">
            </div>
          <div class="form-group">
            <label class="control-label"><?php echo tr_wd('select_file'); ?></label>
            <input name="FileInput" id="FileInput" type="file" />
          </div>               
          <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-upload"></i></span><?php echo tr_wd('upload_video') ?> </button><br><br></form>
          <div id="progressbox">
            <div class="progress progress-striped active">
              <div id="progressbar" class="progress-bar" style="width: 0%;"></div>                    
            </div>
            <center>
            <div id="statustxt">0%</div>
            </center>
          </div>
          <div id="output"></div>
        </div>
          <div id="link_section" style="display: none;">
            <div class="form-group">
              <label class="control-label" >Episodes Name</label>&nbsp;&nbsp;<input id="episodes_name" type="text" name="" class="form-control" placeholder="Episode-1" required="">
          </div>
            <div class="form-group">
              <label class="control-label"><?php echo tr_wd('source'); ?></label>
              <select class="form-control" name="source" id="selected-source">
                <option value="youtube">Youtube</option>
                <option value="vimeo">Vimeo</option>
                <option value="gdrive">Google Drive</option>
                <option value="amazone">Amazone S3</option>
                <option value="mp4">MP4 From URL</option>
                <option value="mkv">MKV From URL</option>
                <option value="webm">WEBM From URL</option>
                <option value="flv">FLV From URL</option>
                <option value="m3u8">M3U8 From URL</option>
                <option value="embed">Embed URL</option>
              </select>
            </div>
            <div class="form-group" id="_source1">
              <label class="control-label" >URL</label>&nbsp;&nbsp;<input id="video_url" type="url" name="embed_link[]" class="form-control" placeholder="http://server-2.com/movies/titalic.mp4" required=""><br>
            <button class="btn btn-sm btn-primary waves-effect" id="add-link"> <span class="btn-label"><i class="fa fa-plus"></i></span><?php echo tr_wd('add') ?> </button>
          </div>              
      </div>
  </div>
</div></div>
<div class="row"><div class="col-md-12">
    <div class="panel panel-border panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo tr_wd('episodes_list') ?></h3>
          </div>
          <div class="panel-body">               
          <table class="table table-bordered" id="video-list">
            <?php $episodes = $this->db->get_where('episodes', array('videos_id'=> $param1,'seasons_id'=>$param2))->result_array();
                  foreach($episodes as $video_file):

             ?>
             <tr id="row_<?php echo $video_file['episodes_id']; ?>"><td><strong><?php echo $video_file['episodes_name']; ?></strong></td><td><strong><?php echo $video_file['file_source']; ?></strong></td><td><?php echo $video_file['file_url']; ?></a></td><td><a title="delete" class="btn btn-icon" onclick="delete_row('episodes',<?php echo $video_file['episodes_id'];?>)" class="delete"><i class="fa fa-remove"></i></td></tr>             
          <?php endforeach; ?>
          </table>         
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var options = {
            //target:   '#output',   // target element(s) to be updated with server response 
            beforeSubmit: beforeSubmit, // pre-submit callback 
            success: afterSuccess, // post-submit callback 
            uploadProgress: OnProgress, //upload progress callback 
            resetForm: true // reset the form after successful submit 
        };

        $('#MyUploadForm').submit(function() {
            $(this).ajaxSubmit(options);
            // always return false to prevent standard browser submit and page navigation 
            return false;
        });


        //function after succesful file upload (when server response)
        function afterSuccess(data) {
            var response = JSON.parse(data);
            var status = response.status;
            $('#submit-btn').show(); //hide submit button
            //$('#loading-img').hide(); //hide submit button
            $('#progressbox').delay(1000).fadeOut(); //hide progress bar
            if (status == 'success') {
                $('#video-list').append(response.video_info);
                swal('Good job!','Video upload successfully ','success');
            } else {
                //$("#output").html(response.errors);
                swal('OPPS!',response.errors ,'error');
            }
        }

        //function to check file size before uploading.
        function beforeSubmit() {
            //check whether browser fully supports all File API
            if (window.File && window.FileReader && window.FileList && window.Blob) {

                if (!$('#FileInput').val()) //check empty input filed
                {
                    swal('OPPS!',"Please select at least one video file!!" ,'error');
                    //$("#output").html("Please select at least one video file!!");
                    return false
                }

                var fsize = $('#FileInput')[0].files[0].size; //get file size
                var ftype = $('#FileInput')[0].files[0].type; // get file type


                //allow file types 
                switch (ftype) {
                    case 'video/webm':
                    case 'video/avi':
                    case 'video/msvideo':
                    case 'video/x-msvideo':
                    case 'video/mp4':
                    case 'video/mpeg':
                    case 'video/x-matroska':
                    case 'application/x-mpegurl':
                    case 'video/x-flv':
                    case 'video/flv':
                        break;
                    default:
                        swal('OPPS!',"<b>" + ftype + "</b> Unsupported file type/format/extention!" ,'error');
                        //$("#output").html("<b>" + ftype + "</b> Unsupported file type!");
                        return false
                }

                //Allowed file size is less than 5 MB (1048576)
                if (fsize > 5000242880) {
                    $("#output").html("<b>" + bytesToSize(fsize) + "</b> Too big file! <br />File is too big, it should be less.");
                    return false
                }

                $('#submit-btn').hide(); //hide submit button
                $('#loading-img').show(); //hide submit button
                $("#output").html("");
                $('#progressbar').width('0%') //update progressbar percent complete
                $('#statustxt').html('0%'); //update status text  
            } else {
                //Output error to older unsupported browsers that doesn't support HTML5 File API
                $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
                return false;
            }
        }

        //progress bar function
        function OnProgress(event, position, total, percentComplete) {
            //Progress bar
            $('#progressbox').show();
            $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
            $('#statustxt').html(percentComplete + '%'); //update status text
            if (percentComplete > 50) {
                $('#statustxt').css('color', '#000'); //change status text to white after 50%
            }
        }

        //function to format bites bit.ly/19yoIPO
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Bytes';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }

    });
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>

<script>
    $(document).ready(function() {
      $("#upload-active").click(function(){
        $("#upload_section").show();
        $("#link_section").hide();
      });
      $("#link-active").click(function(){
        $("#upload_section").hide();
        $("#link_section").show();
      });
       
       $("#add-link").click(function(){
        $(this).html('<span class="btn-label"><i class="fa fa-plus"></i></span>Adding..');
        var  type = $("#selected-source").val();
        var  url  = $("#video_url").val();
        var  episodes_name  = $("#episodes_name").val();
        var  videos_id  = "<?php echo $param1; ?>";
        var  seasons_id  = "<?php echo $param2; ?>";
        if (isUrl(url)==true && url !='' && type!='' && episodes_name !='') {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url().'admin/episodes_url/';?>",
                data: "videos_id="+videos_id+"&type=" + type + "&url=" + url + "&episodes_name=" +episodes_name + "&seasons_id=" + seasons_id,
                dataType: 'json',
                success: function(response) {
                    var post_status = response.post_status;
                    var row_id = response.row_id;
                    var type = response.type;
                    var episodes_name = response.episodes_name;
                    var url = response.url;                    
                    if (post_status == "success") {
                      var html_text ='<tr id="row_'+row_id+'"><td><strong>'+episodes_name+'</strong></td><td><strong>'+type+'</strong></td><td>'+url+'</a></td><td><a title="delete" class="btn btn-icon" onclick="delete_row('+"'video_file',"+row_id+')" class="delete"><i class="fa fa-remove"></i></td></tr>';
                      $('#video-list').append(html_text);
                      $("#url").val('');
                      $("#add-download-link").html('<span class="btn-label"><i class="fa fa-plus"></i></span>Add to List');
                      $("#video_url").val('');
                      swal('Good job!','Video added successfully ','success');
                      $("#add-link").html('<span class="btn-label"><i class="fa fa-plus"></i></span>Add to List');
                    } else {
                      $("#add-link").html('<span class="btn-label"><i class="fa fa-plus"></i></span>Add to List');
                        swal('OPPS!',post_status ,'error');
                        //alert(post_status); 
                    }

                }
            });
        }else{
          $("#add-download-link").html('<span class="btn-label"><i class="fa fa-plus"></i></span>Add to List');
          $("#add-link").html('<span class="btn-label"><i class="fa fa-plus"></i></span>Add to List');
          swal('OPPS!',"please enter a valid url and title" ,'error');
        }
      });
    });
</script>
<script>
function isUrl(s) {
    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
    return regexp.test(s);
}


</script>

