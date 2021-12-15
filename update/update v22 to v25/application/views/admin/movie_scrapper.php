<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <?php 
            $message=$this->session->flashdata('message');
            if(isset($message) && $message !=''){
            echo $message;
            }
            ?>
        </div>

        <div class="col-lg-6 col-md-offset-3">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Movie Scrapper</h3>
                </div>

                <?php echo form_open(base_url() . 'admin/movie_scrapper/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

                <div class="panel-body">
                    <div class="form-group m-b-0">
                        <div class="form-group">
                            <div class="animated-checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name='publication' value="1"><span class="label-text">Publish</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="animated-checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name='fetch_trailer' value="1"><span class="label-text">Fetch Trailer</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" id="" name="movie_list" placeholder="Enter movie title.use ',' comma to separate " required="">
                            <span class="input-group-btn">
                                <button type="submit" id="import_btn" class="btn btn-primary w-sm waves-effect waves-light"> Start Scraping</button>
                            </span>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </div>
</div>
