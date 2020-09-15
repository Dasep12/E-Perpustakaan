 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Buku
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Data Buku</li>
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
          <a href="<?php echo base_url('admin/Master_buku/Tambah_buku') ?>" class="btn btn-success btn-sm mb-2">Tambah Buku <i class="fa fa-plus"></i> </a>
        </div>
        <div class="box-body">
          <form action="" method="post" id="uploadFile">
            <div class="form-group mb-2">
            <label>Upload File di sini</label>
            <input type="file" onchange="return cek()" class="form-control" name="file" id="file">
          </div>
            <button type="submit" class="mb-2 btn btn-info btn-sm"><i class="fa fa-upload"></i> Upload Data</button>
            <a href="<?php echo base_url('assets/template/format_upload.xlsx') ?>" class="btn btn-danger btn-sm mb-2"><i class="fa fa-download"></i> Download Template</a>
          </form>
          <br>
             <div class="progress active mt-2" id="load" style="display: none;">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="sr-only">20% Complete</span>
                </div>
              </div>
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <table id="masterBuku" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Tahun Terbit </th>
                  <th>QTY</th>
                </tr>
                </thead>
                <tbody id="output">
                </tbody>
              </table>
              <span class="text-danger small"><i>*jika ada kode buku yang sama maka otomatis tidak akan terupload*</i></span>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

  <script type="text/javascript">
//cek ekstensi file yang boleh di upload
function cek(){
      var file = document.getElementById("file");
      var path = file.value ;
      var exe = /(\.xlsx)$/i;
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



    $(function(){
        $('#uploadFile').on('submit', function(event){
          event.preventDefault();

          if(document.getElementById('file').value == ""){
                swal({
                  icon : "error" ,
                  text : "Tidak ada File Terupload" ,
                  title : "Perhatian" ,
                  dangerMode : [true , "Ok"]
                })
            }else {
            $.ajax({
              url:"<?php echo base_url(); ?>admin/Upload_buku/import",
              method:"POST",
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              async :true  ,
              beforeSend : function(){
                $("#load").show();
              },
              complete : function(){
                 $("#load").hide();
              },
              success:function(data){
                var cari = data.search("sudah");
               // alert(cari);
                  if(cari > 0 ){
                      swal({
                          icon : "error" ,
                          title : data  ,
                          dangerMode : [true, "Ok"]
                      });
                      $("#file").val('') ;
                  }else {
                      swal({
                          icon : "success" ,
                          title : "Data Berhasil Terupload"
                      })

                    $("#file").val('') ;
                     var response =  JSON.parse(data)
                     var  html = [] ;
                     var j = 1 ; 
                          for(var i = 0 ; i < response.length ; i++){
                                html.push([ j++ , response[i].kd_buku , response[i].judul_buku , response[i].pengarang , response[i].thn_terbit , response[i].jumlah ])
                          }
                          //tampilkan data buku yang di kirim lewat ajax ke datatable
                          $("#masterBuku").DataTable({
                            data : html
                          });
                  }
                }
            })
          }
        });


    })
  </script>