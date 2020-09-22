 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Laporan Peminjaman Buku
        <small><?php echo date("Y-m-d"); ?> / <span id="jam"></span></small>
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
            Laporan Peminjamn Buku
        </div>
        <div class="box-body">
             <form method="post" action="<?php echo base_url('admin/LaporanPeminjaman/report/') ?>" id="inputPeminjaman" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Dari </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control pinjam" autocomplete="off"  name="tgl_awal" id="tgl_pinjam" placeholder="Tanggal Awal">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sampai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" name="tgl_akhir" id="tgl_kembali" placeholder="Tanggal Akhir">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-file-excel-o"></i>  Download Report</button>
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



<script type="text/javascript">
$(function(){
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
})
</script>
