<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

require_once(Page::usePartial('head'));
require_once(Page::usePartial('sidebar'));
require_once(Page::usePartial('breadcumb'));
include('../common/action.php');

?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <?php if(!empty($_SESSION['FLASH'])) {
      foreach($_SESSION['FLASH'] as $key => $val){
        eval('$'.$key.' = $val;');
      }
      if($post_ok) {
        $post_color = $color;
        $post_msg = $msg;
      } else if($post_err) {
        $post_color = $color;
        $post_msg = $msg;
      }
      ?>
      <div class="alert alert-<?php echo $post_color;?> alert-dismissible fade show" role="alert">
        <?php echo $post_msg;?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php  unset($_SESSION['FLASH']); } ?>

    <div class="row">
      <!-- left column -->
      <div class="col-md-<?php echo $p_col;?>">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $p_title;?></small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <?php if($p_act == null && $c_add) {
            $form_name = $permit['actadd'];
          } else if($p_act == 'update' && $c_update) {
            $form_name = $permit['actupdate'];
          } ?>
          <form role="form" id="quickForm" method="post" action="" enctype="multipart/form-data">
            <div class="card-body">
              <!-- Inisialisasi Form Inputan -->
              <?php if($p_act == 'detail' && $c_read) {
                $p_read = 'readonly';
                $p_disable = 'disabled="disabled"';
              } ?>
              <?php foreach($a_form as $form => $value) {
                  ?>
                  <?php if($value['input'] == 'checkbox') {
                    ?>
                    <div class="form-group mb-0">
                      <div class="custom-control custom-checkbox">
                        <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="custom-control-input" id="<?php echo $value['id'];?>">
                          <label class="custom-control-label" for="exampleCheck1"><?php echo $value['label'];?></label>
                      </div>
                    </div>
              <?php  } else if($value['input'] == 'option') {
                  ?>
                        <div class="form-group">
                          <label><?php echo $value['label'];?></label>
                          <select class="form-control" name="<?php echo $value['name'];?>" <?php echo $p_disable;?>>
                            <?php if($value['empty'] == true) {
                              ?>
                              <option value = "">--Pilih Semua <?php echo $value['label'];?>--</option>
                          <?php  } ?>
                            <?php foreach($value['option'] as $key => $combo) {
                              ?>
                              <?php if($value['value'] != $combo[0]) {
                                ?>
                                  <option value = "<?php echo $combo[0];?>"><?php echo $combo[1];?></option>
                            <?php  } else if($value['value'] == $combo[0]) {
                              ?>
                              <option value = "<?php echo $combo[0];?>" selected><?php echo $combo[1];?></option>
                          <?php  } ?>
                            <?php } ?>
                          </select>
                        </div>
            <?php  } else if($value['input'] == 'file') {
              ?>
                    <div class="custom-file">
                      <input type="<?php echo $value['input'];?>" class="custom-file-input" id="customFile"  name="<?php echo $value['name'];?>" onchange="renderImg(this)">
                      <label class="custom-file-label" for="customFile"><?php echo $value['label'];?></label>
                    </div>

                    <div class="form-group" align = "center">
                    <?php if(!empty($value['value'])) {
                      ?>
                      <img src="<?php echo '../../'.Route::getUploadPath('users',$value['value']);?>" width = "500" class="rendered img-fluid mt-2" alt=""/>
                    <?php } else {
                      ?>
                        <img src="" width = "500" class="rendered img-fluid mt-2" alt=""/>
                    <?php } ?>
                    </div>
          <?php  }else if($value['input'] == 'textarea') {
            ?>
                  <div class="form-group">
                    <label><?php echo $value['label'];?></label>
                    <textarea class="form-control" name="<?php echo $value['name'];?>" rows="<?php echo $value['length'];?>" placeholder="<?php echo $value['placeholder'];?>"></textarea>
                  </div>
        <?php  } else if($value['class'] == 'date') {
                ?>
                <div class="form-group">
                  <label for="<?php echo $value['label'];?>"><?php echo $value['label'];?></label>
                  <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="form-control datepicker" id="<?php echo $value['id'];?>" placeholder="<?php echo $value['placeholder'];?>">
                </div>
        <?php  } else { ?>
                  <div class="form-group">
                    <label for="<?php echo $value['label'];?>"><?php echo $value['label'];?></label>
                    <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="form-control" id="<?php echo $value['id'];?>" placeholder="<?php echo $value['placeholder'];?>" value ="<?php echo $value['value'];?>" <?php echo $p_read;?>>
                  </div>
            <?php  }
                } ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <?php if($p_act == null && $c_add) {
                $button_name = $permit['actadd'];
                $button_class = 'success';
              } else if($p_act == 'update' && $c_update) {
                $button_name = $permit['actupdate'];
                $button_class = 'warning';
              } else {
                $button_name = $permit["act.$custom_name"];
                $button_class = 'success';
              } ?>
              <?php if($p_act != 'detail') {
                  ?>
                  <!-- Buat Pancingan :v -->
                  <input type = "hidden" name = "<?php echo $button_name;?>" value="<?php echo $button_name;?>">

                  <button type="submit" name = "<?php echo $button_name;?>" class="btn btn-<?php echo $button_class;?>" value="<?php echo $button_name;?>"><?php echo $button_name;?></button>
            <?php } ?>
              <?php if($p_act == 'detail' && $c_read) {
                ?>
                  <a href = "../<?php echo Route::Delete($a_data[0][0]);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                  <a href = "../<?php echo Route::Edit($destination,$a_data[0][0]);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Update</a>
          <?php  } ?>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>


<?php

require_once(Page::usePartial('footer'));
require_once(Page::usePartial('script'));

 ?>
<script type="text/javascript" charset="utf-8">


  function renderImg(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('.rendered').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

 $(document).ready(function () {

   bsCustomFileInput.init();

   $('.datepicker').datepicker({
     format: 'yyyy-mm-dd',
   });

   $('#quickForm').validate({
     rules: {
       <?php foreach($a_form as $key => $value) {
         if($value['required'] == true){
           ?>
           <?php echo $value['name'];?>: {
              required : true,
              <?php if($value['length'] != null) {
                ?>
                minlength : <?php echo $value['length'];?>
            <?php  } ?>
              <?php if($value['input'] == 'email') {
                ?>
                ,
                email: true,
            <?php  } ?>
           },
    <?php }
    } ?>
     },
     messages: {
       <?php foreach($a_form as $key => $value) {
         ?>
         <?php
         if($value['required'] == true || $value['length'] != null){
           ?>
           <?php echo $value['name'];?>: {
             required: "Silahkan Mengisi Form <?php echo $value['label'];?>",
             minlength: "Karakter anda tidak sama dengan <?php echo $value['length'];?>"
             <?php if($value['input'] == 'email') {
               ?>
               ,
               email: "Inputan Harus Email"
            <?php } ?>
           },
    <?php }
        }  ?>
     },
     errorElement: 'span',
     errorPlacement: function (error, element) {
       error.addClass('invalid-feedback');
       element.closest('.form-group').append(error);
     },
     highlight: function (element, errorClass, validClass) {
       $(element).addClass('is-invalid');
     },
     unhighlight: function (element, errorClass, validClass) {
       $(element).removeClass('is-invalid');
     },
     submitHandler: function () {
       bootbox.confirm({
         message : "<?php echo $custom_message; ?>",
         buttons : {
           confirm : {
             <?php if(!empty($custom_name)) {
               $label = $custom_name;
             } else {
               $label = 'Simpan';
             } ?>
             label : "<?php echo $label;?>",
             className : 'btn-primary'
           },
           cancel : {
             label : 'Batal',
             className : 'btn-danger'
           }
         },
         callback : function(result) {
           if(result) {
             $('#quickForm')[0].submit();
           }
         }
       });
     }
   });
 });
    window.close();
 </script>
</body>
</html>
