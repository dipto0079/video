<?php
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
?>
<section class="sg-section">
    <div class="section-content blog-details">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="sg-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <img src="<?php echo $post_details->image_link; ?>" alt="<?php echo $post_details->post_title; ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="entry-content">
                            
                            <h2 class="entry-title mt-3"><?php echo $post_details->post_title; ?></h2>

                            <?php echo $post_details->content; ?>
                        </div>  
                    </div><!-- /.sg-post -->


                    <?php $this->load->view($theme_dir.'comments',array('PAGE_URL' => base_url('blog/'.$post_details->slug.'.html'),'PAGE_IDENTIFIER'=>'post_'.$post_details->posts_id)); ?> 

                                                                                               
                </div>
                <?php include('blog_sidebar.php'); ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->