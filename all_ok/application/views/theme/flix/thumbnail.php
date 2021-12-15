<div class="sg-video">
    <div class="thumb">
        <a href="<?php echo base_url('watch/'.$videos['slug']).'.html';?>"><img src="<?php echo base_url('uploads/default_image_flix/image_336X500.png'); ?>" alt="<?php $videos['title']; ?>" class="img-fluid lazy" data-src="<?php echo $this->common_model->get_video_thumb_url($videos['videos_id']); ?>"></a>
    </div>
</div>