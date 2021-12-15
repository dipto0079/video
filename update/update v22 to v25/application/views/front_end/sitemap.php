<?php 
$tv_series_publish          = $this->db->get_where('config',array('title'=>'tv_series_publish'))->row()->value;
$blog_enable                = $this->db->get_where('config',array('title'=>'blog_enable'))->row()->value;

echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
    </url>

<!-- Start Sitemap -->
    <url>
    <loc><?php echo base_url()."movies.html";?></loc>
    <priority>0.5</priority>
    </url>
    <?php if($tv_series_publish =='1'):?>
    <url>
    <loc><?php echo base_url()."tv-series.html";?></loc>
    <priority>0.5</priority>
    </url>
<?php endif; ?>
    <!-- Start country -->
    <?php foreach($countries as $country): ?>
    <url>
        <loc><?php echo base_url()."country/".$country['slug'].'.html';?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    <!-- End country -->
    <!-- Start Genre -->
    <?php foreach($genres as $genre): ?>
    <url>
        <loc><?php echo base_url()."genre/".$genre['slug'].'.html';?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    <!-- End Genre -->

    <!-- Start year -->
    <?php $current_year = date("Y");
    $end_year = $current_year - 108;
    for($i=$current_year;$i>$end_year;$i--): ?>
        <url>
            <loc><?php echo base_url()."year/".$i.'.html';?></loc>
            <priority>0.5</priority>
        </url>
    <?php endfor; ?>
    <!-- End year -->



    <!-- Start Movies -->
    <?php foreach($movies as $movie): ?>
    <url>
        <loc><?php echo base_url()."watch/".$movie['slug'].'.html';?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    <!-- End Movies -->

    <!-- Start Movies Type -->
    <?php foreach($movie_types as $movie_type): ?>
    <url>
        <loc><?php echo base_url()."type/".$movie_type['slug'].'.html';?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    <!-- End Movies -->

    <!-- Start TV-Series -->
    <?php foreach($tvs as $tv): ?>
    <url>
        <loc><?php echo base_url()."tv-series/watch/".$tv['slug'].'.html';?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    <!-- End TV-Series -->

    <!-- Start Page -->
    <?php foreach($pages as $page): ?>
    <url>
        <loc><?php echo base_url()."page/".$page['slug'].'.html';?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    <!-- End Page -->

    <!-- Start Blog & post -->
    <?php if($blog_enable =='1'):?>
        <url>
        <loc><?php echo base_url()."blog.html";?></loc>
        <priority>0.5</priority>
        </url>
        <?php foreach($posts as $post): ?>
        <url>
            <loc><?php echo base_url()."blog/".$post['slug'].'.html';?></loc>
            <priority>0.5</priority>
        </url>
        <?php endforeach; ?>

    <?php endif; ?>
    <!-- End Blog & post -->




<!-- END Sitemap -->

</urlset>
