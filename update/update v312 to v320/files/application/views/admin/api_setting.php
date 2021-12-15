<style type="text/css">
  .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
      color: #ffffff;
      background-color: #009688;
      border-color: transparent;
      border-radius: 0;
  }
  .table-responsive-stack tr {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
}


.table-responsive-stack td,
.table-responsive-stack th {
   display:block;
/*      
   flex-grow | flex-shrink | flex-basis   */
   -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}

.table-responsive-stack .table-responsive-stack-thead {
   font-weight: bold;
}

@media screen and (max-width: 768px) {
   .table-responsive-stack tr {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      border-bottom: 3px solid #ccc;
      display:block;
      
   }
   /*  IE9 FIX   */
   .table-responsive-stack td {
      float: left\9;
      width:100%;
   }
}
.card{
  padding: 10px;
  border-radius: 0;
}


</style>
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#rest_api" role="tab"><?php echo trans("rest_api");?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#legacy_api" role="tab"><?php echo trans("legacy_api_admin_title");?></a>
  </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane card" id="rest_api" role="tabpanel">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <h3 class="panel-title"><?php echo trans("api_details");?></h3>

          <h5><?php echo trans("api_authentication");?></h5>
          <table class="table table-bordered table-striped table-responsive-stack">
            <thead class="thead-dark">
              <tr>
                <th><?php echo trans("username");?></th>
                <th><?php echo trans("password");?></th>
                <th></th>
              </tr>
            <tbody>
              <?php 
                foreach ($rest_logins as $rest_login):
              ?>
                <tr>                
                  <td><?php echo $rest_login['username']; ?></td>
                  <td><?php echo $rest_login['password']; ?></td>
                  <td>
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mymodal" id="menu" data-id="<?php echo base_url() . 'admin/view_modal/api_authentication_edit/'. $rest_login['id'];;?>" href="<?php echo base_url() . 'admin/api_setting/delete_authentication/'.$rest_login['id']; ?>"><?php echo trans("edit");?></a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'admin/api_setting/delete_authentication/'.$rest_login['id']; ?>"><?php echo trans("revoke_api_authentication");?></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <h5><?php echo trans("generate_another_authentication");?></h5>
          <?php echo form_open(base_url() . 'admin/api_setting/create_authentication/' , array('class' => 'form-inline', 'enctype' => 'multipart/form-data'));?>
            <div class="form-group mx-sm-3 mb-2">
              <label for="username" class="sr-only"><?php echo trans("label");?>:</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="<?php echo trans("enter_username");?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-2"><?php echo trans("generate_api_key");?></button>
          </form>
          <hr>


          <h5><?php echo trans("apis");?></h5>
          <table class="table table-bordered table-striped table-responsive-stack">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th><?php echo trans("api_vesion");?></th>
                <th><?php echo trans("api_server_url");?></th>
                <th><?php echo trans("support");?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>1.0.0</td>
                <td><?php echo base_url('api/v100/') ?></td>
                <td>Android: V1.2.0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <h3 class="panel-title"><?php echo trans("api_keys");?></h3>
          <table class="table table-bordered table-striped table-responsive-stack">
            <thead class="thead-dark">
              <tr>
                <th><?php echo trans("label");?></th>
                <th><?php echo trans("api_key");?></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($keys as $key): ?>
              <tr>
                <td><?php echo $key['label']; ?></td>
                <td><?php echo $key['key']; ?></td>
                <td>
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mymodal" id="menu" data-id="<?php echo base_url() . 'admin/view_modal/api_key_edit/'. $key['id'];;?>" href="<?php echo base_url() . 'admin/api_setting/delete_authentication/'.$rest_login['id']; ?>"><?php echo trans("edit");?></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'admin/api_setting/delete_key/'.$key['id']; ?>"><?php echo trans("revoke_api_key");?></a>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table><br><br>

          <h5><?php echo trans("generate_another_api_key");?></h5>
          <hr>

          <?php echo form_open(base_url() . 'admin/api_setting/create_key/' , array('class' => 'form-inline', 'enctype' => 'multipart/form-data'));?>
            <div class="form-group mx-sm-3 mb-2">
              <label for="label" class="sr-only"><?php echo trans("label");?>:</label>
              <input type="text" name="label" class="form-control" id="label" placeholder="<?php echo trans("enter_label");?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-2"><?php echo trans("generate_api_key");?></button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane active card" id="legacy_api" role="tabpanel">
    <?php echo form_open(base_url() . 'admin/api_setting/update_legacy_api/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?> 
    <div class="form-group row">
      <label class="col-sm-3 control-label"><strong><?php echo trans('api_url_for_android');?></strong></label>
      <div class="col-sm-9">
        <input type="text"  value="<?php echo base_url('api/') ?>" readonly class="form-control" required data-parsley-length="[14, 128]" />
        <p><small><?php echo trans('api_url_note');?></small></p>
      </div>
    </div>          

    <div class="form-group row">
      <label class="col-sm-3 control-label"><strong><?php echo trans('api_key_for_android');?></strong></label>
      <div class="col-sm-3">
        <input type="text"  value="<?php echo $this->db->get_where('config' , array('title' =>'mobile_apps_api_secret_key'))->row()->value;?>" name="mobile_apps_api_secret_key" class="form-control" required data-parsley-length="[14, 128]" />
      </div>
      <div class="col-sm-3">
        <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/regenerate_mobile_secret_key'); ?>"><?php echo trans('create_new_key');?></a>
      </div>
    </div>

    <div class="col-sm-offset-3 col-sm-9 m-t-15">
      <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo trans("save_changes");?></button>
    </div>
   <?php echo form_close(); ?>
  </div>
</div>           
<!-- panel  -->    


<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $('form').parsley();
  });
</script> 

<!-- file select--> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script> 
<!-- file select-->


<script type="text/javascript">
  $(document).ready(function() {

   
   // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
   $('.table-responsive-stack').find("th").each(function (i) {
      
      $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+ $(this).text() + ':</span> ');
      $('.table-responsive-stack-thead').hide();
   });

   
   
   
   
$( '.table-responsive-stack' ).each(function() {
  var thCount = $(this).find("th").length; 
   var rowGrow = 100 / thCount + '%';
   //console.log(rowGrow);
   $(this).find("th, td").css('flex-basis', rowGrow);   
});
   
   
   
   
function flexTable(){
   if ($(window).width() < 768) {
      
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").show();
      $(this).find('thead').hide();
   });
      
    
   // window is less than 768px   
   } else {
      
      
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").hide();
      $(this).find('thead').show();
   });
      
      

   }
// flextable   
}      
 
flexTable();
   
window.onresize = function(event) {
    flexTable();
};
   
   
   
   

  
// document ready  
});




</script>

