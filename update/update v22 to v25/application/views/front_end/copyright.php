<?php   $about_us_enable              =   $this->db->get_where('config' , array('title'=>'about_us_enable'))->row()->value;
        $about_us_to_footer_menu              =   $this->db->get_where('config' , array('title'=>'about_us_to_footer_menu'))->row()->value;
        $site_name =   $this->db->get_where('config' , array('title'=>'site_name'))->row()->value;?>

<!-- copyright -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-left">
                <p> Copyright &copy;<?php echo date('Y') ?> <a href="<?php echo base_url(); ?>"><?php echo $site_name; ?></a></p>
            </div>
            <div class="col-sm-6 text-right">
                <ul class="footer-list">
                    <?php $all_video_type_on_footer_menu= $this->common_model->all_video_type_on_footer_menu();
                                            foreach ($all_video_type_on_footer_menu as $video_type):                                                
                    ?>
                    <li><a href="<?php echo base_url().'type/'.$video_type->slug?>"><?php echo $video_type->video_type;?></a></li>
                <?php endforeach; ?>
                <?php $all_page_on_footer_menu= $this->common_model->all_page_on_footer_menu();
                                            foreach ($all_page_on_footer_menu as $pages):                                                
                    ?>
                    <li><a href="<?php echo base_url().'page/'.$pages->slug.'.html';?>"><?php echo $pages->page_title?></a></li>
                <?php endforeach; ?>
                <?php if($about_us_enable =='1' && $about_us_to_footer_menu =='1'):?>
                    <li><a href="<?php echo base_url('about-us.html')?>">About Us</a></li>
                <?php endif; ?>                   
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- copyright -->