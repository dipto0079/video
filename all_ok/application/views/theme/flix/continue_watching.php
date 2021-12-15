<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';  
?>

<section class="sg-section" id="continue-watching">
</section>


<script>
    $(document).ready(function(){
        // iterate localStorage
        var watch = [];
        for (var i = 0; i < localStorage.length; i++) {

          // set iteration key name
          var key = localStorage.key(i);


          if(key.includes("cfv") || key.includes("cfs")){
              // use key name to retrieve the corresponding value
              var value = localStorage.getItem(key);
              // console.log the iteration key and value
              watch.push([key, value]);
          }
        }

        console.log(watch);

        var base_url = '<?php echo base_url(); ?>'
        url = base_url + 'home/continue_watching/'

        $.ajax({
            url: url,
            type: 'POST',
            data: {watch:watch},
            dataType: 'json'
        })
        .done(function(response) {
            if(watch.length >= 1){
               $("#continue-watching").html(response['view_html']); 
            }
        });



    });


</script>

