<!-- Modal -->
<?php foreach($pengguna as $p):?>
<div class="modal fade" id="editPengguna<?=$p->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?=form_open('admin/edit_pengguna')?>
                <div class="form-group">
                    <select name="outlet" id="outlet" class="form-control" required>
                        <option value="<?=$p->id_outlet?>" selected><?=$p->outlet?></option>
                        <?php foreach($outlet as $o):?>
                            <?php if($p->id_outlet != $o->id_outlet):?>
                            <option value="<?=$o->id_outlet?>"><?=$o->nama_outlet?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="nama_user" placeholder="nama" class="form-control" id="nama_user" value="<?=$p->nama_user?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="username" placeholder="username" class="form-control" id="username" value="<?=$p->username?>" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_user" placeholder="id_user" class="form-control" value="<?=$p->id_user?>" id="id_user">
                    <input type="hidden" name="password" placeholder="password" class="form-control" value="<?=$p->password?>" id="password">
                    <input type="password" name="password_lama" placeholder="password lama" class="form-control" id="password_lama" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_baru" placeholder="password baru" class="form-control" id="password_baru" required>
                </div>
                <div class="form-group">
                    <select name="level" id="level" class="form-control" required>
                        <option value="<?=$p->level?>" selected><?=ucfirst($p->level)?></option>
                        <?php if($p->level != "admin"):?>
                        <option value="admin">Admin</option>
                        <?php endif;?>
                        <?php if($p->level != "kasir"):?>
                        <option value="kasir">Kasir</option>
                        <?php endif;?>
                        <?php if($p->level != "owner"):?>
                        <option value="owner">Owner</option>
                        <?php endif;?>
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
