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
         <form method="post"  action="<?=base_url('admin/edit_transaksi/')?>">
            <div class="form-group">
                <input type="hidden" name="id_transaksi" value="<?=$p->id_transaksi?>">
                <input type="hidden" name="kode_invoice" value="<?=$p->kode_invoice?>">
                <input type="hidden" name="tgl" value="<?=$p->tgl?>">
                <select name="pelanggan" id="pelanggan" class="form-control" required>
                    <option value="" selected disabled>Pilih Pelanggan</option>
                    <?php foreach($pelanggan as $pl):?>
                    <option value="<?=$pl->id_pelanggan?>"><?=$pl->nama?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <select name="penjual" id="penjual<?=$p->id_transaksi?>" class="form-control" required>
                    <option value="" selected disabled>Pilih Penjual</option>
                    <?php foreach($penjual as $pj):?>
                    <option value="<?=$pj->id_user?>"><?=$pj->nama_user?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <select name="id_paket"  class="form-control tampil_jenis<?=$p->id_transaksi?>" required></select>
            </div>
            <div class="form-group">
                <label for="">Batas Waktu</label>
                <input type="date" name="batas_waktu" placeholder="batas waktu" value="<?=$p->batas_waktu?>" class="form-control" id="batas_waktu" required>
            </div>
            <div class="form-group">
                <label for="">Biaya Tambahan</label>
                <input type="number" name="biaya_tambahan" placeholder="biaya tambahan" value="<?=$p->biaya_tambahan?>" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Diskon</label>
                <input type="number" name="diskon" placeholder="diskon" value="<?=$p->diskon?>" class="form-control" id="diskon">
            </div>
            <div class="form-group">
                <label for="">Pajak</label>
                <input type="number" name="pajak" placeholder="pajak" value="<?=$p->diskon?>" class="form-control" id="pajak">
            </div>
            <div class="form-group">
                <label for="">Jumlah Paket</label>
                <input type="number" name="qty" placeholder="jumlah" class="form-control" id="qty" required>
            </div>
            <div class="form-group">
                <select name="dibayar" class="form-control" required>
                    <option value="<?=$p->dibayar?>" selected><?=$p->dibayar?></option>
                    <?php if($p->dibayar != "dibayar"): ?>
                    <option value="dibayar">Dibayar</option>
                    <?php elseif($p->dibayar != "belum_dibayar"):?>
                    <option value="belum_dibayar">Belum di bayar</option>
                    <?php endif;?>
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
            <button type="submit" class="btn btn-primary">Edit</button>
            <!-- <a class="btn btn-primary tombol-simpan-transaksi">Simpan</a> -->
            <?=form_close()?>
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>
