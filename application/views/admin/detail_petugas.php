 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Petugas
        <small><?php echo date("Y-m-d"); ?> / <span id="jam"></span></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengelola</a></li>
        <li class="active">Detail Data Petugas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
           
          </div>
          <a href="<?php echo base_url('admin/Petugas') ?>" class="btn btn-primary btn-sm mb-2">Master Petugas <i class="fa fa-user"></i> </a>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <form method="post" enctype="multipart/form-data " id="updateProfile" class="form-horizontal">
                   <?php if(!empty($petugas->photo)) { ?>
                    <img style="height: 300px;width: 350px;" class="img img-thumbnail" src="<?php echo base_url('assets/poto/' . $petugas->photo) ?>">
                   <?php }else { ?>
                    <img height="350px" width="350px" class="img img-thumbnail " src="<?php echo base_url('assets/dist/img/001admG001.jpg')?>">
                   <?php } ?>
                   <input type="hidden" name="id" value="<?php echo $petugas->id; ?>">
                   <input type="hidden" name="photo" value="<?php echo $petugas->photo; ?>">
                   <input type="hidden" name="idmember" value="<?php echo $petugas->id_akun; ?>">
                   <input type="file" onchange="return cek()" name="file" id="file" style="margin-top: 2px;margin-bottom: 3px;" class="form-control">
                   <div class="progress active mt-2" id="load" style="display:none; ;">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      <span class="sr-only">20% Complete</span>
                    </div>
                  </div>
                   <button class="btn btn-info btn-sm mb-2" type="submit">Update Profile</button>
              </form>
            </div>

            <div class="col-md-8">
              <form method="post" id="updatePetugas" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID Member</label>
                  <div class="col-sm-10">
                     <input type="hidden" name="id" value="<?php echo $petugas->id; ?>">
                    <input value="<?php echo $petugas->id_akun ?>" readonly="" type="text" class="form-control" name="idmember" id="idmember" placeholder="Input ID Akun">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $petugas->nama ?>" class="form-control" name="nama" id="nama" placeholder="Input Nama Admin">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Telpon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $petugas->no_telp ?>"  name="notelp" id="notelp" placeholder="Input No Telpon Admin">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $petugas->email ?>" class="form-control" name="email" id="email" placeholder="Input Email Admin">
                  </div>
                </div>
                <button type="submit" style="margin-left: 20px;" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Data</button>
                <a href="javascript:reset('<?php echo  $petugas->id ?>')" class="btn btn-danger pull-right"><i class="fa fa-refresh"></i> Reset Password</a>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->

<script>
//cek ekstensi file yang boleh di upload
function cek(){
      var file = document.getElementById("file");
      var path = file.value ;
      var exe = /(\.jpeg|\.png|\.jpg)$/i;
        if(!exe.exec(path)){
          swal({
            icon : "error" ,
            dangerMode : [true,"Ok"],
            title : "Perhatian" ,
            text : "Ekstensi File Tidak di Ijinkan"
          });
          file.value = "" ;
        }
 }
//============//


/*Resett Password */
function reset(id){
    swal({
      title: "Reset Password ?",
      text: "Password berubah menjadi default 123",
      icon: "warning",
      buttons: [true,"Lanjutkan"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url : "<?php echo base_url('admin/Petugas/Reset') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Password Dirubah default ke 123" ,
                    }).then(function(){
                      window.location.href="<?php echo base_url('admin/Petugas/') ?>"
                    })
                } else {
                  alert("Gagal");
                }

            }

          })
      }
    });
  }
//============//

$(function(){
      
 //update data diri admin//
    $("#updatePetugas").on('submit',function(e){
        e.preventDefault();
          if(document.getElementById('idmember').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "ID Member Belum di Input"
              }).then(function(){
                $("#idmember").focus();
              })
          }else if(document.getElementById('nama').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Nama Member Belum di Input"
              }).then(function(){
                $("#nama").focus();
              })
          }else if(document.getElementById('notelp').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "No Telpon Belum di Input"
              }).then(function(){
                $("#notelp").focus();
              })
          }else if(document.getElementById('email').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Email Belum di Input"
              }).then(function(){
                $("#email").focus();
              })
          }else {
              $.ajax({
                  url : "<?php echo base_url('admin/Petugas/update') ?>" ,
                  method : "POST" ,
                  data : new FormData(this),
                  processData : false ,
                  cache : false ,
                  contentType : false ,
                  beforeSend : function(){
                    $('.Loading').show();
                  },
                  complete : function(){
                    $('.Loading').hide();
                  },
                  success : function(e){
                    //  alert(e);
                      if(e == "Berhasil Update Data Petugas"){
                        swal({
                          icon : "success" ,
                          title : e 
                        }).then(function(){
                          window.location.href="<?php echo base_url('admin/Petugas/view/'. $petugas->id_akun) ?>"
                        })
                      }else {
                        swal({
                          icon : "error" ,
                          dangerMode : [true,"Ok"],
                          title : e 
                        })
                      }

                  }
              })
          }
      })
    //==========// 

      //update poto profile member
      $("#updateProfile").on("submit",function(e){
        e.preventDefault();
          if(document.getElementById("file").value == ""){
            swal({
              icon : "error" ,
              dangerMode : [true,"Ok"],
              title : "Perhatian" ,
              text : "Lampiran  Kosong"
            })
          }else {
            $.ajax({
                  url : "<?php echo base_url('admin/Petugas/updateProfile') ?>" ,
                  method : "POST" ,
                  data : new FormData(this),
                  processData : false ,
                  cache : false ,
                  contentType : false ,
                  beforeSend : function(){
                    $("#load").show();
                  },
                  complete : function(){
                     $("#load").hide();
                  },
                  success : function(e){
                     if(e == "Berhasil Update Data Petugas"){
                        swal({
                          icon : "success" ,
                          title : e 
                        }).then(function(){
                          window.location.href="<?php echo base_url('admin/Petugas/view/' . $petugas->id_akun) ?>"
                        })
                      }else {
                        swal({
                          icon : "error" ,
                          dangerMode : [true,"Ok"],
                          title : e 
                        })
                      }
                  }
            })
          }
      })
  })

</script>