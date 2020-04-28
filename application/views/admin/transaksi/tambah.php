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
         <form action="" method="post" class="form-transaksi">
            <div class="form-group">
            <label for="">Pelanggan</label>
              <select name="pelanggan" id="pelanggan" class="form-control" required>
                  <option value="" selected disabled>Pilih Pelanggan</option>
                  <?php foreach($pelanggan as $p):?>
                  <option value="<?=$p->id_pelanggan?>"><?=$p->nama?></option>
                  <?php endforeach;?>
              </select>
            </div>
            <?php if($user_data->level == "admin"):?>
            <div class="form-group">
              <label for="">Penjual</label>
              <select name="penjual" id="penjual" class="form-control" required>
                  <option value="" selected disabled>Pilih Penjual</option>
                  <?php foreach($penjual as $p):?>
                  <option value="<?=$p->id_user?>"><?=$p->nama_user?></option>
                  <?php endforeach;?>
              </select>
            </div>
            <?php else:?>
            <input type="hidden" name="penjual" value="<?=$user_data->id_user?>">
            <?php endif;?>
            <div class="form-group">
              <label for="">Jenis Produk</label>
              <?php if($user_data->level == "admin"):?>
              <select name="id_paket" id="id_paket" class="form-control tampil_jenis" required></select>
              <?php else:?>
              <select name="id_paket" class="form-control" required>
                <option value="" selected disables>Pilih Paket</option>
                <?php foreach($paket as $pk):?>
                <option value="<?=$pk['id_paket']?>"><?=$pk['nama_paket']?></option>
                <?php endforeach;?>
              </select>
              <?php endif;?>
            </div>
            <div class="form-group">
              <label for="">Batas waktu</label>
              <input type="date" name="batas_waktu" class="form-control" id="batas_waktu" required>
            </div>
            <div class="form-group">
              <label for="">Biaya Tambahan</label>
              <input type="number" name="biaya_tambahan"  class="form-control" id="">
            </div>
            <div class="form-group">
              <label for="">Diskon</label>
              <input type="number" name="diskon"  class="form-control" id="diskon">
            </div>
            <div class="form-group">
              <label for="">Pajak</label>
              <input type="number" name="pajak"  class="form-control" id="pajak">
            </div>
            <div class="form-group">
              <label for="">Jumlah</label>
              <input type="number" name="qty" class="form-control" id="qty" required>
            </div>
            <div class="form-group">
              <select name="dibayar" id="dibayar" class="form-control" required>
                  <option value="" selected disabled>Status bayar</option>
                  <option value="dibayar">Dibayar</option>
                  <option value="belum_dibayar">Belum di bayar</option>
              </select>
            </div>
            <div class="form-group">
              <div id="tampil_tgl_bayar"></div>
            </div>
            <div class="form-group">
              <textarea name="keterangan" id="keterangan" cols="5" rows="5" class="mt-2 form-control" placeholder="keterangan"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success tombol-simpan-transaksi">Save</button>
        <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
        </form>
      </div>
    </div>
  </div>
</div>