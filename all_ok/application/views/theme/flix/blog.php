<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $movie_per_page                 =   $this->db->get_where('config' , array('title'=>'movie_per_page'))->row()->value; 
?>
<?php if($this->common_model->get_ads_status('blog_header')=='1'): ?>
<!-- header ads -->
    <section class="sg-section">
        <div class="section-content text-center">
            <div class="container">
                <?php echo $this->common_model->get_ads('blog_header'); ?>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </section><!-- /.sg-section -->
<!-- header ads -->
<?php endif; ?>
<section class="sg-section">
    <div class="section-content">
        <div class="container">
            <div class="title">
                <h2><?php echo trans('our_blog'); ?></h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?php if($total_rows > 0){ ?>
                    <div class="row">
                        <?php foreach ($all_published_posts as $posts) :?>
                        <div class="col-lg-6">
                            <div class="sg-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="<?php echo  base_url().'blog/'.$posts->slug.'.html'; ?>"><img src="<?php echo $posts->image_link; ?>" alt="<?php echo $posts->post_title; ?>" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <div class="entry-meta">
                                    </div>
                                    <h2 class="entry-title"><a href="<?php echo  base_url().'blog/'.$posts->slug.'.html'; ?>"><?php echo $posts->post_title; ?></a></h2>
                                    <p><?php echo substr($posts->content, 0, 300). '...'; ?><a href="<?php echo  base_url().'blog/'.$posts->slug.'.html'; ?>">Read More</a></p>
                                </div>  
                            </div><!-- /.sg-post -->
                        </div>
                        <?php endforeach; ?>

                    </div><!-- /.row -->
                    <?php }else{ echo '<h2>No post found..</h2>';} ?>
                    <?php if($total_rows > 12){ echo $links; } ?>
                            
                </div>
                
                <?php include('blog_sidebar.php'); ?>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->