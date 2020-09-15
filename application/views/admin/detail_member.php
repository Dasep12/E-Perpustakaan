 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Member
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Detail Data Member</li>
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
          <a href="<?php echo base_url('admin/Master_member') ?>" class="btn btn-primary btn-sm mb-2">Master Member <i class="fa fa-user"></i> </a>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <form method="post" enctype="multipart/form-data " id="updateProfile" class="form-horizontal">
                   <?php if(!empty($member->photo)) { ?>
                    <img style="height: 300px;width: 350px;" class="img img-thumbnail" src="<?php echo base_url('assets/poto/' . $member->photo) ?>">
                   <?php }else { ?>
                    <img height="350px" width="350px" class="img img-thumbnail" src="<?php echo base_url('assets/poto/siswa.jpg') ?>">
                   <?php } ?>
                   <hr>
                   <input type="hidden" name="id" value="<?php echo $member->id; ?>">
                   <input type="hidden" name="photo" value="<?php echo $member->photo; ?>">
                   <input type="hidden" name="idmember" value="<?php echo $member->id_user; ?>">
                   <input type="file" name="file" id="file" class="form-control"><br>
                   <button class="btn btn-info btn-sm mb-2" type="submit">Update Profile</button>
              </form>
            </div>

            <div class="col-md-8">
              <form method="post" enctype="multipart/form-data" id="updateMember" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID Member</label>
                  <div class="col-sm-10">
                     <input type="hidden" name="id" value="<?php echo $member->id; ?>">
                    <input value="<?php echo $member->id_user ?>" readonly="" type="text" class="form-control" name="idmember" id="idmember" placeholder="Input ID Member">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $member->nama ?>" class="form-control" name="nama" id="nama" placeholder="Input Nama Member">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Telpon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $member->no_telp ?>"  name="notelp" id="notelp" placeholder="Input No Telpon Member">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $member->email ?>" class="form-control" name="email" id="email" placeholder="Input Email Member">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea placeholder="Iput Alamat" class="form-control" id="alamat" name="alamat"><?php echo $member->alamat ?></textarea>
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
          </div>
             
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
<script type="text/javascript">
  $(function(){
      $("#updateMember").on('submit',function(e){
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
          }else if(document.getElementById('alamat').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Alamat  Belum di Input"
              }).then(function(){
                $("#alamat").focus();
              })
          }else {
              $.ajax({
                  url : "<?php echo base_url('admin/Master_member/update') ?>" ,
                  method : "POST" ,
                  data : new FormData(this),
                  processData : false ,
                  cache : false ,
                  contentType : false ,
                  success : function(e){
                     // alert(e);
                      if(e == "Berhasil Update Data Member"){
                        swal({
                          icon : "success" ,
                          title : e 
                        }).then(function(){
                          window.location.href="<?php echo base_url('admin/Master_member/view/' . $member->id_user) ?>"
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
                  url : "<?php echo base_url('admin/Master_member/updateProfile') ?>" ,
                  method : "POST" ,
                  data : new FormData(this),
                  processData : false ,
                  cache : false ,
                  contentType : false ,
                  success : function(e){
                     if(e == "Berhasil Update Member"){
                        swal({
                          icon : "success" ,
                          title : e 
                        }).then(function(){
                          window.location.href="<?php echo base_url('admin/Master_member/view/' . $member->id_user) ?>"
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
