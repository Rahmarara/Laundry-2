<div class="col-md-12 mb-4 mt-5">
  <div class="card card-primary">
    <div class="card-header bg-primary">
      <p class="text-center h5 text-white">Transaksi</p>
    </div>
    <div class="card-body">

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            Tambah Transaksi
        </button>
      <table class="table table-hover table-sm table-striped display" cellspacing="0" width="100%" id="table1">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Kode Invoice</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Batas Waktu</th>
            <th>Tanggal Bayar</th>
            <th>Biaya Tambahan</th>
            <th>Diskon</th>
            <th>Status</th>
            <th>Status Bayar</th>
            <th>Harga</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tampil_transaksi"></tbody>
      </table>
    </div>
  </div>
</div>


<?php $this->load->view('admin/transaksi/tambah'); ?>