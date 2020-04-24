<!-- Modal -->
<?php foreach($transaksi as $p):?>
<div class="modal fade" id="editTransaksi<?=$p->id_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <form action="" method="post" class="form-group" action="<?=base_url('tambah')?>">
            <label for="">Pelanggan</label>
            <select name="pelanggan" id="pelanggan" class="form-control" required>
                <option value="" selected disabled>Pilih Pelanggan</option>
                <?php foreach($pelanggan as $pl):?>
                <option value="<?=$pl->id_pelanggan?>"><?=$pl->nama?></option>
                <?php endforeach;?>
            </select>
            <label for="">Penjual</label>
            <select name="penjual" id="penjual" class="form-control" required>
                <option value="" selected disabled>Pilih Penjual</option>
                <?php foreach($penjual as $pj):?>
                <option value="<?=$pj->id_user?>"><?=$pj->nama_user?></option>
                <?php endforeach;?>
            </select>
            <label for="">Jenis Produk</label>
            <select name="id_paket"  class="form-control tampil_jenis" required></select>
            <label for="">Batas waktu</label>
            <input type="date" name="batas_waktu" value="<?=$p->batas_waktu?>" class="form-control" id="batas_waktu" required>
            <label for="">Biaya Tambahan</label>
            <input type="number" name="biaya_tambahan" value="<?=$p->biaya_tambahan?>" class="form-control" id="">
            <label for="">Diskon</label>
            <input type="number" name="diskon" value="<?=$p->diskon?>" class="form-control" id="diskon">
            <label for="">Pajak</label>
            <input type="number" name="pajak" value="<?=$p->diskon?>" class="form-control" id="pajak">
            <label for="">Jumlah</label>
            <input type="number" name="qty" class="form-control" id="qty" required>
            <select name="dibayar" class="form-control" required>
                <option value="<?=$p->dibayar?>" selected><?=$p->dibayar?></option>
                <?php if($p->dibayar != "dibayar"): ?>
                <option value="dibayar">Dibayar</option>
                <?php elseif($p->dibayar != "belum_dibayar"):?>
                <option value="belum_dibayar">Belum di bayar</option>
                <?php endif;?>
            </select>
            <div id="tampil_tgl_bayar"></div>
            <textarea name="keterangan" id="keterangan" cols="5" rows="5" class="mt-2 form-control" placeholder="keterangan"></textarea>
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
