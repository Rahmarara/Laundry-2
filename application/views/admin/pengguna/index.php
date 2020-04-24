<div class="col-md-12 col-lg-6 mt-3 mb-5">
  <div class="card card-primary">
    <div class="card-header bg-primary">
      <p class="text-center h5 text-white">Pengguna</p>
    </div>
    <div class="card-body">
      
      <table class="table table-hover table-sm table-striped" cellspacing="0" width="100%" id="table-pengguna">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#penggunaModal">
            Tambah Pengguna
        </button>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Outlet</th>
            <th>Setting</th>
          </tr>
        </thead>
        <tbody id="tampil_pengguna"></tbody>
      </table>
    </div>
  </div>
</div>

<?php $this->load->view('admin/pengguna/tambah');?>