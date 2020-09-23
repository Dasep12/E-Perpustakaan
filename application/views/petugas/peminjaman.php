 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Data Peminjaman Buku
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
                  <th>Perpanjangan</th>
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
                    <td><?php echo $result->perpanjangan ; ?></td>
                    <td>
                      <?php 
                        $tgl1 = new DateTime($result->tgl_kembali);
                        $tgl2 = new DateTime();
                        	if($tgl1 < $tgl2  && $tgl1 != $tgl2){
                        		$telat = $tgl2->diff($tgl1)->d;
                        		echo "telat " . $telat. " hari<br>";
                        		echo "<button type='button' class='btn btn-xs btn-primary'>denda Rp." . $telat * 2000 . "</button>" ;
                        	}else {
                        		echo "-";
                        	}
                       ?>
                       
                     </td>
                    <td>
                      <a href="javascript:kembalikan('<?php echo $result->id ?>')" class="btn btn-danger btn-xs">kembali</a>
                      <a href="javascript:;" data-id=" <?php echo $result->id ?>" data-toggle="modal" data-target="#perpanjangan" class="btn btn-info btn-xs">perpanjang</a>
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

        <!-- modal form perpanjangan peminjaman -->
         <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="perpanjangan" class="modal fade">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h6>Peminjaman Buku <b id="no_inv"></b></h6>
                     </div>
                     <div class="modal-body" id="output_list">
                      <!-- output hasil di sini -->
                      <form action="" id="formPerpanjangan" method="post">
                        <div class="form-group">
                            <label>ID Peminjaman</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" readonly="" name="id_peminjaman" id="id_peminjaman" class="form-control">
                          </div> 

                          <div class="form-group">
                            <label>Tanggal Peminjaman</label>
                            <input type="text" readonly="" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Tanggal Harus Kembali</label>
                            <input type="text" readonly="" name="tgl_kembali" id="tgl_kembali" class="form-control">
                          </div>    

                          <div class="form-group">
                            <label>Tanggal Perpanjang</label>
                            <input type="text"  name="tgl_perpanjang" id="tgl_perpanjang" class="form-control">
                          </div> 
                      </div>
                     <div class="modal-footer">
                  <button class="btn btn-danger btn-sm">Perpanjang</button>
                 </div>
               </form>
                     </div>
                 </div>
        <!-- end of modal lihat pembelian -->
    </section>
    <!-- /.content -->




  <script type="text/javascript">

// kembalikan buku 
function kembalikan(id){
    swal({
      title: "Kembalikan Buku ?",
      text: "Pastikan Kondisi Buku Sesuai ",
      icon: "warning",
      buttons: [true,"Kembalikan"],
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url : "<?php echo base_url('petugas/Peminjaman/kembalikanBuku') ?>",
            method : "GET",
            data : "id="+ id ,
            beforeSend : function(){
              $(".Loading").show();
            },
            complete : function(){
              $(".Loading").hide();
            },
            success : function(response){
                if(response == "Sukses"){
                  swal({
                    icon : "success" ,
                    title : response ,
                    text : "Buku di terima "
                  }).then(function(){
                    window.location.href="<?php echo base_url('petugas/Peminjaman') ?>"
                  })
                }else {
                  swal({
                    icon : "error" ,
                    dangerMode : [true,"Ok"],
                    title : response
                  })
                }
            }

          })
      }
    });
  }



$(function(){
      
$('#example1').DataTable();


//tampilkan modal perpanjangan peminjaman buku 
    $("#perpanjangan").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("id");
          $.ajax({
            url : "<?php echo  base_url("petugas/Peminjaman/modal_perpanjangan") ?>" ,
            data :"id="+ id ,
            method : "GET",
            success : function(response){
              var data = JSON.parse(response);
               document.getElementById('id_peminjaman').value = data.id_peminjaman ;
               document.getElementById('tgl_pinjam').value = data.tgl_pinjam ;
               document.getElementById('tgl_kembali').value = data.tgl_kembali ;
               document.getElementById('id').value = data.id ;
            }

          })
    }) 

    //menentukan tanggal perpanjangan pengembalian buku
          $("#tgl_perpanjang").datepicker({
              format: 'yyyy-mm-dd',
              autoclose: true,
              todayHighlight: true,
              startDate: new Date()
          });

          $("#formPerpanjangan").on('submit',function(e){
            e.preventDefault();
              if(document.getElementById("tgl_perpanjang").value == ""){
                swal({
                  icon : "error" ,
                  dangerMode : [true,"Ok"],
                  title : "Perhatian" ,
                  text : "Tanggal perpanjangan belum di isi"
                })
              }else {
                $.ajax({
                  url : "<?php echo base_url('petugas/Peminjaman/perpanjanganTanggal') ?>" ,
                  data : new FormData(this) ,
                  cache : false ,
                  method : "POST" ,
                  processData : false ,
                  contentType : false ,
                  beforeSend : function(){
                    $(".Loading").show();
                  },
                  complete : function(){
                    $(".Loading").hide();
                  },
                  success : function(e){
                      if(e == "Berhasil"){
                        swal({
                          icon : "success" ,
                          title : e ,
                          text : "Peminjaman di Perpanjang "
                        }).then(function(){
                          window.location.href="<?php echo base_url('petugas/Peminjaman') ?>"
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
    });
  </script>