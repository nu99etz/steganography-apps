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
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img"
                   src="<?php echo Route::getUploadPath('users',$a_form[2]['value']);?>"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">Nina Mcintire</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Data Diri</a></li>
              <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

              <div class="active tab-pane" id="settings">
                <form id = "quickForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                  <?php foreach($a_form as $key => $value) {
                    ?>
                    <?php if($value['input'] == 'text') {
                      ?>
                      <div class="form-group row">
                        <label for="<?php echo $value['label'];?>" class="col-sm-2 col-form-label"><?php echo $value['label'];?></label>
                        <div class="col-sm-10">
                          <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="form-control" id="<?php echo $value['id'];?>" placeholder="<?php echo $value['placeholder'];?>" value="<?php echo $value['value'];?>">
                        </div>
                      </div>
                  <?php  } else if($value['input'] == 'email') {
                    ?>
                    <div class="form-group row">
                      <label for="<?php echo $value['label'];?>" class="col-sm-2 col-form-label"><?php echo $value['label'];?></label>
                      <div class="col-sm-10">
                        <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="form-control" id="<?php echo $value['id'];?>" placeholder="<?php echo $value['placeholder'];?>" value="<?php echo $value['value'];?>">
                      </div>
                    </div>
                <?php  } else if($value['input'] == 'textarea') {
                  ?>
                  <div class="form-group row">
                    <label for="<?php echo $value['label'];?>" class="col-sm-2 col-form-label"><?php echo $value['label'];?></label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="<?php echo $value['name'];?>" id="<?php echo $value['id'];?>" placeholder="<?php echo $value['placeholder'];?>"><?php echo $value['value'];?></textarea>
                    </div>
                  </div>
              <?php } else if($value['input'] == 'option') {
                ?>
                <div class="form-group row">
                  <label for="<?php echo $value['label'];?>" class="col-sm-2 col-form-label"><?php echo $value['label'];?></label>
                  <div class="col-sm-10">
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
                </div>
            <?php } else if($value['input'] == 'file') {
              ?>
              <div class="form-group row">
                <label for="<?php echo $value['label'];?>" class="col-sm-2 col-form-label"><?php echo $value['label'];?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="custom-file-input" id="<?php echo $value['id'];?>" value="<?php echo $value['value'];?>">
                      <label class="custom-file-label" for="exampleInputFile"><?php echo $value['label'];?></label>
                    </div>
                  </div>
                </div>
              </div>
          <?php } else if($value['input'] == 'date') {
            ?>
            <div class="form-group row">
              <label for="<?php echo $value['label'];?>" class="col-sm-2 col-form-label"><?php echo $value['label'];?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" name="<?php echo $value['name'];?>" id="<?php echo $value['id'];?>" placeholder="<?php echo $value['placeholder'];?>" value="<?php echo $value['value'];?>">
              </div>
            </div>
          <?php } else if($value['input'] == 'checkbox') {
            ?>
            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input name="<?php echo $value['name'];?>" type="<?php echo $value['input'];?>"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
        <?php }
                } ?>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <?php if($p_act == null && $c_add) {
                        $button_name = $permit['actadd'];
                        $button_class = 'success';
                      } else if($p_act == 'update' && $c_update) {
                        $button_name = $permit['actupdate'];
                        $button_class = 'warning';
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
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Response">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Adam Jones</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      3 Jan. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
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

 function preview(gambar,idpreview){
       var gb = gambar.files;
             for (var i = -1; i < gb.length; i++){
                 var gbPreview = gb[i];
                 var imageType = /image.*/;
                 var preview=document.getElementById(idpreview);
                 var reader = new FileReader();
                     if (gbPreview.type.match(imageType)) {
                         preview.file = gbPreview;
                         reader.onload = (function(element) {
                             return function(e) {
                                 element.src = e.target.result;
                             };
                         })(preview);
                         reader.readAsDataURL(gbPreview);
                     } else{
                         alert("Type file tidak sesuai. Khusus image.");
                     }
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
          message : "Apakah Anda Yakin Menyimpan Data Ini ?? ",
          buttons : {
            confirm : {
              label : 'Simpan',
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
