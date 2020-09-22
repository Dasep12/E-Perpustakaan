 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Laporan Data Anggota
        <small><?php echo date("Y-m-d"); ?> / <span id="jam"></span></small>
      </h1>
      <ol class="breadcrumb">
<!--         <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li> -->
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
            Laporan Data Angggota
        </div>
        <div class="box-body">
             <form method="post" action="<?php echo base_url('admin/LaporanData_anggota/report/') ?>" id="inputPeminjaman" class="form-horizontal">
              <div class="box-body">
                <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>  Download Data Anggota</button>
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

