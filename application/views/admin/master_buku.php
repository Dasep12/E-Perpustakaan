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
         <a href="<?php echo base_url('admin/Master_buku/Tambah_buku') ?>" class="btn btn-primary btn-sm mb-2">Tambah Buku <i class="fa fa-plus"></i> </a>
          <a href="<?php echo base_url('admin/Upload_buku') ?>" class="btn btn-success btn-sm mb-2">Upload CSV <i class="fa fa-file"></i> </a>
        </div>
        <div class="box-body">
          <table id="masterBuku" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Tahun Terbit </th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
    
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

  <script type="text/javascript">
    $(function(){

      //kirim request data buku dalam bentuk json 
       $.ajax({
        url : "<?= base_url('admin/Master_buku/sendData') ?>",
        type : 'ajax' ,
        async : false ,
        dataType : 'json',
        success : function(msg){
           var i ;
           var data = [] ;
           var j = 1 ;
            for(i=0 ; i < msg.length ; i++){
              data.push([j++ , msg[i].kd_buku , msg[i].judul_buku , msg[i].pengarang , msg[i].thn_terbit , 
                "<a href='<?php echo base_url("admin/Master_buku/view/") ?>"+ msg[i].kd_buku +"' class='btn btn-xs btn-info ml-2 ' > view </a>" +
                " <a class='btn btn-xs btn-danger ml-2' href='javascript:del("+ msg[i].id  +")'> delete</a>" ]);
            }
            //tampilkan data buku yang di kirim lewat ajax ke datatable
            $("#masterBuku").DataTable({
              data : data ,
              deferRender : true ,
              scrollCollapse: true,
              scroller:       true
            });
        }
      })

    })

//hapus data akun siswa
function del(id){
    swal({
      title: "Hapus data ?",
      text: "data yang di hapus tidak bisa di kembalikan",
      icon: "warning",
      buttons: [true,"Tetap Hapus"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url : "<?php echo base_url('admin/Master_buku/hapus') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data Buku di Hapus" ,
                    }).then(function(){
                      window.location.href="<?php echo base_url('admin/Master_buku/') ?>"
                    })
                } else {
                  alert("Gagal");
                }
            }

          })
      }
    });
  }
  </script>