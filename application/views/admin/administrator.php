 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Admin
        <small><?php echo date("Y-m-d"); ?> / <span id="jam"></span></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengelola</a></li>
        <li class="active">Data Administrator</li>
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
           Data Administrator
        </div>
        <div class="box-body">
          <table id="masterAdmin" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Administrator</th>
                  <th>Nama</th>
                  <th>No Telpon</th>
                  <th>Email </th>
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

      //kirim request data member dalam bentuk json 
       $.ajax({
        url : "<?= base_url('admin/Administrator/sendData') ?>",
        type : 'ajax' ,
        async : false ,
        dataType : 'json',
        success : function(msg){
           var i ;
           var data = [] ;
           var j = 1 ;
            for(i=0 ; i < msg.length ; i++){
              data.push([j++ , msg[i].id_akun , msg[i].nama , msg[i].no_telp , msg[i].email , 
                "<a href='<?php echo base_url("admin/Administrator/view/") ?>"+ msg[i].id_akun +"' class='btn btn-xs btn-info ml-2 ' > view </a>" +
                " <a class='btn btn-xs btn-danger ml-2' href='javascript:del("+ msg[i].id  +")'> delete</a>" ]);
            }
            //tampilkan data buku yang di kirim lewat ajax ke datatable
            $("#masterAdmin").DataTable({
              data : data ,
              deferRender : true ,
              scrollCollapse: true,
              scroller:       true
            });
        }
      })

    })

//hapus data member
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
            url : "<?php echo base_url('admin/Administrator/hapus') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data Administrator di Hapus" ,
                    }).then(function(){
                      window.location.href="<?php echo base_url('admin/Administrator/') ?>"
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