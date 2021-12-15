

<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Movie Importer</h3>
                </div>
                <?php echo form_open(base_url() . 'admin/movie_importer/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
                <div class="panel-body">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="input-group" style="margin-top: 50px;margin-bottom: 10px;">
                            <select name="to" class="form-control" style="max-width: 120px;">
                                <option value="movie" <?php if(isset($to) && $to =='movie'): echo "selected"; endif; ?>>Movie</option>
                                <option value="tv" <?php if(isset($to) && $to =='tv'): echo "selected"; endif; ?>>TV-Series</option>
                            </select>
                            <input type="text" class="form-control" id="" name="title" value="<?php if(isset($title) && $title !=''): echo $title; endif; ?>" placeholder="Enter movie/tvshow title here" required="">
                            <span class="input-group-btn">
                                <button type="submit"class="btn btn-primary"> Search</button>
                            </span>
                        </div>
                        <div class="alert alert-info"><strong>Note:</strong>Your support must be validated to use movie importer.If your support expired please <a class="#" href="https://codecanyon.net/item/ovoomovie-video-streaming-cms-with-unlimited-tvseries/20180569/" target="_blank">Renew support now </a>to get importer support!</div>
                        <?php if(isset($error_message) && $error_message !=''): ?>
                        <div class="alert alert-dismissible alert-danger">
                            <button class="close" type="button" data-dismiss="alert">×</button><strong>Sorry!</strong><?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <?php echo form_close(); ?>
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php  if(isset($movies)):?>
<!-- search result section -->
<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Result</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped" id="datatablessd">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                              if(count($movies) > 0):
                                $sl = 1;
                                $i= 0;
                                foreach ($movies as $videos):
                                    $data = json_decode($movies[$i],true);
                                    $i++;
                            ?>
                              <tr id='row_2'>
                                <td><?php echo $sl++;?></td>
                                <td>
                                    <?php if(!empty($data['poster_path']) && $data['poster_path'] !='' && $data['poster_path'] !=NULL): ?>
                                        <img src="<?php echo "https://image.tmdb.org/t/p/w185/".$data['poster_path'];?>" class="img-fluid">
                                    <?php else: ?>
                                        <img src="<?php echo base_url().'uploads/default_image/thumbnail.jpg';?>" class="img-fluid">
                                    <?php endif; ?>
                                </td>
                                <td><strong><?php if($to =='tv'): echo $data['name']; else: echo $data['title']; endif; ?></strong></td>
                                <td><?php echo $data['overview'];?></td>
                                <td><div id="<?php echo 'div_'.$data['id'];?>"><a class="btn btn btn-outline-primary" href="javascript:void(0);" id="<?php echo 'btn_'.$data['id'];?>" onclick="import_movie(<?php echo $data['id'];?>)">Import</a></td>
                              </tr>
                            <?php 
                                endforeach;
                                else:
                            ?>
                                <tr>
                                    <td><strong>No result found.</strong></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ajax import -->
<script type="text/javascript">
    function import_movie(tmdb_id) {
        var base_url = '<?php echo base_url();?>'
        url = base_url + 'admin/complete_import/'
        var to = '<?php if($to =='tv'): echo "tv"; else: echo 'movie'; endif; ?>'
        //$("#btn_"+tmdb_id).text('Importing..');       
        swal({
            title: 'Are you sure?',
            text: "Click import button to start.\nNote: Actors photo will import by cron.",
            icon: "warning",
            buttons: true,
            buttons: {cancel: {
                text: "Cancel",
                value: false,
                visible: true,
                className: "btn-white",
                closeModal: true,
              },
              confirm: {
                text: "Import",
                value: true,
                visible: true,
                className: "",
                closeModal: false
              }
            },
            dangerMode: false,
            closeOnClickOutside: false
            })         
        .then(function(confirmed){
            if (confirmed){               
                 $.ajax({
                    url: url,
                    type: 'POST',
                    data: 'tmdb_id=' + tmdb_id + '&to=' + to,
                    dataType: 'json'
                 })
                 .done(function(response){
                    swal.stopLoading();
                    swal("Done!", "Imported Successfully", "success");
                    $("#div_"+tmdb_id).html('<button class="btn btn-primary" type="button" disabled="">Imported</button>');
                 })
                 .fail(function(response){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                    $("#div_"+tmdb_id).html('<a class="btn btn btn-outline-primary" href="javascript:void(0);" id="btn_'+tmdb_id+'" onclick="import_movie('+tmdb_id+')">Try Again</a>');
                 })
            }else{
                $("#div_"+tmdb_id).html('<a class="btn btn btn-outline-primary" href="javascript:void(0);" id="btn_'+tmdb_id+'" onclick="import_movie('+tmdb_id+')">Import</a>');
            }
        })      
    }
</script>
<!-- END Ajax import -->
<?php endif; ?>
