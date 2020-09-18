 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Data Peminjaman  Buku
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Histori Peminjaman </li>
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
          Histori Peminjaman Buku
        </div>
        <div class="box-body">
          <table id="masterBuku" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Peminjaman</th>
                  <th>Judul Buku</th>
                  <th>Kode Buku</th>
                  <th>Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
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
        url : "<?= base_url('petugas/Histori_kembali/sendData') ?>",
        async : false ,
        dataType : 'json',
        success : function(msg){
           var i ;
           var data = [] ;
           var j = 1 ;
            for(i=0 ; i < msg.length ; i++){
              data.push([j++ , "<a href='' class='btn btn-xs btn-info'>" + msg[i].id_peminjaman + "</a>" , msg[i].judul_buku , msg[i].kd_buku , msg[i].peminjam  , msg[i].tgl_pinjam  , msg[i].tgl_kembali , "kembali"]);
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


  </script>