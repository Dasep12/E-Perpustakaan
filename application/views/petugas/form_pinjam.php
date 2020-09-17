 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Peminjaman Buku
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
        </div>
        <div class="box-body">
             <form method="post" id="inputPeminjaman" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Cari Buku <i class="fa fa-search"></i></button>
                  <div class="col-sm-8">
                    <input type="hidden" name="id_buku" id="id_buku">
                    <input type="text"  readonly="" class="form-control" name="kd_buku" id="kdbuku" placeholder="Input Kode Buku">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text"  readonly="" class="form-control" name="judul_buku" id="judul_buku" placeholder="Input  Judul Buku">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Peminjam</label>
                  <div class="col-sm-10">
                    <select  id="id_user" name="id_user" class="form-control select2" style="width: 100%;">
                      <option value="">Cari User</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Peminjaman</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control pinjam"  name="tgl_pinjam" id="tgl_pinjam" placeholder="Input Tanggal Peminjaman">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kembali</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="Input Tanggal Kembali">
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
    </section>
    <!-- /.content -->

<!-- Modal data buku -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cari Buku</h4>
                    </div>
                    <div class="modal-body">
                        <table id="dataTables2" width="100%" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Kode Buku</th>
                                    <th>QTY</th>
                                    <th>Pilih</th>
                                </tr>
                                <tbody>
                                  
                                </tbody>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

        <!-- end of modal tabel data_buku -->


<script type="text/javascript">
  $(function(){

    //inputkan data buku yang di pinjam kedalam database ketika tombol submit di tekan
    $("#inputPeminjaman").on('submit',function(e){
      e.preventDefault();
        if(document.getElementById("kdbuku").value == ""){
            swal({
              icon : "warning" ,
              title : "Perhatian" ,
              text : "Kode Buku Belum di Isi",
              dangerMode : [true,"Ok"]
            })
        }else if(document.getElementById("id_user").value == ""){
            swal({
              icon : "warning" ,
              title : "Perhatian" ,
              text : "Nama Peminjam Belum di Isi",
              dangerMode : [true,"Ok"]
            }).then(function(){
              $("#id_user").focus();
            })
        }else if(document.getElementById("tgl_pinjam").value == ""){
            swal({
              icon : "warning" ,
              title : "Perhatian" ,
              text : "Tanggal Peminjaman Belum di Isi",
              dangerMode : [true,"Ok"]
            }).then(function(){
              $("#tgl_pinjam").focus();
            })
        }else if(document.getElementById("tgl_kembali").value == ""){
            swal({
              icon : "warning" ,
              title : "Perhatian" ,
              text : "Tanggal Pengembalian Belum di Isi",
              dangerMode : [true,"Ok"]
            }).then(function(){
              $("#tgl_kembali").focus();
            })
        }else {
            $.ajax({
                url : "<?php echo base_url('petugas/Form_pinjam/inputPeminjaman') ?>" ,
                data : new FormData(this) ,
                method : "POST" ,
                cache : false ,
                processData : false  ,
                contentType : false ,
                success : function(e){
                    if(e == "Sukses"){
                      swal({
                        icon : "success",
                        title : "Berhasil" ,
                        text : "Buku di Pinjamkan"
                      }).then(function(){
                        window.location.href="<?php echo base_url('petugas/Form_pinjam') ?>"
                      })
                    }else {
                      swal({
                        icon : "error" ,
                        title : "Oops" ,
                        text : e ,
                        dangerMode : [true, "Ok"]
                      })
                    }
                }
            })
        }
    })

    //menentukan tanggal pinjam dan tanggal kembali
    $("#tgl_pinjam,#tgl_kembali").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    $("#tgl_pinjam").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_kembali").datepicker('setStartDate', startDate);
        if($("#tgl_pinjam").val() > $("#tgl_kembali").val()){
          $("#tgl_kembali").val($("#tgl_pinjam").val());
        }
    });


    //kirim request data buku dalam bentuk json 
       $.ajax({
        url : "<?= base_url('petugas/Form_pinjam/sendData') ?>",
        async : false ,
        dataType : 'json',
        success : function(buku){
           var i ;
           var data = [] ;
           var j = 1 ;
            for(i=0 ; i < buku.length ; i++){
              data.push([j++ , buku[i].judul_buku , buku[i].pengarang , buku[i].kd_buku , buku[i].jumlah , "<a data-id='"+ buku[i].id +"' data-judulbuku='"+ buku[i].judul_buku +"' data-kodebuku='"+ buku[i].kd_buku +"' class='btn btn-danger btn-sm pilih'>Pilih</a>" ]);
            }
            //tampilkan data buku yang di kirim lewat ajax ke modal table
            $("#dataTables2").DataTable({
              data : data ,
              deferRender : true ,
              scrollCollapse: true,
              scroller:       true
            });
        }
      })

       //inputkan data buku kedalam form jika tombol pilih di tekan
       $(document).on('click', '.pilih', function (e) {
        e.preventDefault();
                document.getElementById("id_buku").value = $(this).attr('data-id');
                document.getElementById("judul_buku").value = $(this).attr('data-judulbuku');
                document.getElementById("kdbuku").value = $(this).attr('data-kodebuku');
                $('#myModal').modal('hide');
            });


    //load data peminjam dari database dan kirim ke select
     $(".select2").select2({
        ajax: { 
             url: "<?php echo base_url("petugas/Form_pinjam/sendSelect") ?>",
             dataType: "json",
             delay : 250 ,
             data : function(params){
                return {
                 id_user : params.term
                };
             },
             processResults : function(data){
                  var results = [] ;
                  $.each(data,function(index,item){
                      results.push({
                        id : item.id_user,
                        text : item.id_user +"-"+ item.nama
                      })
                  });
                  return {
                    results : results
                  };
             }
       }      
      });


  })

</script>
