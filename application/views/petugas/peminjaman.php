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
          Data Peminjaman 
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
                  <th>Peminjam</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1 ; foreach($peminjaman as $result) : ?>
                  <tr>
                    <td><?php echo $no++ ; ?></td>
                    <td><?php echo $result->kd_buku ; ?></td>
                    <td><?php echo $result->judul_buku ; ?></td>
                    <td><?php echo $result->peminjam ; ?></td>
                    <td><?php echo $result->tgl_pinjam ; ?></td>
                    <td><?php echo $result->tgl_kembali ; ?></td>
                    <td>
                      <?php 
                          if($result->tgl_kembali > new DateTime()  ){
                            echo "Buku terlambat";
                          }else {
                            echo "-";
                          }
                       ?>
                       
                     </td>
                    <td>
                      <a href="" class="btn btn-danger btn-xs">kembali</a>
                      <a href="" class="btn btn-info btn-xs">perpanjang</a>
                    </td>
                  </tr>
                <?php endforeach ?>
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
      $('#example1').DataTable();
    });
  </script>