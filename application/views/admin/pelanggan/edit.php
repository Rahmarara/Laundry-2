<!-- Modal -->
<?php foreach($pelanggan as $p):?>
<div class="modal fade" id="editPelanggan<?=$p->id_pelanggan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?=form_open('admin/edit_pelanggan')?>
                <div class="form-group">
                    <input type="hidden" name="id_pelanggan" value="<?=$p->id_pelanggan?>">
                    <?php 
                    $user_profile = $this->session->userdata('cek_login');
                    if($user_profile->level == "admin"): 
                    ?>
                    <select name="outlet" class="form-control" required>
                        <option value="<?=$p->id_outlet?>" selected><?=$p->outlet?></option>
                        <?php foreach($outlet as $o):?>
                            <?php if($p->id_outlet != $o->id_outlet):?>
                            <option value="<?=$o->id_outlet?>"><?=$o->nama_outlet?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                    <?php elseif($user_profile->level == "kasir"):?>
                        <input type="hidden" name="id_outlet" value="<?=$p->id_outlet?>">
                    <?php endif;?>
                </div>
                <div class="form-group">
                    <input type="text" name="nama" placeholder="nama" class="form-control" value="<?=$p->nama?>" required>
                </div>
                <div class="form-group">
                    <textarea name="alamat" cols="5" rows="5" class="form-control" placeholder="alamat"><?=$p->alamat?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="no_hp" placeholder="nomor telephone" class="form-control" value="<?=$p->no_hp?>" required>
                </div>
                <div class="form-group">
                    <select name="jk" class="form-control" required>
                        <?php if($p->jk == "L"):?>
                        <?php $jenis_kelamin="Laki-laki"; ?>
                            <option value="<?=$p->jk?>" selected><?=$jenis_kelamin?></option>
                            <option value="P">Perempuan</option>
                        <?php else: $jenis_kelamin="Perempuan";?>
                            <option value="<?=$p->jk?>" selected><?=$jenis_kelamin?></option>
                            <option value="L">Laki laki</option>
                        <?php endif;?>>
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary tombol-edit-pengguna">Edit</button>
            <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
            <?=form_close()?>
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>
