<!-- Modal -->
<div class="modal fade" id="pelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="" method="post" class="form-pelanggan">
            <div class="form-group">
            <?php 
            $user_profile = $this->session->userdata('cek_login');
            if($user_profile->level == "admin"): 
            ?>
                <select name="outlet" id="outlet" class="form-control" required>
                    <option value="" selected disabled>Pilih Outlet</option>
                    <?php foreach($outlet as $o):?>
                    <option value="<?=$o->id_outlet?>"><?=$o->nama_outlet?></option>
                    <?php endforeach;?>
                </select>
            <?php elseif($user_profile->level == "kasir"):?>
              <input type="hidden" name="outlet" value="<?=$user_profile->id_outlet?>">
            <?php endif;?>
            </div>
            <div class="form-group">
                <input type="text" name="nama" placeholder="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
                <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control" placeholder="alamat"></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="no_hp" placeholder="nomor telephone" class="form-control" id="no_hp" required>
            </div>
            <div class="form-group">
                <select name="jk" id="jk" class="form-control" required>
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="L">Laki laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary tombol-simpan-pelanggan" data-dismiss="modal">Simpan</button>
        <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
        </form>
      </div>
    </div>
  </div>
</div>