<!-- Modal -->
<div class="modal fade" id="penggunaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="" method="post" class="form-pengguna">
            <div class="form-group">
                <select name="outlet" id="outlet" class="form-control" required>
                    <option value="" selected disabled>Pilih Outlet</option>
                    <?php foreach($outlet as $o):?>
                    <option value="<?=$o->id_outlet?>"><?=$o->nama_outlet?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="nama_user" placeholder="nama" class="form-control" id="nama_user" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <select name="level" id="level" class="form-control" required>
                    <option value="" selected disabled>Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success tombol-simpan-pengguna" data-dismiss="modal">Simpan</button>
        <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
        </form>
      </div>
    </div>
  </div>
</div>