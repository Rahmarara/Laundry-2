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
            <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
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
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#pelangganModal">
                    <i class="fas fa-plus"></i>
                    </button>
                    <table class="table table-bordered" id="pelangganTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telephone</th>
                                <th>Jenis Kelamin</th>
                                <th>Outlet</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach($data_pelanggan as $dp):?>
                            <tr>
                            <td><?=$no++?></td>
                            <td><?=$dp->nama?></td>
                            <td><?=$dp->alamat?></td>
                            <td><?=$dp->no_hp?></td>
                            <td><?=$dp->jk?></td>
                            <td><?=$dp->outlet?></td>
                            <td>
                            <button type='button' class='btn btn-warning btn-sm mb-3 btn-circle' data-toggle='modal' data-target='#editPelanggan<?=$dp->id_pelanggan?>'><i class='fas fa-pencil-alt'></i></button>
                            <button type='button' class='btn btn-danger btn-sm mb-3 btn-circle' data-toggle='modal' data-target='#hapusPelanggan<?=$dp->id_pelanggan?>'><i class='fas fa-trash-alt'></i></button>
                            </td>
                            </tr>
                          <?php endforeach;?>
                        </tbody>
                        <?php 
                        // $user_profile = $this->session->userdata('cek_login');
                        // if($user_profile->level == "admin"): 
                        ?>
                        <!-- <tbody id="tampil_pelanggan"></tbody>
                        <?php //elseif($user_profile->level == "kasir"):?>
                        <tbody id="tampil_pelanggan_kasir"></tbody>
                        <?php //endif;?> -->
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

  <?php $this->load->view('admin/pelanggan/tambah');?>
  <?php $this->load->view('admin/pelanggan/edit');?>
  <?php $this->load->view('admin/pelanggan/hapus');?>

  <?php $this->load->view('admin/template_admin/footer'); ?>

<script type="text/javascript">
$(document).ready( function () {
   $('#pelangganTable').dataTable();


    $(".tombol-simpan-pelanggan").click(function(){
        var data      = $('.form-pelanggan').serialize();
        var id_outlet = $('#outlet').val();
        var nama      = $('#nama').val();
        var alamat    = $('#alamat').val();
        var no_hp     = $('#no_hp').val();
        var jk        = $('#jk').val();
        // console.log(id_paket);
        
        if(id_outlet === null){
        alertify.error('Outlet Tidak boleh kosong');
        }else if(nama === ""){
        alertify.error('Nama Tidak boleh kosong');
        }else if(alamat === "" || alamat === null){
        alertify.error('Alamat Tidak boleh kosong');
        }else if(no_hp === ""){
        alertify.error('Nomor Telephone Tidak boleh kosong');
        }else if(jk === null){
        alertify.error('Jenis Kelamin Tidak boleh kosong');
        }else{
        console.log(data);
        $.ajax({
            type: 'POST',
            url : '<?=base_url('admin/tambah_pelanggan')?>',
            data: data,
            success: function(){
                // get_pelanggan();
                location.reload();
            }
        });
        }
    });
    
  } );
</script>
</body>

</html>
