<!-- Modal -->
<?php foreach($outlet as $o):?>
<div class="modal fade" id="editOutlet<?=$o->id_outlet?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Outlet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?=form_open('admin/edit_outlet')?>
                <div class="form-group">
                    <input type="hidden" name="id_outlet" value="<?=$o->id_outlet?>">
                    <input type="text" name="nama_outlet" placeholder="nama outlet" class="form-control" value="<?=$o->nama_outlet?>" id="nama_outlet" required>
                </div>
                <div class="form-group">
                    <textarea name="alamat_outlet" id="alamat_outlet" cols="5" rows="5" class="form-control" placeholder="alamat"><?=$o->alamat_outlet?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="tlp" placeholder="nomor telephone" class="form-control" id="tlp" value="<?=$o->tlp?>" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondar" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success tombol-edit-outlet">Edit</button>
            <?=form_close()?>
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>
