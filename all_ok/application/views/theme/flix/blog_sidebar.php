<div class="col-md-4">
    <div class="sg-sidbar blog-sidbar">

        <div class="sg-widget">
            <h3 class="widget-title"><?php echo trans('category'); ?></h3>
            <ul class="global-list post-category-list">

                <?php   
                    $post_categories =   $this->db->get('post_category')->result();         
                    foreach ($post_categories as $post_category):
                ?>

                    <li><a href="<?php echo base_url().'blog/category/'.$post_category->slug.'.html'; ?>"><?php echo $post_category->category; ?></a></li>

                <?php endforeach ?>

            </ul>
        </div><!-- /.sg-widget -->

        <div class="sg-widget">
            <h3 class="widget-title"><?php echo trans('recent_post'); ?></h3>
            <ul class="global-list">
                <?php
                    $most_rated_posts =   $this->db->get_where('posts', array('publication'=> '1'), 5)->result();         
                    foreach ($most_rated_posts as $most_rated_post):
                ?>
                <li>
                    <div class="sg-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="<?php echo base_url('blog/'.$most_rated_post->slug).'.html';?>"><img src="<?php echo $most_rated_post->image_link;?>" alt="<?php echo $most_rated_post->post_title;?>" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="d-flex">
                                <div class="entry-title">
                                    <h3><a href="<?php echo base_url('blog/'.$most_rated_post->slug).'.html';?>"><?php echo $most_rated_post->post_title;?></a></h3>
                                </div>
                                <div class="entry-meta">
                                    
                                </div>
                            </div>
                            <?php 
                                        $html = strip_tags($most_rated_post->content);
                                        $html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');
                                        $html = mb_substr($html, 0, 100, 'UTF-8');
                                        $html .= "…";
                                     ?>
                            <p><?php echo $html;?></p>
                        </div><!-- /.entry-content -->
                    </div><!-- /.sg-post -->
                </li>
                <?php endforeach ?>

            </ul>
        </div><!-- /.sg-widget -->

    </div><!-- /.sg-sidbar -->
</div>