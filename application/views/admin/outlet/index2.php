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
            <h1 class="h3 mb-0 text-gray-800">Outlet</h1>
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
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#outletModal">
                    <i class="fas fa-plus"></i>
                    </button>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telephone</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody id="tampil_outlet"></tbody>
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

  <?php $this->load->view('admin/outlet/tambah');?>
  <?php $this->load->view('admin/outlet/edit');?>
  <?php $this->load->view('admin/outlet/hapus');?>

  <?php $this->load->view('admin/template_admin/footer'); ?>

<script type="text/javascript">
    get_outlet();
   function get_outlet(){
        $.ajax({
        url: "<?=base_url('admin/data_outlet')?>",
        success: function(data){
            var data = JSON.parse(data);
            // console.log(data);
            var i;
            var html = "";
            for(i=0; i<data.length; i++){
            var nomor = i+1;
                html += "<tr>";
                html += "<td class'text-center'>"+nomor+"</td>";
                html += "<td class'text-center'>"+data[i].nama_outlet+"</td>";
                html += "<td class'text-center'>"+data[i].alamat_outlet+"</td>";
                html += "<td class'text-center'>"+data[i].tlp+"</td>";
                html += "<td class'text-center'>";
                html += "<button type='button' class='btn btn-warning btn-sm mb-3 btn-circle' data-toggle='modal' data-target='#editOutlet"+data[i].id_outlet+"'><i class='fas fa-pencil-alt'></i></button>";
                html += " <button type='button' class='btn btn-danger btn-sm mb-3 btn-circle' data-toggle='modal' data-target='#hapusOutlet"+data[i].id_outlet+"'><i class='fas fa-trash-alt'></i></button>";
                html += "</td>";
                html += "</tr>";
            }
            $('#tampil_outlet').html(html);
        }
        });
    }

    $(".tombol-simpan-outlet").click(function(){
        var data      = $('.form-outlet').serialize();
        var nama_outlet   = $('#nama_outlet').val();
        var alamat_outlet = $('#alamat_outlet').val();
        var tlp           = $('#tlp').val();
        // console.log(id_paket);
        
        if(nama_outlet === null){
            alertify.error('Nama Outlet Tidak boleh kosong');
        }else if(alamat_outlet === ""){
            alertify.error('Alamat Tidak boleh kosong');
        }else if(tlp === null){
            alertify.error('Nomor Telephone Tidak boleh kosong');
        }else{
            console.log(data);
            $.ajax({
                type: 'POST',
                url : '<?=base_url('admin/tambah_outlet')?>',
                data: data,
                success: function(){
                    get_outlet();
                }
            });
        }
    });
    

</script>
<script type="text/javascript">
$(document).ready( function () {
    $('#dataTable').DataTable(
        {
            "searching": false
        }
    );
} );
</script>
</body>

</html>
