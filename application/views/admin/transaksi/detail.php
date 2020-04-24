<!-- Modal -->
<?php foreach($transaksi as $p):?>
<div class="modal fade" id="detailTransaksi<?=$p->id_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <table class="table table-hover">
            <tr>
                <th>Id Transaksi</th>
                <td><?=$p->id_transaksi?></td>
            </tr>
            <tr>
                <th>Penjual</th>
                <td><?=$p->penjual?></td>
            </tr>
            <tr>
                <th>Batas Waktu</th>
                <td><?=date('d-m-Y', strtotime($p->batas_waktu))?></td>
            </tr>
            <tr>
                <th>Tanggal Bayar</th>
                <td>
                <?php if($p->tgl_bayar != "0000-00-00 00:00:00"):?>
                <?=date('d-m-Y', strtotime($p->tgl_bayar))?>
                <?php endif;?>
                </td>
            </tr>
            <tr>
                <th>Jumlah Pakaian</th>
                <td><?=$p->qty?> Kilo</td>
            </tr>
        </table>
        
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>
