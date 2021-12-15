<div class="col-md-3 col-sm-4 m-t-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ad_300x250 m-b-20">
                            <?php $ad_250x300=$this->db->get_where('config' , array('title' =>'ad_250x300_type'))->row()->value;
if ($ad_250x300 !=0){
if ($ad_250x300==1){
    echo '<a href="'.$this->db->get_where('config' , array('title' =>'ad_250x300_url'))->row()->value.'"><img src="'.$this->db->get_where('config' , array('title' =>'ad_250x300_image_url'))->row()->value.'" width="265"></a>';
}else if ($ad_250x300==2){
    echo $this->db->get_where('config' , array('title' =>'ad_250x300_code'))->row()->value;
    }
    } ?> 
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-movie most-liked">
                        <h1 class="sidebar-title">Category</h1>
                        <ul class="post-category-list list-unstyled">
                        <?php   
                                $post_categories =   $this->db->get('post_category')->result();         
                                    foreach ($post_categories as $post_category):
                        ?>

                        <li><a href="<?php echo base_url().'blog/category/'.$post_category->slug.'.html'; ?>"><?php echo $post_category->category; ?></a></li>

                        <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="sidebar-movie most-viewed">
                        <h1 class="sidebar-title">Recent Post</h1>
                        <?php
                                $most_rated_posts =   $this->db->get_where('posts', array('publication'=> '1'), 5)->result();         
                                    foreach ($most_rated_posts as $most_rated_post):
                        ?>

                        <div class="media">
                            <div class="media-left"> <img src="<?php echo $most_rated_post->image_link;?>" alt="<?php echo $most_rated_post->post_title;?>" width="40"> </div>
                            <div class="media-body">
                                <h1><a href="<?php echo base_url('blog/'.$most_rated_post->slug).'.html';?>"><?php echo $most_rated_post->post_title;?></a></h1>
                                
                            </div>
                        </div>

                        <?php endforeach ?>
                    </div>

                    <div class="google_add m-l-50">
                    	<?php $ad_160x600=$this->db->get_where('config' , array('title' =>'ad_160x600_type'))->row()->value;
                                    if ($ad_160x600 !=0){
                                    if ($ad_160x600==1){
                                        echo '<a href="'.$this->db->get_where('config' , array('title' =>'ad_160x600_url'))->row()->value.'"><img src="'.$this->db->get_where('config' , array('title' =>'ad_160x600_image_url'))->row()->value.'"></a>';
                                    }else if ($ad_160x600==2){
                                        echo $this->db->get_where('config' , array('title' =>'ad_160x600_code'))->row()->value;
                                        }
                                        } 
                                ?> 
                    </div>


                </div>
            </div>