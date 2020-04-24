<!-- Modal -->
<div class="modal fade" id="outletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="" method="post" class="form-outlet">
            <div class="form-group">
                <input type="text" name="nama_outlet" placeholder="nama outlet" class="form-control" id="nama_outlet" required>
            </div>
            <div class="form-group">
                <textarea name="alamat_outlet" id="alamat_outlet" cols="5" rows="5" class="form-control" placeholder="alamat outlet"></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="tlp" placeholder="nomor telephone" class="form-control" id="tlp" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary tombol-simpan-outlet" data-dismiss="modal">Simpan</button>
        <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
        </form>
      </div>
    </div>
  </div>
</div>