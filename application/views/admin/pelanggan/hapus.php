<!-- Modal -->
<?php foreach($pelanggan as $p):?>
<div class="modal fade" id="hapusPelanggan<?=$p->id_pelanggan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?=form_open('admin/hapus_pelanggan')?>
            Yakin menghapus data ini ?
            <input type="hidden" name="id_pelanggan" value="<?=$p->id_pelanggan?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondar" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger tombol-edit-pengguna">Yakin</button>
            <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
            <?=form_close()?>
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>
