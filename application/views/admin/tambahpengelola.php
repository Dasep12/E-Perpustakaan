 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Tambah Data Pengelola
        <small><?php echo date("Y-m-d"); ?> / <span id="jam"></span></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengelola</a></li>
        <li class="active">Tambah Pengelola</li>
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
          Tambah Pengelola
        </div>
        <div class="box-body">
             <form method="post" enctype="multipart/form-data" id="inputPengelola" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID Pengelola</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="idpengelola" readonly="" value="<?php echo $idakun ?>" id="idpengelola" placeholder="Input ID Pengelola">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Input Nama Pengelola">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Telpon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Input No Telpon Pengelola">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Input Email Pengelola">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="role_id" name="role_id">
                        <option value="">Pilih Level Pengelola</option>
                        <option value="1">Admninistrator</option>
                        <option value="2">Petugas</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Input Password Pengelola">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Photo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="file" >
                  </div>
                </div>


                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
<script type="text/javascript">
  $(function(){
      $("#inputPengelola").on('submit',function(e){
        e.preventDefault();
          if(document.getElementById('idpengelola').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "ID Pengelola Belum di Input"
              }).then(function(){
                $("#idpengelola").focus();
              })
          }else if(document.getElementById('nama').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Nama Pengelola Belum di Input"
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
          }else if(document.getElementById('role_id').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Level Pengelola di Input"
              }).then(function(){
                $("#role_id").focus();
              })
          }else if(document.getElementById('password').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Password Pengelola di Input"
              }).then(function(){
                $("#password").focus();
              })
          }else {
              $.ajax({
                  url : "<?php echo base_url('admin/TambahPengelola/input') ?>" ,
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
                      //alert(e);
                      if(e == "Berhasil Tambah Pengelola"){
                        swal({
                          icon : "success" ,
                          title : e 
                        }).then(function(){
                          window.location.href="<?php echo base_url('admin/TambahPengelola') ?>"
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
