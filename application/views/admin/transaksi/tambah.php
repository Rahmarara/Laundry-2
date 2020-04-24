<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="" method="post" class="form-group form-transaksi">
            <label for="">Pelanggan</label>
            <select name="pelanggan" id="pelanggan" class="form-control" required>
                <option value="" selected disabled>Pilih Pelanggan</option>
                <?php foreach($pelanggan as $p):?>
                <option value="<?=$p->id_pelanggan?>"><?=$p->nama?></option>
                <?php endforeach;?>
            </select>
            <label for="">Penjual</label>
            <select name="penjual" id="penjual" class="form-control" required>
                <option value="" selected disabled>Pilih Penjual</option>
                <?php foreach($penjual as $p):?>
                <option value="<?=$p->id_user?>"><?=$p->nama_user?></option>
                <?php endforeach;?>
            </select>
            <label for="">Jenis Produk</label>
            <select name="id_paket" id="id_paket" class="form-control tampil_jenis" required></select>
            <label for="">Batas waktu</label>
            <input type="date" name="batas_waktu" class="form-control" id="batas_waktu" required>
            <label for="">Biaya Tambahan</label>
            <input type="number" name="biaya_tambahan"  class="form-control" id="">
            <label for="">Diskon</label>
            <input type="number" name="diskon"  class="form-control" id="diskon">
            <label for="">Pajak</label>
            <input type="number" name="pajak"  class="form-control" id="pajak">
            <label for="">Jumlah</label>
            <input type="number" name="qty" class="form-control" id="qty" required>
            <select name="dibayar" id="dibayar" class="form-control" required>
                <option value="" selected disabled>Pilih Status bayar</option>
                <option value="dibayar">Dibayar</option>
                <option value="belum_dibayar">Belum di bayar</option>
            </select>
            <div id="tampil_tgl_bayar"></div>
            <textarea name="keterangan" id="keterangan" cols="5" rows="5" class="mt-2 form-control" placeholder="keterangan"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary tombol-simpan-transaksi">Save changes</button>
        <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
        </form>
      </div>
    </div>
  </div>
</div>