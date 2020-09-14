 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Buku
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Detail Data Buku</li>
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
          <a href="<?php echo base_url('admin/Master_buku') ?>" class="btn btn-primary btn-sm mb-2">Master Buku <i class="fa fa-book"></i> </a>
        </div>
        <div class="box-body">
             <form method="post" id="inputBuku" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $buku->id ?>">
                    <input type="text" class="form-control" name="kd_buku" value="<?php echo $buku->kd_buku ?>" id="kdbuku" placeholder="Input Kode Buku">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $buku->judul_buku ?>" name="judul_buku"  id="judul_buku" placeholder="Input  Judul Buku">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tahun Terbit</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $buku->thn_terbit ?>" name="thn_terbit" id="thn_terbit" placeholder="Input  Tahun Terbit Buku">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pengarang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $buku->pengarang ?>" name="pengarang" id="pengarang" placeholder="Input  Pengarang Buku">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Genre Buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $buku->genre ?>" name="genre" id="genre" placeholder="Input  Genre / Kategori Buku">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lokasi Penyimpanan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $buku->lokasi ?>" name="lokasi" id="lokasi" placeholder="Input  Lokasi Storage Buku">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Buku</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo $buku->jumlah ?>" name="jumlah" id="jumlah" placeholder="QTY Jumlah Buku">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Perbarui Data</button>
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
      $("#inputBuku").on('submit',function(e){
        e.preventDefault();
          if(document.getElementById('kdbuku').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Kode Buku Belum di Input"
              }).then(function(){
                $("#kdbuku").focus();
              })
          }else if(document.getElementById('judul_buku').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Judul Buku Belum di Input"
              }).then(function(){
                $("#judul_buku").focus();
              })
          }else if(document.getElementById('thn_terbit').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Tahun Terbit Buku Belum di Input"
              }).then(function(){
                $("#thn_terbit").focus();
              })
          }else if(document.getElementById('pengarang').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Pengarang Buku Belum di Input"
              }).then(function(){
                $("#pengarang").focus();
              })
          }else if(document.getElementById('genre').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Genre Buku Belum di Input"
              }).then(function(){
                $("#genre").focus();
              })
          }else if(document.getElementById('lokasi').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Lokasi Penyimpanan Buku Belum di Input"
              }).then(function(){
                $("#lokasi").focus();
              })
          }else if(document.getElementById('jumlah').value == ""){
              swal({
                icon : "error" ,
                dangerMode : [true,"Ok"],
                title : "Perhatian" ,
                text : "Jumlah Buku Belum di Input"
              }).then(function(){
                $("#jumlah").focus();
              })
          }else {
              $.ajax({
                  url : "<?php echo base_url('admin/Master_buku/update') ?>" ,
                  method : "POST" ,
                  data : new FormData(this),
                  processData : false ,
                  cache : false ,
                  contentType : false ,
                  success : function(e){
                      if(e == "Sukses Update Buku"){
                        swal({
                          icon : "success" ,
                          title : e 
                        }).then(function(){
                          window.location.href="<?php echo base_url('admin/Master_buku/view/' . $buku->kd_buku) ?>"
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
