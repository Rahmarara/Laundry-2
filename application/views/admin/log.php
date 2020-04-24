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
            <h1 class="h3 mb-0 text-gray-800">Log Activity</h1>
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
                    <table class="table table-bordered" id="dataLog" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>User</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data_log as $dl): ?>
                            <tr>
                                <td><?=date('d-m-Y',strtotime($dl->log_time))?></td>
                                <td><?=$dl->log_user?></td>
                                <td><?=$dl->log_desc?></td>
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

  <?php $this->load->view('admin/template_admin/footer'); ?>

<script type="text/javascript">
$(document).ready( function () {
    $('#dataLog').DataTable();
} );
</script>
</body>

</html>
