<?php $this->load->view('admin/template_admin/header'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view('admin/template_admin/sidebar'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('admin/template_admin/navbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Paket</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#paketModal">
                    <i class="fas fa-plus"></i>
                    </button>
                    <table class="table table-bordered" id="pelangganTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Outlet</th>
                                <th>Jenis</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach($data_paket as $dp):?>
                            <tr>
                            <td><?=$no++?></td>
                            <td><?=$dp->outlet?></td>
                            <td><?=($dp->jenis == "bed_cover") ? "Bed Cover" : $dp->jenis?></td>
                            <td><?=$dp->nama_paket?></td>
                            <td><?="Rp " . number_format($dp->harga,2,',','.')?></td>
                            <td>
                            <button type='button' class='btn btn-warning btn-sm mb-3 btn-circle' data-toggle='modal' data-target='#editPaket<?=$dp->id_paket?>'><i class='fas fa-pencil-alt'></i></button>
                            <button type='button' class='btn btn-danger btn-sm mb-3 btn-circle' data-toggle='modal' data-target='#hapusPaket<?=$dp->id_paket?>'><i class='fas fa-trash-alt'></i></button>
                            </td>
                            </tr>
                          <?php endforeach;?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php $this->load->view('admin/paket/tambah');?>
  <?php $this->load->view('admin/paket/edit');?>
  <?php $this->load->view('admin/paket/hapus');?>

  <?php $this->load->view('admin/template_admin/footer'); ?>

<script type="text/javascript">
$(document).ready( function () {
   $('#pelangganTable').dataTable();
} );
</script>
</body>

</html>
