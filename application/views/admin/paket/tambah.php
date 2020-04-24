<!-- Modal -->
<div class="modal fade" id="paketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- <form action="" method="post" class="form-pelanggan"> -->
        <?=form_open('admin/tambah_paket')?>
            <div class="form-group">
            <select name="id_outlet" class="form-control" required>
                <option value="" selected disabled>Pilih Outlet</option>
                <?php foreach($outlet as $o):?>
                <option value="<?=$o->id_outlet?>"><?=$o->nama_outlet?></option>
                <?php endforeach;?>
            </select>
            </div>
            <div class="form-group">
            <select name="jenis" class="form-control" required>
                    <option selected disabled>Pilih Jenis</option>
                    <option value="kaos">Kaos</option>
                    <option value="selimut">Selimut</option>
                    <option value="kaos">Kaos</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="lain">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="nama_paket" placeholder="nama paket" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="number" name="harga" placeholder="harga paket" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary tombol-simpan-pelanggan">Simpan</button>
        <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
        <!-- </form> -->
        <?=form_close()?>
      </div>
    </div>
  </div>
</div>