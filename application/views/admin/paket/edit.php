<!-- Modal -->
<?php foreach($data_paket as $o):?>
<div class="modal fade" id="editPaket<?=$o->id_paket?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Paket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body">
            <?=form_open('admin/edit_paket')?>
            <div class="form-group">
            <select name="id_outlet" class="form-control" required>
                <option value="<?=$o->id_outlet?>" selected><?=$o->outlet?></option>
                <?php foreach($outlet as $p):?>
                    <?php if($p->id_outlet != $o->id_outlet):?>
                    <option value="<?=$p->id_outlet?>"><?=$p->nama_outlet?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
            </div>
            <div class="form-group">
                <!-- <input type="text" name="jenis" placeholder="jenis paket" value="<?=$o->jenis?>" class="form-control" required> -->
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
                <input type="hidden" name="id_paket" value="<?=$o->id_paket?>">
                <input type="text" name="nama_paket" placeholder="nama paket" class="form-control" value="<?=$o->nama_paket?>" required>
            </div>
            <div class="form-group">
                <input type="text" name="harga" placeholder="harga paket" class="form-control" value="<?=$o->harga?>" required>
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
